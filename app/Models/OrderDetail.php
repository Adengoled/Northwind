<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDetail
 * 
 * @property int $id
 * @property int $order_id
 * @property int|null $product_id
 * @property float $quantity
 * @property float|null $unit_price
 * @property float $discount
 * @property int|null $status_id
 * @property Carbon|null $date_allocated
 * @property int|null $purchase_order_id
 * @property int|null $inventory_id
 * 
 * @property OrderDetailsStatus|null $order_details_status
 * @property Order $order
 * @property Product|null $product
 *
 * @package App\Models
 */
class OrderDetail extends Model
{
	protected $table = 'order_details';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'float',
		'unit_price' => 'float',
		'discount' => 'float',
		'status_id' => 'int',
		'purchase_order_id' => 'int',
		'inventory_id' => 'int'
	];

	protected $dates = [
		'date_allocated'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'unit_price',
		'discount',
		'status_id',
		'date_allocated',
		'purchase_order_id',
		'inventory_id'
	];

	public function order_details_status()
	{
		return $this->belongsTo(OrderDetailsStatus::class, 'status_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
