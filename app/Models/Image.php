<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'temp_id',
        'file',
    ];
    
    public function template()
    {
        return $this->belongsTo(Template::class, 'temp_id');
    }
}
