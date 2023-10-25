<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function getCustomers()
    {
        // Yajra Datatables
        $customer = Customer::all();
        return Datatables::of($customer)
            ->addIndexColumn()
            ->addColumn('created_at', function ($customer) {

                return date('d-m-Y h:i', strtotime($customer->created_at));
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-edit" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:100',
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return response()->json([
            'message' => 'Success Add Customer!'
        ], 200);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'message' => 'Edit Customer',
            'data' => $customer,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:100',
        ]);

        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json([
                'message' => 'Customer Not Found'
            ], 404);
        }

        $customer->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        return response()->json([
            'message' => 'Success Update Customer'
        ], 200);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json([
            'message' => 'Customer Deleted'
        ]);
    }
}
