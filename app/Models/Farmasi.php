<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farmasi extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'px_rajal_id',
        'kecepatan',
        'sikap_petugas',
        'penjelasan_obat',
        'pelayanan_farmasi',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'farmasi';

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class,);
    }
}
