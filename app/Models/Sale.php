<?php

declare(strict_types=1);

namespace App\Models;

use App\Http\Enums\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'total',
        'payment_method',
    ];

    public function getPaymentMethodFormattedAttribute()
    {
        return PaymentMethod::from($this->payment_method)->messages();
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }
}
