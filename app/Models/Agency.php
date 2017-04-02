<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{

    protected $table = 'agencies';

    public static function get_list() {

        $agency = new static;
        $agency_list = [];

        foreach ($agency->all() as $item) {
            $agency_list[] = $item->getAttributes();
        }

        return $agency_list;
    }

    public static function get_one($id) {

        $agency = new static;
        $agency_info = $agency->where('id', $id)->first()->getAttributes();

        return $agency_info;
    }

}
