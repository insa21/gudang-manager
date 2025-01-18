<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'sku', 'category_id', 'stock', 'image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockIns()
    {
        return $this->hasMany(StockIn::class);
    }

    public function stockOuts()
    {
        return $this->hasMany(StockOut::class);
    }

    public function getStockAttribute()
    {
        $stockIn = $this->stockIns()->sum('quantity'); // Total barang masuk
        $stockOut = $this->stockOuts()->sum('quantity'); // Total barang keluar

        return $stockIn - $stockOut; // Hitung stok saat ini
    }
}
