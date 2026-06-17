<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
     use HasFactory;
     protected $fillable = ['title', 'author_id', 'category_id', 'slug', 'body'];
     // protected $Guarded = [];

     protected $with = ['author', 'category'];

     public function author(): BelongsTo
     {
          return $this->belongsTo(User::class);
     }
     public function category(): BelongsTo
     {
          return $this->belongsTo(Category::class);
     }

     public function ScopeFilter(Builder $query, array $filters): void
     {
          $query->when($filters['search'] ?? false, function ($query, $search) {
               return $query->where('title', 'like', '%' . $search . '%');
          });
          $query->when($filters['category'] ?? false, function ($query, $category) {
               return $query->whereHas(
                    'category',
                    fn(builder $query) =>
                    $query->where('slug', $category)
               );
          });

          $query->when($filters['author'] ?? false, function ($query, $author) {
               return $query->whereHas(
                    'author',
                    fn(builder $query) =>
                    $query->where('username', $author)
               );
          });
     }
}
