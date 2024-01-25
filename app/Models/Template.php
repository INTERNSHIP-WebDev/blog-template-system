<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'banner',
        'logo',
    ];

    // Define a "deleting" event to delete related titles
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($template) {
            // When a template is being deleted, also delete its related titles
            $template->titles()->delete();
        });

        // Listen for the updating event and delete existing images
        static::updating(function ($template) {
            $template->deleteExistingImages();
        });
    }

    public function titles()
    {
        // Define the relationship between Template and Title models
        return $this->hasMany(Title::class, 'temp_id');
    }

    public function deleteExistingImages()
    {
        // Check if the banner is being updated
        if ($this->isDirty('banner')) {
            $this->deleteImage(public_path('images/banners/') . $this->getOriginal('banner'));
        }

        // Check if the logo is being updated
        if ($this->isDirty('logo')) {
            $this->deleteImage(public_path('images/logos/') . $this->getOriginal('logo'));
        }
    }

    protected function deleteImage($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }


    public function delete()
    {
        // Delete associated images
        $this->deleteImages();

        // Delete the model
        return parent::delete();
    }

     /**
     * Delete associated images.
     */
    public function deleteImages()
    {
        // Delete banner image
        if ($this->banner) {
            $bannerPath = public_path('images/banners/') . $this->banner;
            if (file_exists($bannerPath)) {
                unlink($bannerPath);
            }
        }

        // Delete logo image
        if ($this->logo) {
            $logoPath = public_path('images/logos/') . $this->logo;
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        }
    }
}
