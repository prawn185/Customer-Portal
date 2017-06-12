<?php namespace Customers\Http\Controllers\Manual;

use App\Http\Controllers\Controller;
use Customers\Models\CustomerManual;
use Customers\Models\CustomerManualCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pheanstalk\Response;

/**
 * Class ManualController
 *
 * @package Customer\Http\Controllers
 */
class ManualController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $selected_categories = array();

        $categories = CustomerManualCategory::where('customerid', Auth::User()->customerid)
            ->orderBy('priority','asc')
            ->get();


        foreach($categories as $category) {
            $selected_categories[$category->id] = $category->title;
        }

        $i = 1;

        return view('customer.manual.index', compact('categories', 'i', 'selected_categories'));
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {


        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'parent'      => 'required'
        ]);

        $manual = new CustomerManual();

        $manual->title      = $request->get('title');
        $manual->content    = $request->get('description');
        $manual->author     = Auth::User()->contactid;
        $manual->customerid = Auth::User()->customerid;
        $manual->parent     = $request->get('parent');

        $manual->save();

        return redirect()
            ->route('customer.manual.view', $manual->id)
            ->with('success', 'Manual Entry Created');

    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function createCategory(Request $request)
    {

        $this->validate($request, [
            'title'       => 'required',
        ]);

        $manual = new CustomerManualCategory();

        $manual->title      = $request->get('title');
        $manual->content    = $request->get('description');
        $manual->customerid = Auth::User()->customerid;

        $manual->save();

        return redirect()
            ->route('customer.manual.index')
            ->with('success', 'Manual Entry Created');

    }


    /**
     * @param $category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function viewCategory($category)
    {
        $manuals = CustomerManual::where('customerid', Auth::User()->customerid)
            ->where('parent', $category)
            ->get();
        $category = CustomerManualCategory::find($category);


        return view('customer.manual.category', compact('manuals','category'));
    }


    /**
     * @param $manual
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function view($manual)
    {

        $manual_entry = CustomerManual::find($manual);

        return view('customer.manual.view', compact('manual_entry'));
    }


    /**
     * @param Response       $request
     * @param CustomerManual $manual
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function edit(Request $request, CustomerManual $manual)
    {
        $input['title']     = $request->title;
        $input['content']   = $request->manual_content;

        $manual->fill($input);
        $manual->save();
        return redirect()
            ->route('customer.manual.view', $manual->id)
            ->with('success', 'Manual Updated');

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchBox()
    {

        return view('customer.manual.search');

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchResults(Request $request)
    {
        $manuals = CustomerManual::where('title', 'LIKE', "%{$request->search}%" )->where('customerid', Auth::user()->customerid)->get();

        $search_string = $request->search;

        return view('customer.manual.results', compact('manuals', 'search_string'));

    }

}