<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
