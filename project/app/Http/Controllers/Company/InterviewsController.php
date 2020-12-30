<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\User;
use App\Models\Company;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InterviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d H:i:s', time());

        $newInterviews = DB::table('interviews')
            ->join('users', 'interviews.user_id', 'users.id')
            ->select('interviews.id', 'interviews.schedule', 'users.id as user_id', 'users.first_name', 'users.last_name')
            ->where('interviews.company_id', '=', Auth::id())
            ->where('status', '=', 'new')
            ->whereDate('schedule', '>=', $date)
            ->get();

        $acceptedInterviews = DB::table('interviews')
            ->join('users', 'interviews.user_id', 'users.id')
            ->select('interviews.id', 'interviews.schedule', 'users.id as user_id', 'users.first_name', 'users.last_name')
            ->where('interviews.company_id', '=', Auth::id())
            ->where('status', '=', 'accepted')
            ->whereDate('schedule', '>=', $date)
            ->get();

        $rejectedInterviews = DB::table('interviews')
            ->join('users', 'interviews.user_id', 'users.id')
            ->select('interviews.id', 'interviews.schedule', 'users.id as user_id', 'users.first_name', 'users.last_name')
            ->where('interviews.company_id', '=', Auth::id())
            ->where('status', '=', 'rejected')
            ->get();

        $pastInterviews = DB::table('interviews')
            ->join('users', 'interviews.user_id', 'users.id')
            ->select('interviews.id', 'interviews.schedule', 'users.id as user_id', 'users.first_name', 'users.last_name')
            ->where('interviews.company_id', '=', Auth::id())
            ->where('status', '=', 'accepted')
            ->whereDate('schedule', '<', $date)
            ->get();

        return view('company.interviews', [
            'page' => Page::findOrFail(Auth::id()),
            'company' => Company::findOrFail(Auth::id()),
            'newInterviews' => $newInterviews,
            'acceptedInterviews' => $acceptedInterviews,
            'rejectedInterviews' => $rejectedInterviews,
            'pastInterviews' => $pastInterviews,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'schedule' => ['required', 'date'],
        ]);

        User::findOrFail($request->user_id);

        Interview::create([
            'status' => 'new',
            'schedule' => $request->schedule,
            'user_id' => $request->user_id,
            'company_id' => Auth::id(),
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interview = Interview::findOrFail($id);

        $request->validate([
            "interview_status" => ['required', 'string', 'max:255'],
            "schedule" => ['required', 'date'],
        ]);

        $interview->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interview = Interview::findOrFail($id);

        $interview->delete();

        return $this->index();
    }
}
