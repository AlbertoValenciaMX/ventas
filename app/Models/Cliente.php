<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $idTipoCliente
 * @property $nombre
 * @property $domicilio
 * @property $estado
 * @property $ciudad
 * @property $cp
 * @property $email
 * @property $telefono
 * @property $rfc
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido[] $pedidos
 * @property Tipocliente $tipocliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    static $rules = [
        'idTipoCliente' => 'required',
        'nombre' => 'required',
        'domicilio' => 'required',
        'estado' => 'required',
        'ciudad' => 'required',
        'cp' => 'required',
        'email' => 'required',
        'telefono' => 'required',
        'rfc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idTipoCliente', 'nombre', 'domicilio', 'estado', 'ciudad', 'cp', 'email', 'telefono', 'rfc'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'idCliente', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipocliente()
    {
        return $this->hasOne('App\Models\Tipocliente', 'id', 'idTipoCliente');
    }
}
