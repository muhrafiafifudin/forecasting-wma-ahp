<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActualSale extends Model
{
    use HasFactory;

    protected $table = 'actual_sales';

    protected $guarded = [];
}
