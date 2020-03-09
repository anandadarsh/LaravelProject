<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Discount extends Authenticatable
{
    use Notifiable;


    /**
     * Table name.
     *
     * @var array
     */

    protected $table = 'discount';

    /**
     * Custom primary key is set for the table
     *
     * @var integer
     */
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount_value', 'times_of_given'
    ];

    /**
     * Maintain created_at and updated_at automatically
     *
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Maintain created_by and updated_by automatically
     *
     * @var boolean
     */
    public $userstamps = true;


    public static function getRandomDiscount()
    {
        $res = self::orderByRaw("RAND()")
            ->where('times_of_given', '!=', '0')
            ->first();
        return $res ? $res : 0;
    }

    /**
     * update discount
     * @param Array
     * @param Id
     */

    public static function updateDiscountGivenNo($dataArray, $id)
    {
        $res = self::where('id', $id)
            ->update($dataArray);
        return $res ? $res : false;
    }
}
