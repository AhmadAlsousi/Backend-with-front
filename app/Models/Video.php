<?php

namespace App\Models;

use App\Enum\Video\VideoEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['video'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(VideoEnum::VIDEO->value)->useDisk(VideoEnum::VIDEO->value);
        $this->addMediaCollection(VideoEnum::PART_VIDEO->value)->useDisk(VideoEnum::PART_VIDEO->value);
    }
}
