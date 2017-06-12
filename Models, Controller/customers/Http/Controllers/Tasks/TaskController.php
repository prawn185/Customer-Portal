<?php

namespace Customers\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Note;
use App\Models\Package;
use Customers\Models\Task;

use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use PDF;

/**
 * Class TaskController
 *
 * @package Customer\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tasks = Task::active()
            ->with('taskNotes', 'attachments')
            ->orderBy('histid', 'DESC')
            ->limit($request->get('task-filter', 3))
            ->get();

        $packages = Package::where('customerid', Auth::User()->customerid)->get();

        //$selected_categories = array();

//        foreach($categories as $category) {
//            $selected_categories[$category->id] = $category->title;
//        }


        foreach ($packages as $package) {
            $package_array[$package['packid']] = $package['packagename'];
        }

        return view('customer.tasks.index', compact('tasks', 'package_array'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function taskData()
    {
        $tasks = Task::active()
            ->with('taskNotes', 'attachments')
            ->orderBy('histid', 'DESC')
            ->limit(100)
            ->get();

        return $tasks;
    }


    /**
     * This is where the logic is for completed tasks
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function completed()
    {
        $tasks = Task::completed()
            ->with('taskNotes', 'attachments', 'assigned', 'times')
            ->orderBy('histid', 'desc')
            ->limit(3000)
            ->get();

        return view('customer.tasks.completed', compact('tasks'));
    }


    /**
     * @param Task $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Task $task)
    {
        $task->load('notes', 'attachments');

        return view('customer.tasks.view', compact('task'));
    }


    /**
     * Here we can complete tasks
     *
     * @param Task $task
     *
     * @return Redirect
     */
    public function complete(Task $task)
    {
        $task->histstatus = 'Completed';
        $task->save();

        return redirect()
            ->route('customer.tasks.index')
            ->with('success', 'Your task has been completed');
    }


    /**
     * Here we can complete tasks
     *
     * @param Request $request
     * @param Task    $task
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Task $task)
    {

        $this->validate($request, [
            'histtitle'       => 'required',
            'histdescription' => 'required',
        ]);

        if ($request->get('priority') == 0) {
            $task->prioritytype = "TOP";
        }

        $task->fill($request->all());
        $task->save();

        return redirect()
            ->route('customer.tasks.index')
            ->with('success', 'Task Updated');
    }


    /**
     * Here we can complete tasks
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addNote(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);
        $id = $request->get('id');

        $task              = Task::where('histid', $id)->get();
        $note              = new Note;
        $note->histid      = $id;
        $note->description = $request->get('description');
        $note->date        = time();
        $note->memberid    = 1;
        $note->customerid  = Auth::user()->customerid;
        $note->packid      = $task[0]->packid;
        $note->numhours    = 0;
        $note->person      = Auth::user()->name;
        $note->save();

        return back()->with('success', 'Note Added');
    }


    /**
     * Here we can attach an attachment to a task
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function attach(Request $request)
    {
        $file = $request->file('add-attachment');

        if (isset($file) != "") {

            $now = Carbon::now()->utc;
            $directory = "file/task-attachment/" . $request->get('id') . "/";

            var_dump(file_exists($directory));

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $extension      = $file->getClientOriginalExtension();
            $filename       = $now . $file->getClientOriginalName() . '.' . $extension;
            $upload_success = $file->move($directory, $filename);

            if ($upload_success) {

//            $path             = $request->photo->storeAs('attachments', 'filename.jpg');
                $attach           = new Attachment();
                $attach->histid   = $request->get('id');
                $attach->filename = $filename;
                $attach->histid   = $request->get('id');
                $attach->save();

                return redirect()
                    ->route('customer.tasks.index')
                    ->with('success', 'File Uploaded');
            }
        }

        return redirect()
            ->route('customer.tasks.index')
            ->with('error', 'File Not uploaded');
    }


    /**
     * Here we can Create a task
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {

        $this->validate($request, [
            'histtitle'       => 'required',
            'histdescription' => 'required',
            'time_allocated'  => 'required',
            'packid'          => 'required',
        ]);

        $task                  = new Task;
        $task->histtitle       = $request->get('histtitle');
        $task->histdescription = $request->get('histdescription');
        $task->histcreatedby   = 1;
        $task->histstatus      = "Not Started";
        $task->histtype        = "Task";
        $task->sendupdates     = "Yes";
        $task->customerid      = Auth::user()->customerid;
        $task->timeallocated   = $request->get('time_allocated');
        $task->histassignedto  = 0;
        $task->packid          = $request->get('packid');
        $task->created_at      = Carbon::now();


        $task->save();

        return redirect()
            ->route('customer.tasks.index')
            ->with('success', 'Task Created');
    }


    /**
     * @return mixed
     */
    public function createPDF()
    {
        // Load the view
        $pdf = PDF::loadView('pdf.task.task-list', [
            'tasks' => $this->taskData()
        ]);
        $pdf->setOption('viewport-size', '1024x1024');
        $pdf->setOption('enable-local-file-access', true);
        $pdf->setOption('header-spacing', '0');
        $pdf->setOption('margin-right', '0');
        $pdf->setOption('margin-left', '0');

        return $pdf;
    }


    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function sendpdf(Request $request)
    {

        $emails = Input::get('email');
        $this->validate($request, ['email' => 'required']);


        // PDF Location
        $file     = 'task-list' . '-' . strtotime('Now') . '.pdf';
        $filePath = storage_path('task-list' . DIRECTORY_SEPARATOR . Auth::user()->customerid . DIRECTORY_SEPARATOR) . $file;

        // Save PDF
        if (!File::exists($filePath)) {
            $this->createPDF()->save($filePath);
        }

        // Subject
        $subject = 'Your current Task List';

        // Set data for use in email
        $data = [
            'tasks_open'               => Task::active()->get(),
            'tasks_all'                => Task::all(),
            'tasks_completed'          => Task::completed()->get(),
            'tasks_recently_completed' => Task::CompletedRecently()->get(),
        ];

        // Send Email
        Mail::send(['html' => 'customer.emails.tasks'], $data,
            function ($message) use ($subject, $filePath, $emails) {
                $message->attach($filePath);
                $message->subject($subject);
                $message->to($emails);
            });


        return redirect()
            ->route('customer.tasks.index')
            ->with('success', 'Task list PDF sent');

    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public function reinstateTask($id)
    {
        $task = Task::find($id);
        $task->reinstateTask();

        return redirect()
            ->route('customer.tasks.view', $task->histid)
            ->with('success', 'Task Reinstated');
    }
}