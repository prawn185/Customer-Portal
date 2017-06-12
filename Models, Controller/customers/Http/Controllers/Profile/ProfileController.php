<?php namespace Customers\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


/**
 * Class ProfileController
 *
 * @package Customer\Http\Controllers
 */
class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profile = Auth::user()->get();

        return view('customer.profile.index', compact('profile'));
    }
    /*
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


}