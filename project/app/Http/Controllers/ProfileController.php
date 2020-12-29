<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Page;
use App\Models\User;
use App\Models\Educations;
use App\Models\ProfilesSkills;
use App\Models\Skills;
use App\Models\UsersCompanies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        Profile::findOrFail($id);

        $usersCompanies = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '1')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $usersCharities = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '2')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $userSkills = DB::table('profiles_skills')
            ->join('skills', 'profiles_skills.skill_id', '=', 'skills.id')
            ->select('skills.*')
            ->where('profiles_skills.profile_id', '=', $id)
            ->get();

        return view('profile.show', [
            'profile' => Profile::findOrFail(Auth::id()),
            'visitedProfile' => Profile::findOrFail($id),
            'user' => User::findOrFail(Auth::id()),
            'visitedUser' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
            'certificates' => Certificates::where('profile_id', $id)->get(),
            'usersCompanies' => $usersCompanies,
            'usersCharities' => $usersCharities,
            'skills' => $userSkills,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCompany($id)
    {
        Profile::findOrFail($id);

        $usersCompanies = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '1')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $usersCharities = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '2')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $userSkills = DB::table('profiles_skills')
            ->join('skills', 'profiles_skills.skill_id', '=', 'skills.id')
            ->select('skills.*')
            ->where('profiles_skills.profile_id', '=', $id)
            ->get();

        return view('company.profile.show', [
            'page' => Page::findOrFail(Auth::id()),
            'visitedProfile' => Profile::findOrFail($id),
            'company' => Company::findOrFail(Auth::id()),
            'visitedUser' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
            'certificates' => Certificates::where('profile_id', $id)->get(),
            'usersCompanies' => $usersCompanies,
            'usersCharities' => $usersCharities,
            'skills' => $userSkills,
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

        Profile::findOrFail($id);

        $usersCompanies = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '1')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $usersCharities = DB::table('users_companies')
            ->join('companies', 'company_id', '=', 'companies.id')
            ->select('users_companies.*', 'companies.company_name')
            ->where('companies.company_type_id', '=', '2')
            ->where('users_companies.user_id', '=', $id)
            ->get();

        $currentSkills = DB::table('profiles_skills')
            ->join('skills', 'profiles_skills.skill_id', '=', 'skills.id')
            ->select('skills.*')
            ->where('profiles_skills.profile_id', '=', $id)
            ->get();

        return view('profile.edit', [
            'profile' => Profile::findOrFail($id),
            'user' => User::findOrFail(Auth::id()),
            'visitedUser' => User::findOrFail($id),
            'educations' => Educations::where('profile_id', $id)->get(),
            'certificates' => Certificates::where('profile_id', $id)->get(),
            'usersCompanies' => $usersCompanies,
            'usersCharities' => $usersCharities,
            'companies' => Company::where('company_type_id', '1')->get(),
            'charities' => Company::where('company_type_id', '2')->get(),
            'currentSkills' => $currentSkills,
            'skills' => DB::table('skills')->distinct()->get(),
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
        if ($request->has('updateUser'))
            $this->updateUser($request, $id);
        else if ($request->has('updateProfile'))
            $this->updateProfile($request, $id);
        else if ($request->has('updateEducation'))
            $this->updateEducation($request, $id);
        else if ($request->has('createEducation'))
            $this->createEducation($request, $id);
        else if ($request->has('updateProfessionalExperience'))
            $this->updateProfessionalExperience($request, $id);
        else if ($request->has('createProfessionalExperience'))
            $this->createProfessionalExperience($request, $id);
        else if ($request->has('updateVolunteering'))
            $this->updateVolunteering($request, $id);
        else if ($request->has('createVolunteering'))
            $this->createVolunteering($request, $id);
        else if ($request->has('updateCertificate'))
            $this->updateCertificate($request, $id);
        else if ($request->has('updateSkills'))
            $this->updateSkills($request, $id);
        else if ($request->has('createSkill'))
            $this->createSkill($request, $id);
        else if ($request->has('updateSocial'))
            $this->updateSocial($request, $id);

        return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request{
     * Skills::}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        $user->update($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'job_description' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'website' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'picture' => ['file', 'max:8192'],
            'cover_image' => ['file', 'max:8192'],
        ]);

        $request->country = strtoupper($request->country);
        $request->city = strtoupper($request->city);

        if (isset($request->picture)) {
            if ($request->picture !== 'user_placeholder.png') {
                Storage::disk('uploads')->delete('/' . $request->picture);
            }
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->picture->getClientOriginalExtension();
            $filenameToStorePicture = 'profile/img/' . $filename . '_' . time() . '.' . $extension;
            // Using Intervention Image to handle the size and weight of any uploaded image
            $img = Image::make($request->file('picture'));
            // $img = Image::make($request->file('picture'))->fit(212, 300, function ($constraint) {
            // $constraint->aspectRatio();
            // });
            Storage::disk('uploads')->put('/' . $filenameToStorePicture, (string)$img->encode());
            // $request->picture = $filenameToStorePicture;

            $profile->update([
                'picture' => $filenameToStorePicture,
            ]);
        }

        if (isset($request->cover_image)) {
            if ($request->cover_image !== 'user_placeholder.png') {
                Storage::disk('uploads')->delete('/' . $request->cover_image);
            }
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->cover_image->getClientOriginalExtension();
            $filenameToStoreCover = 'profile/img/' . $filename . '_' . time() . '.' . $extension;
            // Using Intervention Image to handle the size and weight of any uploaded image
            $img = Image::make($request->file('cover_image'));
            // $img = Image::make($request->file('picture'))->fit(212, 300, function ($constraint) {
            // $constraint->aspectRatio();
            // });
            Storage::disk('uploads')->put('/' . $filenameToStoreCover, (string)$img->encode());
            // $request->cover_image = $filenameToStoreCover;

            $profile->update([
                'cover_image' => $filenameToStoreCover,
            ]);
        }

        $profile->update([
            'job_title' => $request->job_title,
            'job_description' => $request->job_description,
            'city' => $request->city,
            'country' => $request->country,
            'website' => $request->website,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'description' => $request->description,
        ]);
    }

    private function formatName($string)
    {
        $string = str_replace(['[\', \']'], '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
        $string = preg_replace(['/[^a-z0-9]/i', '/[-]+/'], '-', $string);
        $string = strip_tags($string);

        return strtolower(trim($string, '-'));
    }

    public function removePhoto(Request $request)
    {
        Storage::disk('uploads')->delete('/' . $request->picture);
        $request->picture = 'user_placeholder.png';
        $request->save();
        return 'success';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEducation(Request $request, $id)
    {
        $request->validate([
            'education_id' => ['required', 'integer'],
            'education_title' => ['required', 'string', 'max:255'],
            'education_description' => ['required', 'string', 'max:255'],
            'education_institution' => ['required', 'string', 'max:255'],
            'education_start_date' => ['required', 'date', 'max:255'],
            'education_end_date' => ['required', 'date', 'max:255'],
        ]);

        $education = Educations::findOrFail($request->education_id);

        $education->update([
            'title' => $request->education_title,
            'description' => $request->education_description,
            'institution' => $request->education_institution,
            'start_date' => $request->education_start_date,
            'end_date' => $request->education_end_date,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createEducation(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'education_title' => ['required', 'string', 'max:255'],
            'education_description' => ['required', 'string', 'max:255'],
            'education_institution' => ['required', 'string', 'max:255'],
            'education_start_date' => ['required', 'date', 'max:255'],
            'education_end_date' => ['required', 'date', 'max:255'],
        ]);

        Educations::create([
            'title' => $request->education_title,
            'institution' => $request->education_institution,
            'description' => $request->education_description,
            'start_date' => $request->education_start_date,
            'end_date' => $request->education_end_date,
            'profile_id' => $profile->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfessionalExperience(Request $request, $id)
    {
        $request->validate([
            'professional_experience_id' => ['required', 'integer'],
            'professional_experience_company_id' => ['required', 'integer'],
            'professional_experience_title' => ['required', 'string', 'max:255'],
            'professional_experience_description' => ['required', 'string', 'max:255'],
            'professional_experience_start_date' => ['required', 'date', 'max:255'],
            'professional_experience_end_date' => ['required', 'date', 'max:255'],
        ]);

        $userCompany = UsersCompanies::findOrFail($request->professional_experience_id);

        $userCompany->update([
            'title' => $request->professional_experience_title,
            'description' => $request->professional_experience_description,
            'start_date' => $request->professional_experience_start_date,
            'end_date' => $request->professional_experience_end_date,
            'user_id' => $id,
            'company_id' => $request->professional_experience_company_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createProfessionalExperience(Request $request, $id)
    {
        $request->validate([
            'professional_experience_company_id' => ['required', 'integer'],
            'professional_experience_title' => ['required', 'string', 'max:255'],
            'professional_experience_description' => ['required', 'string', 'max:255'],
            'professional_experience_start_date' => ['required', 'date', 'max:255'],
            'professional_experience_end_date' => ['required', 'date', 'max:255'],
        ]);

        UsersCompanies::create([
            'title' => $request->professional_experience_title,
            'description' => $request->professional_experience_description,
            'start_date' => $request->professional_experience_start_date,
            'end_date' => $request->professional_experience_end_date,
            'user_id' => $id,
            'company_id' => $request->professional_experience_company_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVolunteering(Request $request, $id)
    {
        $request->validate([
            'charity_id' => ['required', 'integer'],
            'charity_company_id' => ['required', 'string', 'max:255'],
            'charity_title' => ['required', 'string', 'max:255'],
            'charity_description' => ['required', 'string', 'max:255'],
            'charity_start_date' => ['required', 'date', 'max:255'],
            'charity_end_date' => ['required', 'date', 'max:255'],
        ]);

        $userCompany = UsersCompanies::findOrFail($request->charity_id);

        $userCompany->update([
            'title' => $request->charity_title,
            'description' => $request->charity_description,
            'start_date' => $request->charity_start_date,
            'end_date' => $request->charity_end_date,
            'user_id' => $id,
            'company_id' => $request->charity_company_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createVolunteering(Request $request, $id)
    {
        $request->validate([
            'charity_company_id' => ['required', 'string', 'max:255'],
            'charity_title' => ['required', 'string', 'max:255'],
            'charity_description' => ['required', 'string', 'max:255'],
            'charity_start_date' => ['required', 'date', 'max:255'],
            'charity_end_date' => ['required', 'date', 'max:255'],
        ]);

        UsersCompanies::create([
            'title' => $request->charity_title,
            'description' => $request->charity_description,
            'start_date' => $request->charity_start_date,
            'end_date' => $request->charity_end_date,
            'user_id' => $id,
            'company_id' => $request->charity_company_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCertificate(Request $request, $id)
    {
        // TODO: fix, edit not working

        $request->validate([
            'certificate_id' => ['required', 'integer'],
            'certificate_name' => ['required', 'string', 'max:255'],
            'certificate_file' => ['file', 'max:8192'],
            'certification_date' => ['required', 'date', 'max:255'],
        ]);

        $certificates = Certificates::findOrFail($request->certificate_id);

        if (isset($request->certificate_file)) {
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->certificate_file->getClientOriginalExtension();
            $filenameToStoreCertificate = 'profile/certificates/' . $filename . '_' . time() . '.' . $extension;
            // TODO: fix pdf
            $request->file('certificate_file')->storeAs(
                'uploads',
                $filenameToStoreCertificate
            );
            $request->certificate_file = $filenameToStoreCertificate;
        }

        if (isset($request->certificate_file))
            $certificates->update([
                'name' => $request->certificate_name,
                'file' => $request->certificate_file,
                'certification_date' => $request->certification_date,
            ]);
        else
            $certificates->update([
                'name' => $request->$request->certificate_name,
                'certification_date' => $request->$request->certification_date,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createCertificate(Request $request, $id)
    {
        $request->validate([
            'certificate_name' => ['required', 'string', 'max:255'],
            'certificate_file' => ['required', 'file', 'max:255'],
            'certification_date' => ['required', 'date', 'max:255'],
        ]);

        if (isset($request->certificate_file)) {
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->certificate_file->getClientOriginalExtension();
            $filenameToStoreCertificate = 'profile/certificates/' . $filename . '_' . time() . '.' . $extension;
            // TODO: fix pdf
            $request->file('certificate_file')->storeAs(
                'uploads',
                $filenameToStoreCertificate
            );
            $request->certificate_file = $filenameToStoreCertificate;
        }

        Certificates::create([
            'name' => $request->certificate_name,
            'file' => $request->certificate_file,
            'certification_date' => $request->certification_date,
            'profile_id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createSkill(Request $request, $id)
    {
        $request->validate([
            'skill_name' => ['required', 'string', 'max:255'],
        ]);

        $skills = DB::table('skills')
            ->select('skills.name')
            ->where('name', '=', $request->skill_name);

        if ($skills->doesntExist()) {
            Skills::create([
                'name' => $request->skill_name,
            ]);
        }

        $skill = Skills::where('name', '=', $request->skill_name)->get('id');

        ProfilesSkills::create([
            'profile_id' => $id,
            'skill_id' => $skill[0]->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSkills(Request $request, $id)
    {
        $request->validate([
            'skills_array' => ['array', 'max:255'],
        ]);

        DB::table('profiles_skills')
            ->where('profile_id', '=', $id)
            ->delete();

        if (isset($request->skills_array)) {
            foreach ($request->skills_array as $skill_name) {
                $skills = DB::table('skills')
                    ->select('skills.name')
                    ->where('name', '=', $skill_name);

                if ($skills->doesntExist()) {
                    Skills::create([
                        'name' => $skill_name,
                    ]);
                }

                $skill = Skills::where('name', '=', $skill_name)->get('id');

                $skill = $skill[0]->id;

                $existingProfileSkill = DB::table('profiles_skills')
                    ->select('profiles_skills.id')
                    ->where('skill_id', '=', $skill)
                    ->where('profile_id', '=', $id);

                if ($existingProfileSkill->doesntExist()) {
                    ProfilesSkills::create([
                        'profile_id' => $id,
                        'skill_id' => $skill,
                    ]);
                }
            }
        }
    }

    public function updateSocial(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'sn_twitter' => ['nullable', 'string', 'max:255'],
            'sn_facebook' => ['nullable', 'string', 'max:255'],
            'sn_instagram' => ['nullable', 'string', 'max:255'],
            'sn_linkedin' => ['nullable', 'string', 'max:255'],
        ]);

        $profile->update($request->all());
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
