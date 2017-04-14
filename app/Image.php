<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = ['path'];

    protected $dates = ['deleted_at'];

    public function path()
    {
        return config('custom.image.path.relative') . $this->path;
    }
}
