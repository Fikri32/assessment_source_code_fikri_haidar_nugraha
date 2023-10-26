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
        // Card Count Transaction
        $totalTransaksi = Transaction::count();
        $totalPendapatan = Transaction::sum('total_amount');
        $totalPendapatanFormatted = number_format($totalPendapatan, 2, ',', '.');
        $totalPelanggan = Transaction::distinct()->count('id_customers');
        $totalTransaksiPerMerchant = Transaction::select('merchants.name as nama_merchant', DB::raw('count(transactions.id) as total_transaksi'))
            ->join('merchants', 'transactions.id_merchants', '=', 'merchants.id')
            ->groupBy('merchants.name')
            ->get();
        // End Card
        // Bar chart Monthly Transaction
        $transactionData = Transaction::select(
            DB::raw('MONTH(transaction_time) as month'),
            DB::raw('YEAR(transaction_time) as year'),
            DB::raw('count(*) as total_transactions')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $months = [];
        $counts = [];

        foreach ($transactionData as $data) {
            $months[] = date("M Y", strtotime($data->year . '-' . $data->month . '-01'));
            $counts[] = $data->total_transactions;
        }


        return view('report.index', compact('totalTransaksi', 'totalPendapatanFormatted', 'totalPelanggan', 'totalTransaksiPerMerchant', 'months', 'counts'));
    }
    public function getReportTransaction(Request $request)
    {
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
                    return $transaction->merchant->name;
                }
            })
            ->addColumn('id_outlets', function ($transaction) {
                if ($transaction->id_outlets != null) {
                    return $transaction->outlet->name;
                }
            })
            ->addColumn('id_staff', function ($transaction) {
                if ($transaction->id_staff != null) {
                    return $transaction->staff->name;
                }
            })
            ->addColumn('id_customers', function ($transaction) {
                if ($transaction->id_customers != null) {
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
