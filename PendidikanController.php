<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $data = Pendidikan::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = Pendidikan::find($id);
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
            'KODE_PENDIDIKAN' => 'required|unique:m_pendidikan,KODE_PENDIDIKAN|max:10',
            'NAMA_PENDIDIKAN' => 'required|max:50',
            'TINGKAT_PENDIDIKAN' => 'nullable|in:SD,SMP,SMA,DIPLOMA,SARJANA,PASCASARJANA,LAINNYA',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Pendidikan::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Pendidikan::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'KODE_PENDIDIKAN' => 'required|max:10|unique:m_pendidikan,KODE_PENDIDIKAN,' . $id . ',ID',
            'NAMA_PENDIDIKAN' => 'required|max:50',
            'TINGKAT_PENDIDIKAN' => 'nullable|in:SD,SMP,SMA,DIPLOMA,SARJANA,PASCASARJANA,LAINNYA',
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
        $data = Pendidikan::find($id);
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
