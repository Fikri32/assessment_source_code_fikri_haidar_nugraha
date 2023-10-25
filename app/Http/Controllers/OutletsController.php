<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Outlet;
use DataTables;

class OutletsController extends Controller
{
    public function index()
    {
        return view('outlets.index');
    }

    public function getOutlets()
    {
        // Yajra Datatables
        $outlet = Outlet::all();
        return Datatables::of($outlet)
            ->addIndexColumn()
            ->addColumn('id_merchants', function ($outlet) {
                if ($outlet->id_merchants != null) {
                    // dd($outlet);
                    return $outlet->merchant->name;
                }
            })
            ->addColumn('created_at', function ($outlet) {

                return date('d-m-Y h:i', strtotime($outlet->created_at));
            })
            ->addColumn('action', function ($row) {
                $btn = '';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="edit" type="button" class="edit btn btn-primary btn-sm m-1" tittle="Edit"><i class="fa fa-edit" ></i></button>';
                $btn = $btn . '<button href="javascript:void(0)" data-id="' . $row->id . '" id="delete" type="button" class="delete btn btn-danger btn-sm m-1" tittle="Hapus"><i class="fa fa-trash" ></i></button>';

                return $btn;
            })
            ->rawColumns(['action','id_merchants'])
            ->make(true);
    }

    public function getMerchants()
    {
        $merchant = Merchant::all();
        return response()->json([
            'status' => 'List Merchant',
            'data'   => $merchant
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_merchants' => 'required|integer',
        ]);

        $outlet = new Outlet;
        $outlet->name = $request->name;
        $outlet->id_merchants = $request->id_merchants;
        $outlet->save();

        return response()->json([
            'message' => 'Success Add Outlet!'
        ], 200);
    }

    public function edit($id)
    {
        $outlet = Outlet::find($id);
        $merchant = Merchant::all();
        return response()->json([
            'message' => 'Edit Outlet',
            'data' => $outlet,
            'merchant' => $merchant,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_merchants' => 'required|integer',
        ]);

        $outlet = Outlet::find($id);
        if (!$outlet) {
            return response()->json([
                'message' => 'Outlet Not Found'
            ], 404);
        }

        $outlet->update([
            "name" => $request->name,
            "id_merchants" => $request->id_merchants
        ]);

        return response()->json([
            'message' => 'Success Update Outlet'
        ], 200);
    }

    public function delete($id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();
        return response()->json([
            'message' => 'Outlet Deleted'
        ]);
    }
}
