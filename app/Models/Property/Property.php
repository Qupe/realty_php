<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    public static function getList()
    {
        $properties = new static;
        $propertyList = [];

        $propertyObject = $properties
            ->select(
                'properties.name as name',
                'properties.unit as unit',
                'properties.code as code',
                'property_values.text as value',
                'property_values.value as value_id',
                'property_types.realty_type_id as realty_type',
                'property_types.transaction_type_id as transaction_type'
            )
            ->join('property_types', 'properties.code', '=', 'property_types.property_code')
            ->leftjoin('property_values', 'property_types.property_code', '=', 'property_values.property_code')
            ->get();

        foreach ($propertyObject as $key => $item) {
            $propertyList[$item->code]['name'] = $item->name;
            $propertyList[$item->code]['unit'] = $item->unit;
            $propertyList[$item->code]['hint'] = $item->hint;
            $propertyList[$item->code]['code'] = $item->code;
            $propertyList[$item->code]['current_value'] = '';
            $propertyList[$item->code]['realty_type'][$item->realty_type] = $item->realty_type;
            $propertyList[$item->code]['transaction_type'][$item->transaction_type] = $item->transaction_type;

            if ($item->value) {
                $propertyList[$item->code]['values'][$item->value_id] = [
                    'id' => $item->value_id,
                    'value' => $item->value
                ];
            }
        }

        return $propertyList;
    }

    public static function getListByType($realty_type_id, $transaction_type_id)
    {
        $properties = new static;
        $propertyList = [];

        $propertyObject = $properties
            ->select(
                'property_types.transaction_type_id as transaction_type',
                'property_types.realty_type_id as realty_type',
                'properties.name as name',
                'properties.code as code',
                'properties.unit as unit',
                'property_values.text as value',
                'property_values.value as value_id'
            )
            ->leftJoin('property_values', 'properties.code', '=', 'property_values.property_code')
            ->join('property_types', 'properties.code', '=', 'property_types.property_code')
            ->where([
                ['property_types.realty_type_id', '=', $realty_type_id],
                ['property_types.transaction_type_id', '=', $transaction_type_id]
            ])
            ->get();

        foreach ($propertyObject as $item) {
            $propertyList[$item->code]['name'] = $item->name;
            $propertyList[$item->code]['code'] = $item->code;
            $propertyList[$item->code]['unit'] = $item->unit;
            $propertyList[$item->code]['realty_type'] = $item->realty_type;
            $propertyList[$item->code]['transaction_type'] = $item->transaction_type;
            $propertyList[$item->code]['values'][] = [
                'id' => $item->value_id,
                'value' => $item->value
            ];
        }

        return $propertyList;
    }

    public static function getListByRealty($realty_id)
    {
        $properties = new static;
        $propertyList = [];

        $propertyObject = $properties
            ->select(
                'properties.name as name',
                'properties.unit as unit',
                'properties.code as code',
                'property_values.text as value',
                'property_values.value as value_id',
                'property_types.realty_type_id as realty_type',
                'property_types.transaction_type_id as transaction_type',
                'realty_properties.value as current_value'
            )
            ->join('property_types', 'properties.code', '=', 'property_types.property_code')
            ->leftjoin('property_values', 'properties.code', '=', 'property_values.property_code')
            ->leftjoin('realty_properties', function ($join) use ($realty_id) {
                $join->on('properties.code', '=', 'realty_properties.property_code')
                    ->where('realty_properties.realty_id', '=', $realty_id);
            })
            ->get();

        foreach ($propertyObject as $key => $item) {
            $propertyList[$item->code]['name'] = $item->name;
            $propertyList[$item->code]['unit'] = $item->unit;
            $propertyList[$item->code]['hint'] = $item->hint;
            $propertyList[$item->code]['code'] = $item->code;
            $propertyList[$item->code]['current_value'] = $item->current_value;
            $propertyList[$item->code]['realty_type'][$item->realty_type] = $item->realty_type;
            $propertyList[$item->code]['transaction_type'][$item->transaction_type] = $item->transaction_type;

            if ($item->value) {
                $propertyList[$item->code]['values'][$item->value_id] = [
                    'id' => $item->value_id,
                    'value' => $item->value
                ];
            }
        }

        return $propertyList;
    }
}
