<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeWeight extends Model
{
    use HasFactory;

    protected $table = 'alternative_weights';

    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
