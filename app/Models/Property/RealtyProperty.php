<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Model;

class RealtyProperty extends Model
{
    protected $table = 'realty_properties';
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'value';
    public $incrementing = false;

    public static function updateByRealty($id, $code, $props) {
        $properties = new static;

        $propertyObject = $properties->updateOrCreate(
            ['property_code' => $code, 'realty_id' => $id],
            $props
        );

        return $propertyObject;
    }

    public static function deleteRow($id, $code) {
        $properties = new static;

        $propertyObject = $properties->where('realty_id', $id)->where('property_code', $code)->delete();

        return $propertyObject;
    }
}
