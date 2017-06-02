<?php

namespace App\Models\Realty;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Realty extends Model implements HasMediaConversions
{
    use HasMediaTrait;

    protected $table = 'realty';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = ['name', 'price', 'description', 'created_by', 'owner_id'];

    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->performOnCollections('realty');
    }

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

        if ($realtyData= $realty->findOrFail($id)) {

            $realtyInfo = $realtyData->toArray();
            $mediaItems = $realtyData->getMedia('realty');

            if (count($mediaItems) > 0) {
                foreach ($mediaItems as $key => $item) {
                    $realtyInfo['media'][$key] = [
                        'name' => $item->name,
                        'path' => $item->getPath(),
                        'path_thumb' => $item->getPath('thumb'),
                        'url' => $item->getUrl(),
                        'url_thumb' => $item->getUrl('thumb'),
                        'size' => $item->human_readable_size,
                        'size_original' => $item->size,
                    ];
                }
            }

            return $realtyInfo;
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