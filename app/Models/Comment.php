<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_id',
        'name',
        'message',
    ];
    
    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
            Notification::create([
                'comment_id' => $comment->id,
                'message' => 'New comment received',
                'is_read' => false,
            ]);
        });
    }

}
