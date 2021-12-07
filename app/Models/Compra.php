<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $idProveedores
 * @property $idTipoCompra
 * @property $idMetodoPago
 * @property $fechaCompra
 * @property $fechaPago
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Metodopago $metodopago
 * @property Proveedore $proveedore
 * @property Tipocompra $tipocompra
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'idProveedores' => 'required',
		'idTipoCompra' => 'required',
		'idMetodoPago' => 'required',
		'fechaCompra' => 'required',
		'fechaPago' => 'required',
		'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idProveedores','idTipoCompra','idMetodoPago','fechaCompra','fechaPago','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodopago()
    {
        return $this->hasOne('App\Models\Metodopago', 'id', 'idMetodoPago');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proveedore()
    {
        return $this->hasOne('App\Models\Proveedore', 'id', 'idProveedores');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipocompra()
    {
        return $this->hasOne('App\Models\Tipocompra', 'id', 'idTipoCompra');
    }
    

}
