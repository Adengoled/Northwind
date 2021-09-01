<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdersStatus
 * 
 * @property int $id
 * @property string $status_name
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class OrdersStatus extends Model
{
	protected $table = 'orders_status';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'status_name'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'status_id');
	}
}
