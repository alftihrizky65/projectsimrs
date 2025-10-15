<?php 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriPasienController extends Controller
{
    public function index()
    {
        $data = KategoriPasien::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = KategoriPasien::find($id);
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
            'KODE_KATEGORI' => 'required|unique:m_kategori_pasien,KODE_KATEGORI|max:10',
            'NAMA_KATEGORI' => 'required|max:50',
            'JENIS_PEMBAYARAN' => 'nullable|in:UMUM,BPJS,ASURANSI,LAINNYA',
            'KETERANGAN' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = KategoriPasien::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = KategoriPasien::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'KODE_KATEGORI' => 'required|max:10|unique:m_kategori_pasien,KODE_KATEGORI,' . $id . ',ID',
            'NAMA_KATEGORI' => 'required|max:50',
            'JENIS_PEMBAYARAN' => 'nullable|in:UMUM,BPJS,ASURANSI,LAINNYA',
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
        $data = KategoriPasien::find($id);
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