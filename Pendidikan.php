<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'm_pendidikan';
    protected $primaryKey = 'ID';
    public $timestamps = true;
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'KODE_PENDIDIKAN',
        'NAMA_PENDIDIKAN',
        'TINGKAT_PENDIDIKAN',
        'KETERANGAN'
    ];
}
