<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title','slug','description','image'];

    public function searchableAs(): string
    {
        return 'products_index';
    }

}
