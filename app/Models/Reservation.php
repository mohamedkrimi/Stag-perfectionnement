<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'produit_id',
        'user_id',
        'is_deleted',
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class,'produit_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
