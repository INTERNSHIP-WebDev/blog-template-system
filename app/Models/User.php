<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Models\Notification;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define the hasLikedTemplate method
    public function hasLikedTemplate($templateId)
    {
        return $this->likes()->where('temp_id', $templateId)->exists();
    }

    // Define the like method
    public function like($template)
    {
        $this->likes()->attach($template);
    }

    // Define the unlike method
    public function unlike($template)
    {
        $this->likes()->detach($template);
    }

    // Define the likes relationship
    public function likes()
    {
        return $this->belongsToMany(Template::class, 'likes', 'user_id', 'temp_id')->withTimestamps();
    }

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Notification::create([
                'user_id' => $user->id,
                'message' => 'New user registered',
                'is_read' => false,
            ]);
        });
    }

}