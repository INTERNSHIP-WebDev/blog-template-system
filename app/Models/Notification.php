<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'temp_id',
        'like_id',
        'comment_id',
        'user_id',
        'mail_id',
        'message',
        'is_read',
        'read_at',
    ];
    
    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }

    public function like()
    {
        return $this->belongsTo(Like::class, 'like_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mail()
    {
        return $this->belongsTo(Concern::class, 'mail_id');
    }
}
