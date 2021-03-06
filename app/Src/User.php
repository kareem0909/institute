<?php

namespace App\Src;

use App\Post;
use App\Core\Traits\LocaleTrait;
use App\Scopes\ScopeActive;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, LocaleTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name' ,'email', 'password', 'description_ar', 'description_en', 'avatar' , 'video_url','pdf','other_link' , 'mobile'
    ];
    public $localeStrings = ['description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The "booting" method of the model.
     * applying the scope only in the backend routes.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        if (!request()->is('backend/*')) {

            static::addGlobalScope(new ScopeActive());

        }

    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function gallery()
    {
        return $this->morphMany(Gallery::class,'galleryable');
    }

    public function scopeSubscribed($q)
    {
        $q->where('subscribed', 'paid');
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


}