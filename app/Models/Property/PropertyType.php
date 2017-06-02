<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table = 'property_types';

    public static function getList() {
        $properties = new static;
        $propertyList = [];

        $propertyObject = $properties->all();

        foreach ($propertyObject as $key => $item) {
            $propertyList[$item->property_code]['realty_type'][$item->realty_type_id] = $item->realty_type_id;
            $propertyList[$item->property_code]['transaction_type'][$item->transaction_type_id] = $item->transaction_type_id;
        }

        return $propertyList;
    }
}