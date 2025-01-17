<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['item_id', 'quantity', 'transaction_date'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
