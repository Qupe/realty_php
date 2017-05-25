<?php

namespace App\Models\Agency;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{

    protected $table = 'agencies';

    public static function getList() {

        $agency = new static;
        $agencyList = [];

        foreach ($agency->all() as $item) {
            $agencyList[] = $item->getAttributes();
        }

        return $agencyList;
    }

    public static function getOne($id) {

        $agency = new static;

        if ($agencyInfo = $agency->where('id', $id)->first()) {
            return $agencyInfo->getAttributes();
        }

        return false;
    }

}
