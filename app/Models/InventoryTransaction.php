<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventoryTransaction
 * 
 * @property int $id
 * @property int $transaction_type
 * @property Carbon $transaction_created_date
 * @property Carbon $transaction_modified_date
 * @property int $product_id
 * @property int $quantity
 * @property int|null $purchase_order_id
 * @property int|null $customer_order_id
 * @property string|null $comments
 * 
 * @property InventoryTransactionType $inventory_transaction_type
 * @property Order|null $order
 * @property Product $product
 * @property PurchaseOrder|null $purchase_order
 * @property Collection|PurchaseOrderDetail[] $purchase_order_details
 *
 * @package App\Models
 */
class InventoryTransaction extends Model
{
	protected $table = 'inventory_transactions';
	public $timestamps = false;

	protected $casts = [
		'transaction_type' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'purchase_order_id' => 'int',
		'customer_order_id' => 'int'
	];

	protected $dates = [
		'transaction_created_date',
		'transaction_modified_date'
	];

	protected $fillable = [
		'transaction_type',
		'transaction_created_date',
		'transaction_modified_date',
		'product_id',
		'quantity',
		'purchase_order_id',
		'customer_order_id',
		'comments'
	];

	public function inventory_transaction_type()
	{
		return $this->belongsTo(InventoryTransactionType::class, 'transaction_type');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'customer_order_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function purchase_order()
	{
		return $this->belongsTo(PurchaseOrder::class);
	}

	public function purchase_order_details()
	{
		return $this->hasMany(PurchaseOrderDetail::class, 'inventory_id');
	}
}
