<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenisPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisPekerjaanController extends Controller
{
    public function index()
    {
        $data = JenisPekerjaan::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = JenisPekerjaan::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'KODE_PEKERJAAN' => 'required|unique:m_jenis_pekerjaan,KODE_PEKERJAAN|max:10',
            'NAMA_PEKERJAAN' => 'required|max:100',
            'KATEGORI_PEKERJAAN' => 'nullable|max:50',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = JenisPekerjaan::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = JenisPekerjaan::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'KODE_PEKERJAAN' => 'required|max:10|unique:m_jenis_pekerjaan,KODE_PEKERJAAN,' . $id . ',ID',
            'NAMA_PEKERJAAN' => 'required|max:100',
            'KATEGORI_PEKERJAAN' => 'nullable|max:50',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $data = JenisPekerjaan::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}