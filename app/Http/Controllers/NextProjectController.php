<?php

namespace App\Http\Controllers;

use App\Models\NextProject;
use Illuminate\Http\Request;

class NextProjectController extends Controller
{
    public function storeNextProject(Request $request)
    {
        try {
            $store = NextProject::create([
                "type" => $request->post('type'),
                "descriptions" => $request->post('descriptions') == null ? "-" : $request->post('descriptions'),
                "phone_number" => $request->post('phone_number') == null ? "-" : $request->post('phone_number')
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
            $data = NextProject::orderBy('created_at', 'desc')->get();
            return view('admin.next_project.index', [
                "title" => "Usulan Proyek",
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
            $data = NextProject::where('id', $id)->first();
            return view('admin.next_project.detail', [
                "title" => "Usulan Proyek",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = NextProject::destroy($id);
            if ($delete) {
                return redirect('request_project')->with('success', 'Berhasil menghapus Usulan Proyek');
            } else {
                return redirect('request_project')->with('warning', 'Gagal menghapus Usulan Proyek');
            }
        } catch (Exception $e) {
            return redirect('request_project')->with('error', 'Ada kesalahan sistem dalam menghapus Usulan Proyek. Error : ' . $e->getMessage());
        }
    }
}
