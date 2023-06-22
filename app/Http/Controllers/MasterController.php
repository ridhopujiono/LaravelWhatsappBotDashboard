<?php

namespace App\Http\Controllers;

use App\Models\HouseFloor;
use App\Models\HouseFloorType;
use App\Models\HouseFloorTypePayment;
use App\Models\HouseType;
use App\Models\LocationPoint;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function getSchemasAndDescriptions($id)
    {
        try {
            $data = HouseFloorType::where('id', $id)->with('house_floor_type_payments')->first();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
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
    public function show($id)
    {
        try {
            $data = HouseFloorType::find($id);
            return view('admin.master.detail', [
                "title" => "Data Master",
                "data" => $data
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
            HouseFloorTypePayment::create([
                "house_floor_type_id" => $store->id,
                "descriptions" => $request->post('schema')['cash'],
                "payment_type" => "cash"
            ]);
            HouseFloorTypePayment::create([
                "house_floor_type_id" => $store->id,
                "descriptions" => $request->post('schema')['tempo'],
                "payment_type" => "tempo"
            ]);
            HouseFloorTypePayment::create([
                "house_floor_type_id" => $store->id,
                "descriptions" => $request->post('schema')['credit'],
                "payment_type" => "credit"
            ]);

            if ($store) {
                return redirect('master/create')->with('success', 'Berhasil menambah data master');
            } else {
                return redirect('master/create')->with('warning', 'Gagal menambah data master');
            }
        } catch (Exception $e) {
            return redirect('master/create')->with('error', 'Ada kesalahan sistem dalam menambah data master. Error : ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data = HouseFloorType::find($id);
            return view('admin.master.edit', [
                "title" => "Data Master",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = HouseFloorType::find($id);
            $data->house_floor_type_payments->where('payment_type', 'cash')[0]->update([
                'descriptions' => $request->post('schema')['cash']
            ]);
            $data->house_floor_type_payments->where('payment_type', 'tempo')[1]->update([
                'descriptions' => $request->post('schema')['tempo']
            ]);
            $data->house_floor_type_payments->where('payment_type', 'credit')[2]->update([
                'descriptions' => $request->post('schema')['credit']
            ]);

            $data->update([
                'descriptions' => $request->post('descriptions')
            ]);

            if ($data) {
                return redirect('master/' . $id . '/edit')->with('success', 'Berhasil edit data master');
            } else {
                return redirect('master/' . $id . '/edit')->with('warning', 'Gagal edit data master');
            }
        } catch (Exception $e) {
            return redirect('master/' . $id . '/edit')->with('error', 'Ada kesalahan sistem dalam edit data master. Error : ' . $e->getMessage());
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
