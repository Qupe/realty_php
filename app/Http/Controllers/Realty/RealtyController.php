<?php

namespace App\Http\Controllers\Realty;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Realty\Realty as Realty;

class RealtyController extends Controller
{
    public function render() {
        return view('pages.realty.realty', [
            'realty' => Realty::getList()
        ]);
    }
}
