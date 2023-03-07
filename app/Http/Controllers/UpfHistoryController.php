<?php

namespace App\Http\Controllers;

use App\Models\UpfHistory;
use Illuminate\Http\Request;

class UpfHistoryController extends Controller
{
    public function index()
    {
        $upf = UpfHistory::all();
    }
}
