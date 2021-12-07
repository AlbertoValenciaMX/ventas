<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocione
 *
 * @property $id
 * @property $descripcion
 * @property $descuento
 * @property $created_at
 * @property $updated_at
 *
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Promocione extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'descuento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','descuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'idPromocion', 'id');
    }
    

}
