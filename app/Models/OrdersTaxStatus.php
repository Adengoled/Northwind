<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdersTaxStatus
 * 
 * @property int $id
 * @property string $tax_status_name
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class OrdersTaxStatus extends Model
{
	protected $table = 'orders_tax_status';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'tax_status_name'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'tax_status_id');
	}
}
