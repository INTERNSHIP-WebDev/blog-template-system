<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'title_id',
        'subtitle_id',
        'desc_id',
        'image_id',
        'social_id',
        'banner',
        'logo',
    ];

    protected $casts = [
        'id' => 'bigint',
        'title_id' => 'bigint',
        'subtitle_id' => 'bigint',
        'desc_id' => 'bigint',
        'image_id' => 'bigint',
        'social_id' => 'bigint',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class, 'id');
    }

    public function subtitle()
    {
        return $this->belongsTo(Subtitle::class, 'id');
    }

    public function description()
    {
        return $this->belongsTo(Description::class, 'id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'id');
    }

    public function social()
    {
        return $this->belongsTo(Social::class, 'id');
    }
}
