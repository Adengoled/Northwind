<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Privilege
 * 
 * @property int $id
 * @property string|null $privilege_name
 * 
 * @property Collection|Employee[] $employees
 *
 * @package App\Models
 */
class Privilege extends Model
{
	protected $table = 'privileges';
	public $timestamps = false;

	protected $fillable = [
		'privilege_name'
	];

	public function employees()
	{
		return $this->belongsToMany(Employee::class, 'employee_privileges');
	}
}
