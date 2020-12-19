<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        $myUser = User::findOrFail(Auth::id());

        $visitedUser = User::findOrFail($id);

        return view('profile.show', [
            'profile' => Profile::findOrFail($id),
            'user' => $myUser,
            'visitedUser' => $visitedUser,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id != Auth::id())
            abort(403, 'Unauthorized action.');

        $user = User::findOrFail($id);

        return view('profile.edit', [
            'profile' => Profile::findOrFail($id),
            'user' => $user
        ]);
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
        $profile = Profile::findOrFail($id);
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'picture',
            'cover_image',
            'sn_twitter',
            'sn_facebook',
            'sn_instagram',
            'sn_linkedin',
            'job_description' => ['required', 'string', 'max:255'],
            'website',
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'cv',
        ]);

        $profile = $profile->update($request->all());

        $user = $user->update($request->all());

        return view('profile.show', [
            'profile' => Profile::findOrFail($id),
            'user' => User::findOrFail($id),
            'visitedUser' => User::findOrFail($id),
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
