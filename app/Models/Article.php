<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory;
    use HasSlug;

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function getLeadAttribute() {
        $data = Str::words($this->description, 30);
        $data = preg_replace("/[^a-zA-Z0-9\s !@#$%^&*().]]/u", '', strip_tags(html_entity_decode($data)));
        return $data;
    }
    
    public function getCreateTimeAttribute() {
        return $this->created_at->format('M d, Y');
    }

    public function getLastUpdateAttribute() {
        return $this->updated_at->format('M d, Y');
    }

    public function getStatusAttribute() {
        return $this->is_published ? 'Published' : 'Drafted';
    }

    public function getSlugOptions() : SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    
    // Query Helpers
    public function scopeIsPublished($query, $published) {
        return $query->where('is_published', $published);
    }

    public function scopeSearchArticle($query, $q) {
        return $query->where('title','like', '%'.$q.'%')
        ->orWhere('description','like', '%'.$q.'%');
    }
}
