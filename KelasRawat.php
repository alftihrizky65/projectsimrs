<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasRawat extends Model
{
    use HasFactory;

    protected $table = 'm_kelas_rawat';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'KODE_KELAS',
        'NAMA_KELAS',
        'TARIF_DASAR',
        'FASILITAS',
        'KAPASITAS_TEMPAT_TIDUR',
        'KETERANGAN',
        'STATUS_AKTIF'
    ];
}