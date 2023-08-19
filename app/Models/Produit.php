<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'prix',
        'description',
        'categorie_id',

        'is_deleted',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'categorie_id');
    }

}
