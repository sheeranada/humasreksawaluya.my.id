<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RuangTunggu extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'px_rajal_id',
        'kenyamanan',
        'kebersihan',
        'saran_kritik',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'ruang_tunggu';

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class);
    }
}
