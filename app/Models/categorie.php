<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class categorie extends Model
{
    use HasFactory;
    use HasTranslations;

    //protected $fillable=['name','notes'];

    protected $guarded=[];
    public $translatable = ['name'];


}
