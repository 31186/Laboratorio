<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Educations;
use App\Models\UsersCompanies;

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
        $usersCompanies = UsersCompanies::where('user_id', $id)->get();

        // TODO: get companies and get charities in separate (same for edit)

        // $businesses = Company::where([
        //     ['id', $usersCompanies],
        //     ['company_type_id', 1],
        // ])->get();
            
        // $charities = Company::where([
        //     ['id', $usersCompanies],
        //     ['company_type_id', 2],
        // ])->get();

        return view('profile.show', [
            'profile' => Profile::findOrFail($id),
            'user' => User::findOrFail(Auth::id()),
            'visitedUser' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
            'certificates' => Certificates::where('profile_id', $id)->get(),
            'usersCompanies' => UsersCompanies::where('user_id', $id)->get(),
            'charities' => UsersCompanies::where('user_id', $id)->get(),
            // 'usersCompanies' => $businesses,
            // 'charities' => $charities,
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

        return view('profile.edit', [
            'profile' => Profile::findOrFail($id),
            'user' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
            'certificates' => Certificates::where('profile_id', $id)->get(),
            'usersCompanies' => UsersCompanies::where('user_id', $id)->get(),
            'charities' => UsersCompanies::where('user_id', $id)->get(),
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
            'description' => ['string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'picture' => ['string', 'max:255'],
            'cover_image' => ['string', 'max:255'],
            'sn_twitter' => ['string', 'max:255'],
            'sn_facebook' => ['string', 'max:255'],
            'sn_instagram' => ['string', 'max:255'],
            'sn_linkedin' => ['string', 'max:255'],
            'job_description' => ['required', 'string', 'max:255'],
            'website' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'education_title' => ['string', 'max:255'],
            'education_description' => ['string', 'max:255'],
            'education_institution' => ['string', 'max:255'],
            'education_start_date' => ['date', 'max:255'],
            'education_end_date' => ['date', 'max:255'],
        ]);

        Educations::create([
            'title' => $request->education_title,
            'institution' => $request->education_institution,
            'description' => $request->education_description,
            'start_date' => $request->education_start_date,
            'end_date' => $request->education_end_date,
            'profile_id' => $profile->id
        ]);

        $profile = $profile->update($request->all());

        $user = $user->update($request->all());

        return view('profile.show', [
            'profile' => Profile::findOrFail($id),
            'user' => User::findOrFail($id),
            'visitedUser' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
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
