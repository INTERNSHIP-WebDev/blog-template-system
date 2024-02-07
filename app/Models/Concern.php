<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;

class Concern extends Model
{
    use HasFactory;
    protected $fillable = [
        'send_name',
        'send_email',
        'subject',
        'message',
        'rcpt_name',
        'rcpt_email',
        'temp_id',
        'status',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($concern) {
            Notification::create([
                'mail_id' => $concern->id,
                'message' => 'New mail received',
                'is_read' => false,
            ]);
        });
    }

}


