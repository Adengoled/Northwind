<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrderDetail
 * 
 * @property int $id
 * @property int $purchase_order_id
 * @property int|null $product_id
 * @property float $quantity
 * @property float $unit_cost
 * @property Carbon|null $date_received
 * @property bool $posted_to_inventory
 * @property int|null $inventory_id
 * 
 * @property InventoryTransaction|null $inventory_transaction
 * @property Product|null $product
 * @property PurchaseOrder $purchase_order
 *
 * @package App\Models
 */
class PurchaseOrderDetail extends Model
{
	protected $table = 'purchase_order_details';
	public $timestamps = false;

	protected $casts = [
		'purchase_order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'float',
		'unit_cost' => 'float',
		'posted_to_inventory' => 'bool',
		'inventory_id' => 'int'
	];

	protected $dates = [
		'date_received'
	];

	protected $fillable = [
		'purchase_order_id',
		'product_id',
		'quantity',
		'unit_cost',
		'date_received',
		'posted_to_inventory',
		'inventory_id'
	];

	public function inventory_transaction()
	{
		return $this->belongsTo(InventoryTransaction::class, 'inventory_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function purchase_order()
	{
		return $this->belongsTo(PurchaseOrder::class);
	}
}
