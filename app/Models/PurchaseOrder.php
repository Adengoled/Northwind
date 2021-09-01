<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 * 
 * @property int $id
 * @property int|null $supplier_id
 * @property int|null $created_by
 * @property Carbon|null $submitted_date
 * @property Carbon $creation_date
 * @property int|null $status_id
 * @property Carbon|null $expected_date
 * @property float $shipping_fee
 * @property float $taxes
 * @property Carbon|null $payment_date
 * @property float|null $payment_amount
 * @property string|null $payment_method
 * @property string|null $notes
 * @property int|null $approved_by
 * @property Carbon|null $approved_date
 * @property int|null $submitted_by
 * 
 * @property Employee|null $employee
 * @property PurchaseOrderStatus|null $purchase_order_status
 * @property Supplier|null $supplier
 * @property Collection|InventoryTransaction[] $inventory_transactions
 * @property Collection|PurchaseOrderDetail[] $purchase_order_details
 *
 * @package App\Models
 */
class PurchaseOrder extends Model
{
	protected $table = 'purchase_orders';
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int',
		'created_by' => 'int',
		'status_id' => 'int',
		'shipping_fee' => 'float',
		'taxes' => 'float',
		'payment_amount' => 'float',
		'approved_by' => 'int',
		'submitted_by' => 'int'
	];

	protected $dates = [
		'submitted_date',
		'creation_date',
		'expected_date',
		'payment_date',
		'approved_date'
	];

	protected $fillable = [
		'supplier_id',
		'created_by',
		'submitted_date',
		'creation_date',
		'status_id',
		'expected_date',
		'shipping_fee',
		'taxes',
		'payment_date',
		'payment_amount',
		'payment_method',
		'notes',
		'approved_by',
		'approved_date',
		'submitted_by'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'created_by');
	}

	public function purchase_order_status()
	{
		return $this->belongsTo(PurchaseOrderStatus::class, 'status_id');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	public function inventory_transactions()
	{
		return $this->hasMany(InventoryTransaction::class);
	}

	public function purchase_order_details()
	{
		return $this->hasMany(PurchaseOrderDetail::class);
	}
}
