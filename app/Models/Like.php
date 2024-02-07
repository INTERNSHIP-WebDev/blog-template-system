<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_id',
        'user_id',
    ];
    
    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($like) {
            Notification::create([
                'like_id' => $like->id,
                'message' => 'New like received',
                'is_read' => false,
            ]);
        });
    }

}
