<?php

namespace App\Http\Controllers;

use App\Models\LocationPoint;
use Illuminate\Http\Request;

class LocationPointController extends Controller
{
    public function getLocations()
    {
        try {
            $data = LocationPoint::all();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function getLocationById($id)
    {
        try {
            $data = LocationPoint::find($id);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function index()
    {
        try {
            $data = LocationPoint::all();
            return view('admin.location_points.index', [
                "title" => "Lokasi",
                "data" => $data,
                "number" => 1
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('admin.location_points.create', [
                "title" => "Tambah Lokasi"
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            $store = LocationPoint::create([
                "location_name" => $request->post('location_name')
            ]);
            if ($store) {
                return redirect('location/create')->with('success', 'Berhasil menambah lokasi');
            } else {
                return redirect('location/create')->with('warning', 'Gagal menambah lokasi');
            }
        } catch (Exception $e) {
            return redirect('location/create')->with('error', 'Ada kesalahan sistem dalam menambah lokasi. Error : ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = LocationPoint::destroy($id);
            if ($delete) {
                return redirect('location')->with('success', 'Berhasil menghapus lokasi');
            } else {
                return redirect('location')->with('warning', 'Gagal menghapus lokasi');
            }
        } catch (Exception $e) {
            return redirect('location')->with('error', 'Ada kesalahan sistem dalam menghapus lokasi. Error : ' . $e->getMessage());
        }
    }
}
