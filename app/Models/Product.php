<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'unit',
        'price',
        'stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    protected function priceRupiah(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => 'Rp ' . number_format($attributes['price'], 0, ',', '.')
        );
    }

    protected function stockValue(): Attribute
    {
        return Attribute::get(fn () => $this->stock * $this->price);
    }

    protected function stockStatus(): Attribute
    {
        return Attribute::get(function () {
            if ($this->stock == 0) {
                return 'Habis';
            }

            if ($this->stock < config('inventory.low_stock_threshold')) {
                return 'Menipis';
            }

            return 'Aman';
        });
    }

}
