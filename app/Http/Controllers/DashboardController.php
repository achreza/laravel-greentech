<?php

namespace App\Http\Controllers;

use App\Enums\PositionType;
use App\Models\StatusAbstract;
use App\Models\Submission;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function initial()
    {

        if (auth()->user() == PositionType::admin) {
            return view('main.dashboard');
        } else if (auth()->user()->id_role_user == PositionType::participant || auth()->user()->id_role_user == PositionType::presenter) {
            return view('main.dash');
        }
    }
    public function index(Request $request)
    {
        $userId = $request->session()->get('user.id_role_user');
        $id = $request->session()->get('user.id_user');

        if ($request->session()->get('user.id_role_user') == 2 || $request->session()->get('user.id_role_user') == 3) {

            $submissionAllData = Submission::where('id_user', $id)->get();


            $accept = Submission::where('id_status_abs', 2)
                ->where('id_user', $id)
                ->count();

            $reject = Submission::where('id_status_abs', 3)
                ->where('id_user', $id)
                ->count();

            $all = Submission::where('id_user', $id)
                ->count();
            $page = 'content';

            return view('main.dashboard', compact('submissionAllData', 'accept', 'reject', 'all', 'page'));
        } else if ($request->session()->get('user.id_role_user') == 1) {
            $submissionAllData = Submission::all();

            $accept = Submission::where('id_status_abs', 2)
                ->count();

            $reject = Submission::where('id_status_abs', 3)
                ->count();

            $all = Submission::count();
            $page = 'content';

            return view('main.dashboard', compact('submissionAllData', 'accept', 'reject', 'all', 'page'));
        } else {
            $submissionAllData = Submission::all();

            $accept = Submission::where('id_status_abs', 2)
                ->count();

            $reject = Submission::where('id_status_abs', 3)
                ->count();

            $all = Submission::count();
            $page = 'content';


            return view('main.dashboard', compact('submissionAllData', 'accept', 'reject', 'all', 'page'));
        }
    }

    public function detail($id)
    {
        $submission = Submission::find($id);
        $topics = Topic::all();
        $status = StatusAbstract::all();
        $reviewer = User::where('id_role_user', 4)->get();
        $page = 'content';

        if (request()->session()->get('user.id_role_user') == 1) {
            return view('admin.detail', compact('submission', 'topics', 'status', 'reviewer', 'page'));
        } else {
            return view('reviewer.detail', compact('submission', 'topics', 'status', 'reviewer', 'page'));
        }
    }

    // Reviewer
    public function makeDecision(Request $request, $id)
    {
        $data = $request->validate([
            'comment' => 'nullable',
            'status' => 'required',
        ]);

        $submission = Submission::find($id);
        $submission->comment = $data['comment'];
        $submission->decission_by = Auth::id();
        $submission->decission_at = now();
        $submission->id_status_abs = $data['status'];
        $submission->save();

        return redirect('/reviewer/dashboard')->with('success', 'Data updated successfully!');
    }
}