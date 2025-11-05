<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'publisher',
        'international_standard_book_number',
        'publication_year',
        'image',
        'cost_price',
        'sale_price',
    ];
}
