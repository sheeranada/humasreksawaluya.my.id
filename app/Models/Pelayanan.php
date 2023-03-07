<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelayanan extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'px_rajal_id',
        'kecepatan',
        'kemudahan',
        'pelayanan_yang_perlu_dibenahi',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'pelayanan';

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class);
    }
}
