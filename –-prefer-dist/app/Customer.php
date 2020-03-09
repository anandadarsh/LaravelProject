<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;


    /**
     * Table name.
     *
     * @var array
     */

    protected $table = 'customer';

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
        'name', 'email', 'phone', 'discount_id'
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

    /**
     * Add new record
     * @param Array
     */


    public static function addNewRecord($dataArray)
    {
        $res = self::create($dataArray);
        return $res ? $res->id : 0;
    }

    /**
     * update customer discount
     * @param Array
     * @param UserId
     */

    public static function updateCustomerDiscount($dataArray, $userId)
    {
        $res = self::where('id', $userId)
            ->update($dataArray);
        return $res ? $res : false;
    }
}
