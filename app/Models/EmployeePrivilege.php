<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeePrivilege
 * 
 * @property int $employee_id
 * @property int $privilege_id
 * 
 * @property Employee $employee
 * @property Privilege $privilege
 *
 * @package App\Models
 */
class EmployeePrivilege extends Model
{
	protected $table = 'employee_privileges';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'privilege_id' => 'int'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function privilege()
	{
		return $this->belongsTo(Privilege::class);
	}
}
