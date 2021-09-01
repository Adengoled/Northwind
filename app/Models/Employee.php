<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string|null $company
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $email_address
 * @property string|null $job_title
 * @property string|null $business_phone
 * @property string|null $home_phone
 * @property string|null $mobile_phone
 * @property string|null $fax_number
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state_province
 * @property string|null $zip_postal_code
 * @property string|null $country_region
 * @property string|null $web_page
 * @property string|null $notes
 * @property boolean|null $attachments
 * 
 * @property Collection|Privilege[] $privileges
 * @property Collection|Order[] $orders
 * @property Collection|PurchaseOrder[] $purchase_orders
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	public $timestamps = false;

	protected $casts = [
		'attachments' => 'boolean'
	];

	protected $fillable = [
		'company',
		'last_name',
		'first_name',
		'email_address',
		'job_title',
		'business_phone',
		'home_phone',
		'mobile_phone',
		'fax_number',
		'address',
		'city',
		'state_province',
		'zip_postal_code',
		'country_region',
		'web_page',
		'notes',
		'attachments'
	];

	public function privileges()
	{
		return $this->belongsToMany(Privilege::class, 'employee_privileges');
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function purchase_orders()
	{
		return $this->hasMany(PurchaseOrder::class, 'created_by');
	}
}
