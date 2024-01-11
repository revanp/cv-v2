<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'uuid', 'name', 'path', 'file_name', 'mime_type', 'disk', 'size', 'type', 'extension', 'content_type'
    ];

    protected $appends = ['directory'];

    public function mediable()
    {
        return $this->morphTo();
    }

    public function getPathAttribute($value)
    {
        return Storage::disk($this->attributes['disk'])
            ->url($this->attributes['path'] . '/' . $this->attributes['file_name']);
    }

    public function getDirectoryAttribute($value)
    {
        return $this->attributes['path'] . '/' . $this->attributes['file_name'];
    }
}
