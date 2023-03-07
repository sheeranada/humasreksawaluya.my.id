<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sarpras extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'px_rajal_id',
        'sarana',
        'prasarana',
        'fasilitas_lain',
    ];

    protected $searchableFields = ['*'];

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class);
    }
}
