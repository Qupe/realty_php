<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency as Agency;

class AgencyController extends Controller
{
    public function render(Request $request, $id)
    {
        return view('pages.agency.agency', [
            'agency' => Agency::get_one($id)
        ]);
    }
}