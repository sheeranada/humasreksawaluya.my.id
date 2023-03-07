<?php

namespace App\Models;

use App\Traits\HasUUID;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasUUID;
    use HasFactory;
    use Searchable;

    protected $fillable = ['px_rajal_id', 'pendaftaran', 'kasir'];

    protected $searchableFields = ['*'];

    protected $table = 'administrasi';

    public function pxRajal()
    {
        return $this->belongsTo(PxRajal::class);
    }
}
