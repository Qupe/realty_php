<?php

namespace App\Http\Controllers\Agency;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agency as Agency;

class AgenciesController extends Controller
{
    private function get_agency_list() {
        $agency = new Agency();
        $agency_list = [];

        foreach ($agency->all() as $item) {
            $agency_list[] = $item->getAttributes();
        }

        return $agency_list;
    }

    public function render()
    {
        return view('pages/agencies/agencies', [
            'title' => 'Агентства',
            'users' => $this->get_agency_list()
        ]);
    }
}
