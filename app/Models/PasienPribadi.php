<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienPribadi extends Model
{
    use HasFactory;
    protected $connection = 'mysql_second';
    protected $table = 'pasien_pribadi';
    protected $PrimaryKey = 'id';
}
