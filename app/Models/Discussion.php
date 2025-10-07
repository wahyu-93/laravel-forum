<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Conner\Likeable\Likeable;

class Discussion extends Model
{
    use HasFactory, SoftDeletes, Likeable;

    protected $fillable = ['user_id','category_id','title','content_preview','content','published'];

    // gunanya supaya tampilannya di blade jadi true/false bukan 1/0
    protected $casts = [
        'published'  => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->slug = Str::slug($model->title);
        });

        static::updating(function($model){
            $model->slug = Str::slug($model->title);
            $model->status = 'updated';
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
