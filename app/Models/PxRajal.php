<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PxRajal extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'no_upf',
        'no_rm',
        'nama_pasien',
        'klinik',
        'penjamin',
        'no_hp',
        'tgl_daftar',
        'kategori_pasien',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'px_rajal';

    protected $casts = [
        'tgl_daftar' => 'datetime',
    ];

    public function sarpras()
    {
        return $this->hasMany(Sarpras::class);
    }

    public function sdm()
    {
        return $this->hasMany(Sdm::class);
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class);
    }

    public function farmasis()
    {
        return $this->hasMany(Farmasi::class, 'px_rajal_id');
    }

    public function pelayanan()
    {
        return $this->hasMany(Pelayanan::class);
    }

    public function ruangTunggu()
    {
        return $this->hasMany(RuangTunggu::class);
    }
}
