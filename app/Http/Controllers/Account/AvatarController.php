<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Http\Requests\StoreAvatar;
use App\Image;

class AvatarController extends Controller
{
    private $imageManager;

    public function __construct(ImageManager $im)
    {
        $this->imageManager = $im;
    }

    public function store(StoreAvatar $req)
    {
        $img = $this->imageManager->make($req->image->path())
          ->fit(100, 100, function ($constraint) {
            $constraint->aspectRatio();
          })
          ->encode('png')
          ->save(config('custom.image.path.absolute') . $path = '/' . uniqid(true) . '.png');
          //instead of saving img locally can save to the cloud here

        $image = Image::create([
          'path' => $path
        ]);

        return response([
          'data' => [
            'id' => $image->id,
            'path' => $image->path(),
          ]
        ], 200);
    }
}
