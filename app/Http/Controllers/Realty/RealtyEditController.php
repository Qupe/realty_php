<?php

namespace App\Http\Controllers\Realty;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Realty\RealtyAdd as RealtyAdd;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use App\Models\Property\Property as Property;
use App\Models\Realty\Realty as Realty;
use App\Models\Property\RealtyProperty as RealtyProperty;
use Illuminate\Support\Facades\Auth;

class RealtyEditController extends Controller
{
    public function render(Request $request, $id)
    {
        $realty = Realty::getOne($id);
        $authUserId = Auth::user()->id;

        if (isset($realty) && $authUserId == $realty['created_by']) {

            $data = [
                'scope' => 'edit',
                'input' => $request->all()
            ];
            $data['realty'] = $realty;

            if (Auth::check() && $user = User::getOne($authUserId)) {
                $data['user'] = $user;
            }

            if ($properties = Property::getListByRealty($realty['id'])) {
                $data['properties'] = $properties;
            }

            return view('pages.realty-add.realty-add', $data);
        }

        return abort(404);
    }

    public function edit(RealtyAdd $request, $id) {

        $realtyFields = [
            'owner_id' => $request->input('owner_id'),
            'created_by' => $request->input('created_by'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'name' => str_random()
        ];

        foreach ($realtyFields as $key => $value) {
            Realty::updateOne($id, [$key => $value]);
        }

        foreach ($request->except('_token') as $key => $value) {
            if (!isset($realtyFields[$key]) && !empty($value)) {
                RealtyProperty::updateByRealty($id, $key, ['value' => $value]);
            } else {
                RealtyProperty::deleteRow($id, $key);
            }
        }

        return redirect()->back()->withInput()->with('success', 'Объявление успешно отредактировано');
    }
}
