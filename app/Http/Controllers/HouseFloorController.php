<?php

namespace App\Http\Controllers;

use App\Models\HouseFloor;
use App\Models\LocationPoint;
use Illuminate\Http\Request;

class HouseFloorController extends Controller
{
    public function getFloors($id)
    {
        try {
            $data = HouseFloor::orderBy('floor_name', 'asc')->where('location_point_id', $id)->get();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function index()
    {
        try {
            $data = HouseFloor::get()->sortBy(function ($query) {
                return $query->house_floors->location_name;
            });
            return view('admin.house_floor.index', [
                "title" => "Lantai Rumah",
                "data" => $data,
                "number" => 1
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function edit($id)
    {
        try {
            $data = HouseFloor::find($id);
            $location_points = LocationPoint::all();
            return view('admin.house_floor.edit', [
                "title" => "Data Lantai Rumah",
                "data" => $data,
                "location_points" => $location_points
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $data = HouseFloor::find($id);

            $data->update([
                'location_point_id' => $request->post('location_point_id'),
                'floor_name' => $request->post('floor_name')
            ]);

            if ($data) {
                return redirect('house_floor/' . $id . '/edit')->with('success', 'Berhasil edit data lantai');
            } else {
                return redirect('house_floor/' . $id . '/edit')->with('warning', 'Gagal edit data lantai');
            }
        } catch (Exception $e) {
            return redirect('house_floor/' . $id . '/edit')->with('error', 'Ada kesalahan sistem dalam edit data lantai. Error : ' . $e->getMessage());
        }
    }
    public function create()
    {
        try {
            $data = LocationPoint::all();
            return view('admin.house_floor.create', [
                "title" => "Tambah Lantai Rumah",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            $store = HouseFloor::create([
                "location_point_id" => $request->post('location_id'),
                "floor_name" => $request->post('floor_name')
            ]);
            if ($store) {
                return redirect('house_floor/create')->with('success', 'Berhasil menambah lantai rumah');
            } else {
                return redirect('house_floor/create')->with('warning', 'Gagal menambah lantai rumah');
            }
        } catch (Exception $e) {
            return redirect('house_floor/create')->with('error', 'Ada kesalahan sistem dalam menambah lantai rumah. Error : ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = HouseFloor::destroy($id);
            if ($delete) {
                return redirect('house_floor')->with('success', 'Berhasil menghapus lantai rumah');
            } else {
                return redirect('house_floor')->with('warning', 'Gagal menghapus lantai rumah');
            }
        } catch (Exception $e) {
            return redirect('house_floor')->with('error', 'Ada kesalahan sistem dalam menghapus lantai rumah. Error : ' . $e->getMessage());
        }
    }
}
