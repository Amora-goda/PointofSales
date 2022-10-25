<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function categorie()
    {
        return $this->belongsTo(categorie::class,'categorie_id');
    }

    public function product()
    {
        return $this->belongsTo(product::class,'product_id');
    }
}
