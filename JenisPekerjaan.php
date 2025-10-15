<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'm_jenis_pekerjaan';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'KODE_PEKERJAAN',
        'NAMA_PEKERJAAN',
        'KATEGORI_PEKERJAAN',
        'KETERANGAN'
    ];
}