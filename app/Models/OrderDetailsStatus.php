<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDetailsStatus
 * 
 * @property int $id
 * @property string $status_name
 * 
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class OrderDetailsStatus extends Model
{
	protected $table = 'order_details_status';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'status_name'
	];

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class, 'status_id');
	}
}
