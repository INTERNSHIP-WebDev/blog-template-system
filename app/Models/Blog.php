<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'template_id',
    ];

    protected $casts = [
        'id' => 'bigint',
        'user_id' => 'bigint',
        'template_id' => 'bigint',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id');
    }
}
