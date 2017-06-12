<?php namespace Customers\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Task extends \App\Models\Task
{

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        app('auth')->setDefaultDriver('customers');

        static::addGlobalScope('customer', function (Builder $builder) {
            $builder->where('customerid', Auth::user()->customerid);
        });
    }

}