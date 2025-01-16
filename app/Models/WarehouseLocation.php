<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseLocation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    /**
     * Relasi ke tabel items.
     * Satu lokasi gudang bisa menyimpan banyak barang.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
