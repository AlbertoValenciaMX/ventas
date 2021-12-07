<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 *
 * @property $id
 * @property $idPedido
 * @property $idTipoVenta
 * @property $idMetodoPago
 * @property $idPromocion
 * @property $fechaCompra
 * @property $fechaPago
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Factura[] $facturas
 * @property Metodopago $metodopago
 * @property Pedido $pedido
 * @property Promocione $promocione
 * @property Tipovendedore $tipovendedore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Venta extends Model
{
    
    static $rules = [
		'idPedido' => 'required',
		'idTipoVenta' => 'required',
		'idMetodoPago' => 'required',
		'idPromocion' => 'required',
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
    protected $fillable = ['idPedido','idTipoVenta','idMetodoPago','idPromocion','fechaCompra','fechaPago','total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Models\Factura', 'idVenta', 'id');
    }
    
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
    public function pedido()
    {
        return $this->hasOne('App\Models\Pedido', 'id', 'idPedido');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function promocione()
    {
        return $this->hasOne('App\Models\Promocione', 'id', 'idPromocion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipovendedore()
    {
        return $this->hasOne('App\Models\Tipovendedore', 'id', 'idTipoVenta');
    }
    

}
