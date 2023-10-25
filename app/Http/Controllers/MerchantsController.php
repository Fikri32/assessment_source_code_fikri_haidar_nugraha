<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use DataTables;

class MerchantsController extends Controller
{
    public function index()
    {
        return view('merchants.index');
    }

    public function getMerchants()
    {
        // Yajra Datatables
        $merchant = Merchant::all();
        return Datatables::of($merchant)
            ->addIndexColumn()
            ->addColumn('created_at', function ($merchant) {

                return date('d-m-Y h:i', strtotime($merchant->created_at));
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
            'name' => 'required|string|max:255', 
        ]);

        $merchant = new Merchant;
        $merchant->name = $request->name;
        $merchant->save();

        return response()->json([
            'message' => 'Success Add Merchant!'
        ], 200);
    }

    public function edit($id)
    {
        $merchant = Merchant::find($id);
        return response()->json([
            'message' => 'Edit Merchant',
            'data' => $merchant,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $merchant = Merchant::find($id);
        if (!$merchant) {
            return response()->json([
                'message' => 'Merchant Not Found'
            ], 404);
        }

        $merchant->update(["name" => $request->name]);

        return response()->json([
            'message' => 'Success Update Merchant'
        ], 200);
    }

    public function delete($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();
        return response()->json([
            'message' => 'Merchant Deleted'
        ]);
    }
}
