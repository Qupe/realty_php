<?php

namespace App\Http\Controllers\Realtor;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RealtorController extends Controller
{
    public function render()
    {
        return view('pages/home/home', ['title' => 'Главная']);
    }
}
