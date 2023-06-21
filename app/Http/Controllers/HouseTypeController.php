<?php

namespace App\Http\Controllers;

use App\Models\HouseFloorType;
use App\Models\HouseType;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class HouseTypeController extends Controller
{
    public function getHouseTypesById($id)
    {
        try {
            $data = HouseFloorType::with('house_types')->where('house_floor_id', $id)->get();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function index()
    {
        try {
            $data = HouseType::all();
            return view('admin.house_type.index', [
                "title" => "Tipe Rumah",
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
            $data = HouseType::where('id', $id)->first();
            return view('admin.house_type.detail', [
                "title" => "Tipe Rumah",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function create()
    {
        try {
            return view('admin.house_type.create', [
                "title" => "Tambah Tipe Rumah"
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store(Request $request)
    {
        try {
            $image_list = [];
            foreach ($request->file('image') as $image) {
                array_push($image_list, Cloudinary::upload($image->getRealPath())->getPublicId());
            }

            if ($image_list) {
                $store = HouseType::create([
                    'house_type_name' => $request->post('house_type_name'),
                    'image' => $image_list
                ]);
                if ($store) {
                    return redirect('house_type/create')->with('success', 'Berhasil menambah lokasi');
                } else {
                    return redirect('house_type/create')->with('warning', 'Gagal menambah lokasi');
                }
            }
        } catch (Exception $e) {
            return redirect('house_type/create')->with('error', 'Ada kesalahan sistem dalam menambah lokasi. Error : ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $delete = HouseType::destroy($id);
            if ($delete) {
                return redirect('house_type')->with('success', 'Berhasil menghapus tipe rumah');
            } else {
                return redirect('house_type')->with('warning', 'Gagal menghapus tipe rumah');
            }
        } catch (Exception $e) {
            return redirect('house_type')->with('error', 'Ada kesalahan sistem dalam menghapus tipe rumah. Error : ' . $e->getMessage());
        }
    }
}
