<?php

namespace App\Http\Controllers\Realty;

use App\Http\Requests\Realty\RealtyAdd as RealtyAdd;
use App\Http\Controllers\Controller;
use App\Models\Realty\Realty as Realty;
use App\Models\Property\Property as Property;
use App\Models\Property\RealtyProperty as RealtyProperty;

class RealtyAddController extends Controller
{
    public function render() {
        return view('pages.realty-add-edit.realty-add-edit', [
            'properties' => Property::getList(),
            'scope' => 'add'
        ]);
    }

    public function add(RealtyAdd $request) {
        $realtyProps = [];

        $realtyFields = [
            'owner_id' => $request->input('owner_id'),
            'created_by' => $request->input('created_by'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'name' => str_random()
        ];

        dd($request->file('photos'));

        if ($newRealty = Realty::firstOrCreate($realtyFields)) {

            $newRealty->addMedia($request->file('photos')->path())->toMediaCollection('realty');

            foreach ($request->except(['_token', 'photos']) as $key => $value) {
                if (!isset($realtyFields[$key]) && !empty($value)) {
                    $realtyProps[] = [
                        'realty_id' => $newRealty->id,
                        'property_code' => $key,
                        'value' => $value
                    ];
                }
            }

            if (!RealtyProperty::insert($realtyProps)) {
                return abort(500);
            }
        } else {
            return abort(500);
        }

        return redirect()->back()->with('success', 'Объявление успешно добавлено');
    }
}