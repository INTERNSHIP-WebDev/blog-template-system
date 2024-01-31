<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}


