<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPasien extends Model
{
    use HasFactory;

    protected $table = 'm_kategori_pasien';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'KODE_KATEGORI',
        'NAMA_KATEGORI',
        'JENIS_PEMBAYARAN',
        'KETERANGAN'
    ];
}
