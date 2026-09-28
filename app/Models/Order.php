<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal (Mass Assignment)
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
    ];

    /**
     * Relasi ke Model Product (Satu order terhubung ke satu produk)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke Model User (Satu order dimiliki oleh satu pembeli/user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Model Category melalui Product (Has One Through)
     * Kategori diambil dari produk yang di-order.
     */
    public function category()
    {
        return $this->hasOneThrough(
            Category::class,
            Product::class,
            'id',          // Foreign key di tabel products
            'id',          // Foreign key di tabel categories
            'product_id',  // Local key di tabel orders
            'category_id'  // Local key di tabel products
        );
    }
}