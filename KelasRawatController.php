<?php 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KelasRawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasRawatController extends Controller
{
    public function index()
    {
        $data = KelasRawat::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = KelasRawat::find($id);
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
            'KODE_KELAS' => 'required|unique:m_kelas_rawat,KODE_KELAS|max:10',
            'NAMA_KELAS' => 'required|max:50',
            'TARIF_DASAR' => 'nullable|numeric',
            'FASILITAS' => 'nullable',
            'KAPASITAS_TEMPAT_TIDUR' => 'nullable|integer',
            'KETERANGAN' => 'nullable',
            'STATUS_AKTIF' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = KelasRawat::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KelasRawat::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'KODE_KELAS' => 'required|max:10|unique:m_kelas_rawat,KODE_KELAS,' . $id . ',ID',
            'NAMA_KELAS' => 'required|max:50',
            'TARIF_DASAR' => 'nullable|numeric',
            'FASILITAS' => 'nullable',
            'KAPASITAS_TEMPAT_TIDUR' => 'nullable|integer',
            'KETERANGAN' => 'nullable',
            'STATUS_AKTIF' => 'nullable|boolean'
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
        $data = KelasRawat::find($id);
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
