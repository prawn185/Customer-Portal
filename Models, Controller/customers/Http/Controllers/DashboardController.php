<?php namespace Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\IctAsset;
use App\Models\IctRecommendation;
use Carbon\Carbon;
use Customers\Models\Package;
use Customers\Models\Task;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController
 *
 * @package Customer\Http\Controllers
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $recent_tasks = Task::completed()
            ->orderBy('created_at', 'DESC')
            ->limit(7)
            ->get();

        $packages = Package::open()->get();

        $open_tasks = Task::active()
            ->orderBy('created_at', 'DESC')
            ->limit(20)
            ->get();

        $recommendations = IctRecommendation::
        where('customerid', Auth::user()->customerid)
            ->get();

        $machines = IctAsset::
        where('ICTI_customerID', Auth::user()->customerid)
            ->where('ICTI_renewalDate', '=<', Carbon::now())
            ->get();

        return view('customer.dashboard.index', compact('recent_tasks', 'open_tasks', 'packages', 'recommendations','machines'));
    }

}