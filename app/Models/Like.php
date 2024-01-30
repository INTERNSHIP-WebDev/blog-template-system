<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
