<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function render()
    {
        return view('pages/home/home', ['title' => 'Главная']);
    }
}
