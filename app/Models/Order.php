<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property int|null $employee_id
 * @property int|null $customer_id
 * @property Carbon $order_date
 * @property Carbon|null $shipped_date
 * @property int|null $shipper_id
 * @property string|null $ship_name
 * @property string|null $ship_address
 * @property string|null $ship_city
 * @property string|null $ship_state_province
 * @property string|null $ship_zip_postal_code
 * @property string|null $ship_country_region
 * @property float|null $shipping_fee
 * @property float|null $taxes
 * @property string|null $payment_type
 * @property Carbon|null $paid_date
 * @property string|null $notes
 * @property float|null $tax_rate
 * @property int|null $tax_status_id
 * @property int|null $status_id
 * 
 * @property Customer|null $customer
 * @property Employee|null $employee
 * @property OrdersStatus|null $orders_status
 * @property OrdersTaxStatus|null $orders_tax_status
 * @property Shipper|null $shipper
 * @property Collection|InventoryTransaction[] $inventory_transactions
 * @property Collection|Invoice[] $invoices
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'customer_id' => 'int',
		'shipper_id' => 'int',
		'shipping_fee' => 'float',
		'taxes' => 'float',
		'tax_rate' => 'float',
		'tax_status_id' => 'int',
		'status_id' => 'int'
	];

	protected $dates = [
		'order_date',
		'shipped_date',
		'paid_date'
	];

	protected $fillable = [
		'employee_id',
		'customer_id',
		'order_date',
		'shipped_date',
		'shipper_id',
		'ship_name',
		'ship_address',
		'ship_city',
		'ship_state_province',
		'ship_zip_postal_code',
		'ship_country_region',
		'shipping_fee',
		'taxes',
		'payment_type',
		'paid_date',
		'notes',
		'tax_rate',
		'tax_status_id',
		'status_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function orders_status()
	{
		return $this->belongsTo(OrdersStatus::class, 'status_id');
	}

	public function orders_tax_status()
	{
		return $this->belongsTo(OrdersTaxStatus::class, 'tax_status_id');
	}

	public function shipper()
	{
		return $this->belongsTo(Shipper::class);
	}

	public function inventory_transactions()
	{
		return $this->hasMany(InventoryTransaction::class, 'customer_order_id');
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class);
	}
}
