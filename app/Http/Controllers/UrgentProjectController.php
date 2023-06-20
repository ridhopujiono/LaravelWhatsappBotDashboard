<?php

namespace App\Http\Controllers;

use App\Models\UrgentProject;
use Illuminate\Http\Request;

class UrgentProjectController extends Controller
{
    public function storeUrgentProject(Request $request, $id)
    {
        try {
            $store = UrgentProject::create([
                "payment_type" => $request->post("payment_type"),
                "urgent_type" => $request->post("urgent_type"),
                "follow_up" => $request->post("follow_up"),
                "phone_number" => $request->post("phone_number"),
                "house_floor_type_id" => $id
            ]);
            if ($store) {
                return response()->json([
                    "status" => "success",
                    "code" => 200,
                    "message" => "Has ben stored!"
                ], 200);
            } else {
                return response()->json([
                    "status" => "error",
                    "code" => 500,
                    "message" => "Cant stored!"
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function index()
    {
        try {
            $data = UrgentProject::all();
            return view('admin.urgent_project.index', [
                "title" => "Daftar Peminat",
                "data" => $data,
                "number" => 1
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $data = UrgentProject::where('id', $id)->first();
            return view('admin.urgent_project.detail', [
                "title" => "Daftar Peminat",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('admin.urgent_project.create', [
                "title" => "Tambah Daftar Peminat"
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            $store = UrgentProject::create([
                "interest_name" => $request->post('interest_name')
            ]);
            if ($store) {
                return redirect('interest/create')->with('success', 'Berhasil menambah Daftar Peminat');
            } else {
                return redirect('interest/create')->with('warning', 'Gagal menambah Daftar Peminat');
            }
        } catch (Exception $e) {
            return redirect('interest/create')->with('error', 'Ada kesalahan sistem dalam menambah Daftar Peminat. Error : ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = UrgentProject::destroy($id);
            if ($delete) {
                return redirect('interest')->with('success', 'Berhasil menghapus Daftar Peminat');
            } else {
                return redirect('interest')->with('warning', 'Gagal menghapus Daftar Peminat');
            }
        } catch (Exception $e) {
            return redirect('interest')->with('error', 'Ada kesalahan sistem dalam menghapus Daftar Peminat. Error : ' . $e->getMessage());
        }
    }
}
