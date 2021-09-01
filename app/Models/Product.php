<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property string|null $supplier_ids
 * @property int $id
 * @property string|null $product_code
 * @property string|null $product_name
 * @property string|null $description
 * @property float|null $standard_cost
 * @property float $list_price
 * @property int|null $reorder_level
 * @property int|null $target_level
 * @property string|null $quantity_per_unit
 * @property bool $discontinued
 * @property int|null $minimum_reorder_quantity
 * @property string|null $category
 * @property boolean|null $attachments
 * 
 * @property Collection|InventoryTransaction[] $inventory_transactions
 * @property Collection|OrderDetail[] $order_details
 * @property Collection|PurchaseOrderDetail[] $purchase_order_details
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	public $timestamps = false;

	protected $casts = [
		'standard_cost' => 'float',
		'list_price' => 'float',
		'reorder_level' => 'int',
		'target_level' => 'int',
		'discontinued' => 'bool',
		'minimum_reorder_quantity' => 'int',
		'attachments' => 'boolean'
	];

	protected $fillable = [
		'supplier_ids',
		'product_code',
		'product_name',
		'description',
		'standard_cost',
		'list_price',
		'reorder_level',
		'target_level',
		'quantity_per_unit',
		'discontinued',
		'minimum_reorder_quantity',
		'category',
		'attachments'
	];

	public function inventory_transactions()
	{
		return $this->hasMany(InventoryTransaction::class);
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class);
	}

	public function purchase_order_details()
	{
		return $this->hasMany(PurchaseOrderDetail::class);
	}
}
