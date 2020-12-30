<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use App\Models\Profile;
use App\Models\User;
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
            ->join('companies', 'interviews.company_id', 'companies.id')
            ->select('interviews.id', 'interviews.schedule', 'companies.id as company_id', 'companies.company_name')
            ->where('interviews.user_id', '=', Auth::id())
            ->where('status', '=', 'new')
            ->whereDate('schedule', '>=', $date)
            ->get();

        $acceptedInterviews = DB::table('interviews')
            ->join('companies', 'interviews.company_id', 'companies.id')
            ->select('interviews.id', 'interviews.schedule', 'companies.id as company_id', 'companies.company_name')
            ->where('interviews.user_id', '=', Auth::id())
            ->where('status', '=', 'accepted')
            ->whereDate('schedule', '>=', $date)
            ->get();

        $rejectedInterviews = DB::table('interviews')
            ->join('companies', 'interviews.company_id', 'companies.id')
            ->select('interviews.id', 'interviews.schedule', 'companies.id as company_id', 'companies.company_name')
            ->where('interviews.user_id', '=', Auth::id())
            ->where('status', '=', 'rejected')
            ->get();

        $pastInterviews = DB::table('interviews')
            ->join('companies', 'interviews.company_id', 'companies.id')
            ->select('interviews.id', 'interviews.schedule', 'companies.id as company_id', 'companies.company_name')
            ->where('interviews.user_id', '=', Auth::id())
            ->where('status', '=', 'accepted')
            ->whereDate('schedule', '<', $date)
            ->get();

        return view('interviews', [
            'profile' => Profile::findOrFail(Auth::id()),
            'user' => User::findOrFail(Auth::id()),
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
        //
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
        if ($request->has('accept'))
            $this->accept($id);
        elseif ($request->has('reject'))
            $this->reject($id);

        return $this->index();
    }

    /**
     * Accept the requested interview
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept($id)
    {
        $interview = Interview::findOrFail($id);

        $interview->update([
            'status' => 'accepted'
        ]);
    }

    /**
     * Reject the requested interview
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        $interview = Interview::findOrFail($id);

        $interview->update([
            'status' => 'rejected'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
