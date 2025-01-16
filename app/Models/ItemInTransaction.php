<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemInTransaction extends Model
{
  protected $fillable = ['item_id', 'quantity', 'transaction_date', 'description'];

  public function item()
  {
    return $this->belongsTo(Item::class);
  }
}
