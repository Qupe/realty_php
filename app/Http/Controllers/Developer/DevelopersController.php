<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DevelopersController extends Controller
{
    public function render()
    {
        return view('pages.home.home');
    }
}
