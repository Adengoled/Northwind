<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int|null $order_id
 * @property Carbon $invoice_date
 * @property Carbon|null $due_date
 * @property float|null $tax
 * @property float|null $shipping
 * @property float|null $amount_due
 * 
 * @property Order|null $order
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'tax' => 'float',
		'shipping' => 'float',
		'amount_due' => 'float'
	];

	protected $dates = [
		'invoice_date',
		'due_date'
	];

	protected $fillable = [
		'order_id',
		'invoice_date',
		'due_date',
		'tax',
		'shipping',
		'amount_due'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
