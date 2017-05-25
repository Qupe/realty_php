<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency\Agency as Agency;

class AgenciesController extends Controller
{
    public function render()
    {
        return view('pages/agencies/agencies', [
            'agencies' => Agency::getList()
        ]);
    }
}
