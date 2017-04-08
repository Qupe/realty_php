<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agency as Agency;

class AgencyController extends Controller
{
    public function render(Request $request, $id)
    {
        $agency = Agency::get_one($id);

        if ($agency) {
            return view('pages.agency.agency', [
                'agency' => $agency
            ]);
        }

        abort(500);
    }
}