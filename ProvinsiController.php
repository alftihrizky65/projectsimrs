<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    public function index()
    {
        return response()->json(Provinsi::all());
    }

    public function show($id)
    {
        $item = Provinsi::find($id);
        if (!$item) return response()->json(['message'=>'Data tidak ditemukan'], 404);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['nama' => 'required|string|max:255']);
        return response()->json(Provinsi::create($validated), 201);
    }

    public function update(Request $request, $id)
    {
        $item = Provinsi::find($id);
        if (!$item) return response()->json(['message'=>'Data tidak ditemukan'], 404);
        $validated = $request->validate(['nama' => 'required|string|max:255']);
        $item->update($validated);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Provinsi::find($id);
        if (!$item) return response()->json(['message'=>'Data tidak ditemukan'], 404);
        $item->delete();
        return response()->json(['message'=>'Data berhasil dihapus']);
    }
}
