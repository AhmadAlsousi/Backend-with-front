<?php

namespace App\Models;

use App\Enum\Image\Subcategory as ImageSubcategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Subcategory extends Model implements HasMedia
{
         use InteractsWithMedia;
    public $fillable = ['name','category_id'];
     public function category()
{
    return $this->belongsTo(Category::class);
} 
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(ImageSubcategory::IMAGE->value)->useDisk(ImageSubcategory::IMAGE->value);
    }
}
