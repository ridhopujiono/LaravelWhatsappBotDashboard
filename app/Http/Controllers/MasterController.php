<?php

namespace App\Http\Controllers;

use App\Models\HouseFloor;
use App\Models\HouseFloorType;
use App\Models\HouseType;
use App\Models\LocationPoint;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function index()
    {
        try {
            $data = HouseFloorType::all();
            return view('admin.master.index', [
                "title" => "Data Master",
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
            $house_floors =  HouseFloor::get()->sortBy(function ($query) {
                return $query->house_floors->location_name;
            });
            $house_types = HouseType::all();
            return view('admin.master.create', [
                "title" => "Tambah Data Master",
                "house_floors" => $house_floors,
                "house_types" => $house_types,
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            $store = HouseFloorType::create([
                "house_floor_id" => $request->post('house_floor_id'),
                "house_type_id" => $request->post('house_type_id'),
                "descriptions" => $request->post('descriptions'),
            ]);
            if ($store) {
                return redirect('master/create')->with('success', 'Berhasil menambah lokasi');
            } else {
                return redirect('master/create')->with('warning', 'Gagal menambah lokasi');
            }
        } catch (Exception $e) {
            return redirect('master/create')->with('error', 'Ada kesalahan sistem dalam menambah lokasi. Error : ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = HouseFloorType::destroy($id);
            if ($delete) {
                return redirect('master')->with('success', 'Berhasil menghapus data master');
            } else {
                return redirect('master')->with('warning', 'Gagal menghapus data master');
            }
        } catch (Exception $e) {
            return redirect('master')->with('error', 'Ada kesalahan sistem dalam menghapus data master. Error : ' . $e->getMessage());
        }
    }
}
