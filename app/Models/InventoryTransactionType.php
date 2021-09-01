<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InventoryTransactionType
 * 
 * @property int $id
 * @property string $type_name
 * 
 * @property Collection|InventoryTransaction[] $inventory_transactions
 *
 * @package App\Models
 */
class InventoryTransactionType extends Model
{
	protected $table = 'inventory_transaction_types';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'type_name'
	];

	public function inventory_transactions()
	{
		return $this->hasMany(InventoryTransaction::class, 'transaction_type');
	}
}
