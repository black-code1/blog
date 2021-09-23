<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['title', 'excerpt', 'body', 'id'];
    protected $with = ['category', 'author'];

   /* public function scopeFilter($query) // Post::newQuery()->filter()
    //{
        // $query->where
        if (request('search')){
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

    }*/

     public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
        
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo((User::class));
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
