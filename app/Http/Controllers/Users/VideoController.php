<?php

namespace App\Http\Controllers\Users;

use App\Enum\Video\VideoEnum;
use App\Http\Controllers\APIController;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VideoRequest;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends APIController
{
    public function store(VideoRequest $request)
    {
        $video = $request->validated();

        $uploadId = $request->input('upload_id');
        $index    = (int) $request->input('index');
        $total    = (int) $request->input('total');
        $tempDir = "chunks/{$uploadId}";
        Storage::disk('part_video')->putFileAs($tempDir, $request->file('chunk'), "part_{$index}");
        if ($index + 1 === $total) {
            // $folder    = $request->input('video');
            $finalPath = "{$uploadId}.mp4";
            $finalFull = storage_path("app/public/video/{$finalPath}");
            if (!is_dir(dirname($finalFull))) {
                mkdir(dirname($finalFull), 0777, true);
            }

            $handle = fopen($finalFull, 'w');

            for ($i = 0; $i < $total; $i++) {
                $partPath = storage_path("app/public/part_video/{$tempDir}/part_{$i}");
                $part = fopen($partPath, 'r');
                stream_copy_to_stream($part, $handle);
                fclose($part);
            }
            fclose($handle);
            $video = Video::create(['video' => $request->input('video')]);
            $media = $video->addMedia($finalFull)
                ->usingFileName(basename($finalPath))
                ->toMediaCollection(VideoEnum::VIDEO->value);

            Storage::disk('part_video')->deleteDirectory($tempDir);

            return response()->json([
                'status'   => 'completed',
                'video_id' => $video->id,
                'media_id' => $media->id,
                'url'      => $media->getUrl(),
            ]);
        }




        return "a";
    }
}
