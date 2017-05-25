<?php

namespace App\Http\Controllers\Realty;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Realty\Realty as Realty;
use App\Models\TransactionType as TransactionType;
use App\Models\RealtyType as RealtyType;
use App\Models\User as User;
use App\Models\Property\Property as Property;

class RealtyObjectController extends Controller
{
    public function render(Request $request, $id)
    {
        $realty = Realty::getOne($id);

        if ($realty) {
            return view('pages.realty-object.realty-object', [
                'realty' => $realty,
                'transaction_types' => TransactionType::getList(),
                'realty_types' => RealtyType::getList(),
                'owner' => User::getOne($realty['created_by']),
                'properties' => Property::getListByRealty($realty['id'])
            ]);
        }

        return abort(404);
    }
}
