<?php

namespace App\Models;

use App\Enum\Image\ProductEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Product extends Model implements HasMedia
{
    
         use InteractsWithMedia;
    public $fillable = [

        'name',
        'sim_card',
        'sim_card_type',
        'display',
        'camera',
        'front_camera',
        'processor',
        'internal_memory',
        'ram',
        'memory_card',
        'operating_system',
        'battery',
        'dimensions',
        'weight',
        'color_id'
    ];
     public function registerMediaCollections(): void
    {
        $this->addMediaCollection(ProductEnum::IMAGE->value)->useDisk(ProductEnum::IMAGE->value);
    }
}
