<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrderStatus
 * 
 * @property int $id
 * @property string|null $status
 * 
 * @property Collection|PurchaseOrder[] $purchase_orders
 *
 * @package App\Models
 */
class PurchaseOrderStatus extends Model
{
	protected $table = 'purchase_order_status';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'status'
	];

	public function purchase_orders()
	{
		return $this->hasMany(PurchaseOrder::class, 'status_id');
	}
}
