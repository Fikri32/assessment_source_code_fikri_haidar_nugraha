<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use DataTables;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function getStaff()
    {
        // Yajra Datatables
        $staff = Staff::all();
        return Datatables::of($staff)
            ->addIndexColumn()
            ->addColumn('created_at', function ($staff) {

                return date('d-m-Y h:i', strtotime($staff->created_at));
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

        $staff = new Staff;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->save();

        return response()->json([
            'message' => 'Success Add Staff!'
        ], 200);
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        return response()->json([
            'message' => 'Edit Staff',
            'data' => $staff,
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

        $staff = Staff::find($id);
        if (!$staff) {
            return response()->json([
                'message' => 'Staff Not Found'
            ], 404);
        }

        $staff->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ]);

        return response()->json([
            'message' => 'Success Update Staff'
        ], 200);
    }

    public function delete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return response()->json([
            'message' => 'Staff Deleted'
        ]);
    }
}
