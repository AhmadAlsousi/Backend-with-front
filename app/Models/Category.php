<?php

namespace App\Models;

use App\Enum\Image\CategoryEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Category extends Model implements HasMedia
{
     use InteractsWithMedia;
    public $fillable = ['name'];
    public function category()
{
    return $this->hasMany(Subcategory::class);
}


       public function registerMediaCollections(): void
    {
        $this->addMediaCollection(CategoryEnum::IMAGE->value)->useDisk(CategoryEnum::IMAGE->value);
    }
}
