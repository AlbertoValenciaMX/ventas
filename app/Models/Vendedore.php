<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendedore
 *
 * @property $id
 * @property $nombre
 * @property $telefono
 * @property $email
 * @property $rfc
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido[] $pedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Vendedore extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'rfc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','telefono','email','rfc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'idVendedor', 'id');
    }
    

}
