<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangRawat extends Model
{
    use HasFactory;

    protected $table = 'm_ruang_rawat';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'ID_KELAS_RAWAT',
        'KODE_RUANG',
        'NAMA_RUANG',
        'LANTAI',
        'GEDUNG',
        'KAPASITAS_TEMPAT_TIDUR',
        'JUMLAH_TEMPAT_TIDUR_TERISI',
        'JENIS_RUANG',
        'STATUS_AKTIF',
        'KETERANGAN'
    ];

    // Relasi ke Kelas Rawat
    public function kelasRawat()
    {
        return $this->belongsTo(KelasRawat::class, 'ID_KELAS_RAWAT', 'ID');
    }
}