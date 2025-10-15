<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgamaController extends Controller
{
    // GET ALL - Ambil semua data
    public function index()
    {
        $agama = Agama::all();
        
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $agama
        ], 200);
    }

    // GET BY ID - Ambil data berdasarkan ID
    public function show($id)
    {
        $agama = Agama::find($id);
        
        if (!$agama) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $agama
        ], 200);
    }

    // POST - Tambah data baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'KODE_AGAMA' => 'required|unique:m_agama,KODE_AGAMA|max:10',
            'NAMA_AGAMA' => 'required|max:50',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $agama = Agama::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $agama
        ], 201);
    }

    // PUT/PATCH - Update data
    public function update(Request $request, $id)
    {
        $agama = Agama::find($id);
        
        if (!$agama) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'KODE_AGAMA' => 'required|max:10|unique:m_agama,KODE_AGAMA,' . $id . ',ID',
            'NAMA_AGAMA' => 'required|max:50',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $agama->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $agama
        ], 200);
    }

    // DELETE - Hapus data
    public function destroy($id)
    {
        $agama = Agama::find($id);
        
        if (!$agama) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $agama->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
