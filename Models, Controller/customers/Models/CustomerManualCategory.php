<?php namespace Customers\Models;

use App\Models\BaseModel;

class CustomerManualCategory extends BaseModel
{

    public static $rules = [

    ];

    protected $table = 'customer_manual_category';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];



}