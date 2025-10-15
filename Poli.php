<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'm_poli';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'KODE_POLI',
        'NAMA_POLI',
        'LOKASI',
        'LANTAI',
        'GEDUNG',
        'JADWAL_OPERASIONAL',
        'KAPASITAS_PASIEN_PER_HARI',
        'NOMOR_TELEPON',
        'STATUS_AKTIF',
        'KETERANGAN'
    ];
}