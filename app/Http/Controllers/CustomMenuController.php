<?php

namespace App\Http\Controllers;

use App\Models\CustomMenu;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class CustomMenuController extends Controller
{

    public function getMenus()
    {
        try {
            $data = CustomMenu::select('id', 'name')->get();
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function getMenuById($id)
    {
        try {
            $data = CustomMenu::find($id);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = CustomMenu::all();
            return view('admin.custom_menu.index', [
                "title" => "Kustom Menu",
                "data" => $data,
                "number" => 1
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.custom_menu.create', [
                "title" => "Tambah Kustom Menu"
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $image_list = [];

            if ($request->file('image')) {
                foreach ($request->file('image') as $image) {
                    array_push($image_list, "https://res.cloudinary.com/dfy3gxotz/image/upload/f_auto,q_auto/" . Cloudinary::upload($image->getRealPath())->getPublicId());
                }
            }

            $store = CustomMenu::create([
                'name' => $request->post('name'),
                'text' => $request->post('text'),
                'image' => count($image_list) > 0 ? $image_list : null
            ]);
            if ($store) {
                return redirect('custom_menu/create')->with('success', 'Berhasil menambah kustom menu');
            } else {
                return redirect('custom_menu/create')->with('warning', 'Gagal menambah kustom menu');
            }
        } catch (Exception $e) {
            return redirect('custom_menu/create')->with('error', 'Ada kesalahan sistem dalam menambah kustom menu. Error : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = CustomMenu::where('id', $id)->first();
            return view('admin.custom_menu.detail', [
                "title" => "Kustom Menu",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = CustomMenu::find($id);
            return view('admin.custom_menu.edit', [
                "title" => "Kustom Menu",
                "data" => $data
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = CustomMenu::find($id);

            $data->update([
                'name' => $request->post('name'),
                'text' => $request->post('text')
            ]);

            if ($data) {
                return redirect('custom_menu/' . $id . '/edit')->with('success', 'Berhasil edit kustom menu');
            } else {
                return redirect('custom_menu/' . $id . '/edit')->with('warning', 'Gagal edit kustom menu');
            }
        } catch (Exception $e) {
            return redirect('custom_menu/' . $id . '/edit')->with('error', 'Ada kesalahan sistem dalam edit kustom menu. Error : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomMenu  $customMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = CustomMenu::destroy($id);
            if ($delete) {
                return redirect('custom_menu')->with('success', 'Berhasil menghapus menu');
            } else {
                return redirect('custom_menu')->with('warning', 'Gagal menghapus menu');
            }
        } catch (Exception $e) {
            return redirect('custom_menu')->with('error', 'Ada kesalahan sistem dalam menghapus menu. Error : ' . $e->getMessage());
        }
    }
}
