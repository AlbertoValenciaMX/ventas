<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipovendedore
 *
 * @property $id
 * @property $descripción
 * @property $created_at
 * @property $updated_at
 *
 * @property Venta[] $ventas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipovendedore extends Model
{
    
    static $rules = [
		'descripción' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripción'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ventas()
    {
        return $this->hasMany('App\Models\Venta', 'idTipoVenta', 'id');
    }
    

}
