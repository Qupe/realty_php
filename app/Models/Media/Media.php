<?php

namespace App\Models\Media;

use Spatie\MediaLibrary\Media as BaseMedia;

class Media extends BaseMedia
{
    protected $table = 'media';
    protected $fillable = ['model_id', 'model_type', 'collection_name', 'name', 'file_name', 'disk', 'size'];
}