<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['item_id', 'transaction_type', 'quantity', 'transaction_date', 'description'];

    /**
     * Relasi ke tabel items.
     * Setiap transaksi hanya berhubungan dengan satu barang.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Relasi ke tabel users.
     * Setiap transaksi dicatat oleh satu admin.
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'created_by');
    // }
}
