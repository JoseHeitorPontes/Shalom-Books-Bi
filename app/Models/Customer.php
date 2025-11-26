<?php

declare(strict_types=1);

namespace App\Models;

use App\Http\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'identifier',
        'birthdate',
        'gender',
    ];

    public function getBirthdateFormattedAttribute()
    {
        return Carbon::parse($this->birthdate)->format('d/m/Y');
    }

    public function getGenderFormattedAttribute()
    {
        return Gender::from($this->gender)->messages();
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birthdate)->age;
    }
}
