<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;
use App\Models\Company;
use App\Models\Skills;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request)
    {
        $skillsSelected = [];

        $results = DB::table('users')
            ->join('profiles', 'users.profile_id', '=', 'profiles.id')
            ->join('profiles_skills', 'profiles.id', 'profiles_skills.profile_id')
            ->join('skills', 'profiles_skills.skill_id', 'skills.id')
            ->select('users.id', 'users.first_name', 'users.last_name', 'profiles.cover_image', 'profiles.picture', 'profiles.country', 'profiles.city', 'skills.name')
            ->distinct('users.id')
            ->get();

        if ($request->input('country') !== null) {
            $profilesToSend = [];

            $profiles = DB::table('users')
                ->join('profiles', 'users.profile_id', '=', 'profiles.id')
                ->join('profiles_skills', 'profiles.id', 'profiles_skills.profile_id')
                ->join('skills', 'profiles_skills.skill_id', 'skills.id')
                ->select('users.id', 'users.first_name', 'users.last_name', 'profiles.cover_image', 'profiles.picture', 'profiles.country', 'profiles.city', 'skills.name')
                ->distinct('users.id')
                ->where('profiles.country', '=', $request->input('country'))
                ->get();

            foreach ($results as $currentProfile) {
                foreach ($profiles as $profile) {
                    if ($currentProfile->country === $profile->country) {
                        array_push($profilesToSend, $profile);
                    }
                }
            }

            $results = $profilesToSend;
        }

        if ($request->input('city') !== null) {
            $profilesToSend = [];

            $profiles = DB::table('users')
                ->join('profiles', 'users.profile_id', '=', 'profiles.id')
                ->join('profiles_skills', 'profiles.id', 'profiles_skills.profile_id')
                ->join('skills', 'profiles_skills.skill_id', 'skills.id')
                ->select('users.id', 'users.first_name', 'users.last_name', 'profiles.cover_image', 'profiles.picture', 'profiles.country', 'profiles.city', 'skills.name')
                ->distinct('users.id')
                ->where('profiles.city', '=', $request->input('city'))
                ->get();

            foreach ($results as $currentProfile) {
                foreach ($profiles as $profile) {
                    if ($currentProfile->city === $profile->city) {
                        array_push($profilesToSend, $profile);
                    }
                }
            }

            $results = $profilesToSend;
        }

        if ($request->input('skills_array') !== null) {
            $profilesToSend = [];

            // TODO: 2 company names with same skill, should show the ones that match the other fields

            foreach ($request->input('skills_array') as $skill) {
                $profiles = DB::table('users')
                    ->join('profiles', 'users.profile_id', '=', 'profiles.id')
                    ->join('profiles_skills', 'profiles.id', 'profiles_skills.profile_id')
                    ->join('skills', 'profiles_skills.skill_id', 'skills.id')
                    ->select('users.id', 'users.first_name', 'users.last_name', 'profiles.cover_image', 'profiles.picture', 'profiles.country', 'profiles.city', 'skills.name')
                    ->distinct('users.id')
                    ->where('skills.name', '=', $skill)
                    ->get();

                foreach ($results as $currentProfile) {
                    foreach ($profiles as $profile) {
                        if ($currentProfile->id !== $profile->id)
                            break;
                        $alreadyExists = 0;
                        foreach ($profilesToSend as $existingPage) {
                            if ($existingPage->id === $profile->id) {
                                $alreadyExists = 1;
                                break;
                            }
                        }
                        if (!$alreadyExists)
                            array_push($profilesToSend, $profile);
                    }
                }

                array_push($skillsSelected, $skill);
            }

            $results = $profilesToSend;
        }

        $countries = DB::table('profiles')
            ->select('profiles.country')
            ->distinct()
            ->orderBy('country')
            ->get();

        $cities = DB::table('profiles')
            ->select('profiles.city')
            ->distinct()
            ->orderBy('city')
            ->get();

        return view('company.search', [
            'page' => Page::findOrFail(Auth::id()),
            'company' => Company::findOrFail(Auth::id()),
            'results' => $results,
            'skills' => Skills::distinct()->get(),
            'countries' => $countries,
            'cities' => $cities,
            'selectedCountry' => $request->input('country'),
            'selectedCity' => $request->input('city'),
            'selectedSkills' => $skillsSelected,
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
