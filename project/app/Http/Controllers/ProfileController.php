<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile;

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
        return view('profile.show', [
            'profile' => Profile::findOrFail($id)
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
        // return view('profile.edit');
        return view('profile.edit', [
            'profile' => Profile::findOrFail($id)
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

        // TODO: continue with updating the profile
        $profile = Profile::findOrFail($id);

        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'skills_description' => ['required', 'string', 'max:255'],
            'picture',
            'cover_image',
            'sn_twitter',
            'sn_facebook',
            'sn_instagram',
            'sn_skype',
            'sn_linkedin',
            'job_description' => ['required', 'string', 'max:255'],
            'website',
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'cv',
        ]);

        Profile::save($request->all());

        return redirect()->back();
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
