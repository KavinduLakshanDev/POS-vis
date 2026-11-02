<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceJobPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['service_job_id', 'photo_path', 'original_name'];
    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        if (!$this->photo_path) {
            return null;
        }

        if (str_starts_with($this->photo_path, 'http://') || str_starts_with($this->photo_path, 'https://')) {
            return $this->photo_path;
        }

        $cleanPath = ltrim(preg_replace('#^storage/#', '', $this->photo_path), '/');
        return '/storage/' . $cleanPath;
    }
}
