<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\Outlet;
use App\Models\Staff;
use App\Models\Customer;
use DataTables;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function getTransactions()
    {
        // Yajra Datatables
        $transaction = Transaction::all();
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
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-edit" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['action', 'id_merchants', 'id_outlets', 'id_staff', 'id_customers'])
            ->make(true);
    }

    public function getRelationalData()
    {
        $merchant = Merchant::all();
        $outlet = Outlet::all();
        $staff = Staff::all();
        $customer = Customer::all();
        return response()->json([
            'status' => 'List Merchant',
            'merchant'   => $merchant,
            'outlet'   => $outlet,
            'customer'   => $customer,
            'staff'   => $staff,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_merchants' => 'required|string|max:255',
            'id_outlets' => 'required|string|max:255',
            'id_customers' => 'required|string|max:255',
            'id_staff' => 'required|string|max:255',
            'change_amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'pay_amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'payment_type' => 'required|string|max:255',
            'transaction_time' => 'required|date',
            'payment_status' => 'required|in:Paid,Not Paid',
        ]);

        $transaction = new Transaction;
        $transaction->id_merchants = $request->id_merchants;
        $transaction->id_outlets = $request->id_outlets;
        $transaction->id_customers = $request->id_customers;
        $transaction->id_staff = $request->id_staff;
        $transaction->payment_status = $request->payment_status;
        $transaction->payment_type = $request->payment_type;
        $transaction->total_amount = $request->total_amount;
        $transaction->change_amount = $request->change_amount;
        $transaction->tax = $request->tax;
        $transaction->pay_amount = $request->pay_amount;
        $transaction->transaction_time = $request->transaction_time;
        $transaction->save();

        return response()->json([
            'message' => 'Success Add Transaction!'
        ], 200);
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $merchant = Merchant::all();
        $outlet = Outlet::all();
        $staff = Staff::all();
        $customer = Customer::all();
        return response()->json([
            'message' => 'Edit Transaction',
            'data' => $transaction,
            'merchant' => $merchant,
            'outlet' => $outlet,
            'staff' => $staff,
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_merchants' => 'required|string|max:255',
            'id_outlets' => 'required|string|max:255',
            'id_customers' => 'required|string|max:255',
            'id_staff' => 'required|string|max:255',
            'change_amount' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'pay_amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'payment_type' => 'required|string|max:255',
            'transaction_time' => 'required|date',
            'payment_status' => 'required|in:Paid,Not Paid',
        ]);

        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'message' => 'Transaction Not Found'
            ], 404);
        }

        $transaction->update([
            "id_merchants" => $request->id_merchants,
            "id_outlets" => $request->id_outlets,
            "id_customers" => $request->id_customers,
            "id_staff" => $request->id_staff,
            "payment_status" => $request->payment_status,
            "payment_type" => $request->payment_type,
            "total_amount" => $request->total_amount,
            "change_amount" => $request->change_amount,
            "tax" => $request->tax,
            "pay_amount" => $request->pay_amount,
            "transaction_time" => $request->transaction_time,
        ]);

        return response()->json([
            'message' => 'Success Update Staff'
        ], 200);
    }


    public function destroy($id)
    {
        Transaction::find($id)->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
