<?php

namespace App\Models\Realty;

use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    protected $table = 'realty';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = ['name', 'price', 'description', 'created_by', 'owner_id'];

    public function getCreatedAtAttribute($value)
    {
        return date('d.m.Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d.m.Y H:m', strtotime($value));
    }

    public static function getList() {

        $realty = new static;
        $realtyList = [];

        foreach ($realty->all() as $item) {
            $realtyList[] = $item->toArray();
        }

        return $realtyList;
    }

    public static function getOne($id) {

        $realty = new static;

        if ($realtyInfo = $realty->where('id', $id)->first()) {
            return $realtyInfo->toArray();
        }

        return false;
    }

    public static function saveOne($fields) {
        $realty = new static;

        return $realty->firstOrCreate($fields);
    }

    public static function updateOne($id, $props) {
        $realty = new static;

        $realtyObject = $realty->where('id', $id)->update($props);

        return $realtyObject;
    }
}