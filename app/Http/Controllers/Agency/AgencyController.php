<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency as Agency;

class AgencyController extends Controller
{
    private function get_agency($id) {
        $agency = new Agency();

        $agency_info = $agency->where('id', $id)->first();

        return $agency_info->getAttributes();
    }

    public function render($id)
    {
        return view('pages/agency/agency', [
            'title' => 'Агентство',
            'agency' => $this->get_agency($id)
        ]);
    }
}
