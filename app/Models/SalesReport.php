<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesReport
 * 
 * @property string $group_by
 * @property string|null $display
 * @property string|null $title
 * @property string|null $filter_row_source
 * @property bool $default
 *
 * @package App\Models
 */
class SalesReport extends Model
{
	protected $table = 'sales_reports';
	protected $primaryKey = 'group_by';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'default' => 'bool'
	];

	protected $fillable = [
		'display',
		'title',
		'filter_row_source',
		'default'
	];
}
