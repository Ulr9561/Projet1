<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['name', 'price', 'category_id'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
