<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpfHistory extends Model
{
    use HasFactory;
    protected $connection = 'mysql_second';
    protected $table = 'upf_history';
    protected $PrimaryKey = 'no_upf';

}
