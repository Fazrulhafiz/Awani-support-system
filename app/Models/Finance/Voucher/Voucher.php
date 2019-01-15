<?php

namespace App\Models\Finance\Voucher;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Finance\Voucher\Voucher
 *
 * @property string $voucher_no
 * @property string $pay_to
 * @property int $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Finance\Voucher\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\CostCentre\Role sort($direction = 'asc')
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\Role\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\Role\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\Role\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\Role\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Finance\Role\Role whereWeight($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cash_voucher';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'voucher_no', 'pay_to', 'payment_for', 'ringgit', 'rm', 'cost_centre', 'gl_code', 'created_date'];

}
