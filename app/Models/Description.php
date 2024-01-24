<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_id',
        'text',
    ];
    
    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }
}
