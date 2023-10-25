<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use DataTables;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $totalTransaksi = Transaction::count();
        $totalPendapatan = Transaction::sum('total_amount');
        $totalPendapatanFormatted = number_format($totalPendapatan, 2, ',', '.');
        $totalPelanggan = Transaction::distinct()->count('id_customers');
        $totalTransaksiPerMerchant = Transaction::select('merchants.name as nama_merchant', DB::raw('count(transactions.id) as total_transaksi'))
            ->join('merchants', 'transactions.id_merchants', '=', 'merchants.id')
            ->groupBy('merchants.name')
            ->get();
        return view('report.index', compact('totalTransaksi', 'totalPendapatanFormatted', 'totalPelanggan', 'totalTransaksiPerMerchant'));
    }
    public function getReportTransaction(Request $request)
    {
        // Yajra Datatables
        // Yajra Datatables
        $query = Transaction::query();

        // Filter by Date
        if ($request->input('filterDate')) {
            $query->where('transaction_date', 'LIKE', '%' . $request->input('filterDate') . '%');
        }

        // Filter by Merchant Name
        if ($request->input('filterMerchant')) {
            $query->where('id_merchants', 'LIKE', '%' . $request->input('filterMerchant') . '%');
        }

        // Filter by Payment Status
        $filterPaymentStatus = $request->input('filterPaymentStatus');
        if ($filterPaymentStatus === 'Paid') {
            $query->where('payment_status', 'Paid');
        } elseif ($filterPaymentStatus === 'Not Paid') {
            $query->where('payment_status', 'Not Paid');
        }

        // Filter by Outlet Name
        if ($request->input('filterOutlet')) {
            $query->where('id_outlets', 'LIKE', '%' . $request->input('filterOutlet') . '%');
        }

        $transaction = $query->get();
        // $transaction = Transaction::all();
        return Datatables::of($transaction)
            ->addIndexColumn()
            ->addColumn('id_merchants', function ($transaction) {
                if ($transaction->id_merchants != null) {
                    // dd($transaction);
                    return $transaction->merchant->name;
                }
            })
            ->addColumn('id_outlets', function ($transaction) {
                if ($transaction->id_outlets != null) {
                    // dd($transaction);
                    return $transaction->outlet->name;
                }
            })
            ->addColumn('id_staff', function ($transaction) {
                if ($transaction->id_staff != null) {
                    // dd($transaction);
                    return $transaction->staff->name;
                }
            })
            ->addColumn('id_customers', function ($transaction) {
                if ($transaction->id_customers != null) {
                    // dd($transaction);
                    return $transaction->customer->name;
                }
            })
            ->addColumn('created_at', function ($transaction) {

                return date('d-m-Y h:i', strtotime($transaction->created_at));
            })
            ->addColumn('transaction_date', function ($transaction) {
                return date('d-m-Y', strtotime($transaction->transaction_time));
            })
            ->addColumn('transaction_time', function ($transaction) {
                return date('H:i', strtotime($transaction->transaction_time));
            })
            ->rawColumns(['id_merchants', 'id_outlets', 'id_staff', 'id_customers'])
            ->make(true);
    }
}
