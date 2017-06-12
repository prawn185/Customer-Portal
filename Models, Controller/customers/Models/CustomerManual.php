<?php namespace Customers\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;

class CustomerManual extends BaseModel
{

    public static $rules = [

    ];

    protected $table = 'customer_manual';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];



}