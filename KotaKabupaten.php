<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotaKabupaten extends Model
{
    use HasFactory;

    protected $table = 'm_kota_kabupaten';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'ID_PROVINSI',
        'KODE_KOTA_KABUPATEN',
        'NAMA_KOTA_KABUPATEN',
        'JENIS_WILAYAH'
    ];

    // Relasi ke Provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'ID_PROVINSI', 'ID');
    }

    // Relasi ke Kecamatan
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'ID_KOTA_KABUPATEN', 'ID');
    }
}