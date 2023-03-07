<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sdm extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'px_rajal_id',
        'parkir',
        'security',
        'dokter',
        'perawat',
        'radiologi',
        'laboratorium',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'sdm';

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class);
    }
}
