<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'sku', 'description', 'quantity', 'unit', 'photo'];

    /**
     * Relasi ke tabel item_transactions.
     * Satu barang bisa memiliki banyak transaksi.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function itemInTransactions()
    {
        return $this->hasMany(ItemInTransaction::class);
    }

    public function itemOutTransactions()
    {
        return $this->hasMany(ItemOutTransaction::class);
    }

    public function calculateStock(): int
    {
        $stockIn = $this->itemInTransactions()->sum('quantity');
        $stockOut = $this->itemOutTransactions()->sum('quantity');
        return $stockIn - $stockOut;
    }
}
