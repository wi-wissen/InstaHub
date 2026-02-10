<?php

namespace App\Models;

use Browser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Analytic extends Model
{
    // protected $fillable = ['ip', 'device', 'brand_family', 'brand_model', 'browser_family', 'browser_version', 'platform_family', 'platform_version', 'user_id', 'photo_id'];
    protected $fillable = ['user_id', 'photo_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = preg_replace(['/\.\d*$/', '/[\da-f]*:[\da-f]*$/'], ['.0', '0:0'], \Request::ip());
            if (Browser::isMobile()) {
                $model->device = 'mobile';
            }
            if (Browser::isTablet()) {
                $model->device = 'tablet';
            }
            if (Browser::isDesktop()) {
                $model->device = 'desktop';
            }
            if (Browser::isBot()) {
                $model->device = 'bot';
            }
            $model->browser_family = Browser::browserFamily();
            $model->browser_version = Browser::browserVersion();
            $model->platform_family = Browser::platformFamily();
            $model->platform_version = Browser::platformVersion();
            $model->brand_family = Browser::deviceFamily();
            $model->brand_model = Browser::deviceModel();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }

    public function getBrowserAttribute()
    {
        return $this->browser_family.' '.$this->browser_version;
    }

    public function getBrandAttribute()
    {
        return $this->device_family.' '.$this->device_model;
    }
}
