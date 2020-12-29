<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Page;
use App\Models\PagesTypes;
use App\Models\Profile;
use App\Models\Types;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PageController extends Controller
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
        $companyTypes = DB::table('pages_types')
            ->join('types', 'pages_types.type_id', '=', 'types.id')
            ->select('types.*')
            ->where('pages_types.page_id', '=', $id)
            ->get();

        return view('company.page.show', [
            'page' => Page::findOrFail(Auth::id()),
            'visitedPage' => Page::findOrFail($id),
            'company' => Company::findOrFail(Auth::id()),
            'visitedCompany' => Company::findOrFail($id),
            'types' => $companyTypes,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        $companyTypes = DB::table('pages_types')
            ->join('types', 'pages_types.type_id', '=', 'types.id')
            ->select('types.*')
            ->where('pages_types.page_id', '=', $id)
            ->get();

        return view('page.show', [
            'profile' => Profile::findOrFail(Auth::id()),
            'visitedPage' => Page::findOrFail($id),
            'user' => User::findOrFail(Auth::id()),
            'visitedCompany' => Company::findOrFail($id),
            'types' => $companyTypes,
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

        Page::findOrFail($id);

        $currentTypes = DB::table('pages_types')
            ->join('types', 'pages_types.type_id', '=', 'types.id')
            ->select('types.*')
            ->where('pages_types.page_id', '=', $id)
            ->get();

        return view('company.page.edit', [
            'page' => Page::findOrFail(Auth::id()),
            'visitedPage' => Page::findOrFail($id),
            'company' => Company::findOrFail(Auth::id()),
            'visitedCompany' => Company::findOrFail($id),
            'currentTypes' => $currentTypes,
            'types' => DB::table('types')->distinct()->get(),
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
        if ($request->has('updateCompany'))
            $this->updateCompany($request, $id);
        else if ($request->has('updatePage'))
            $this->updatePage($request, $id);
        else if ($request->has('updateSocial'))
            $this->updateSocial($request, $id);
        else if ($request->has('updateBusinessTypes'))
            $this->updateBusinessTypes($request, $id);
        else if ($request->has('createBusinessType'))
            $this->createBusinessType($request, $id);

        return $this->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request{
     * types::}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        $company->update($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePage(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'logo' => ['file', 'max:8192'],
            'cover_image' => ['file', 'max:8192'],
        ]);

        $request->country = strtoupper($request->country);
        $request->city = strtoupper($request->city);

        if (isset($request->logo)) {
            if ($request->logo !== 'user_placeholder.png') {
                Storage::disk('uploads')->delete('/' . $request->logo);
            }
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->logo->getClientOriginalExtension();
            $filenameToStoreLogo = 'page/img/' . $filename . '_' . time() . '.' . $extension;
            // Using Intervention Image to handle the size and weight of any uploaded image
            $img = Image::make($request->file('logo'));
            // $img = Image::make($request->file('picture'))->fit(212, 300, function ($constraint) {
            // $constraint->aspectRatio();
            // });
            Storage::disk('uploads')->put('/' . $filenameToStoreLogo, (string)$img->encode());

            $page->update([
                'logo' => $filenameToStoreLogo,
            ]);
        }

        if (isset($request->cover_image)) {
            if ($request->cover_image !== 'user_placeholder.png') {
                Storage::disk('uploads')->delete('/' . $request->cover_image);
            }
            $filename = $id . '_' . $this->formatName($id);
            $extension = $request->cover_image->getClientOriginalExtension();
            $filenameToStoreCover = 'page/img/' . $filename . '_' . time() . '.' . $extension;
            // Using Intervention Image to handle the size and weight of any uploaded image
            $img = Image::make($request->file('cover_image'));
            // $img = Image::make($request->file('picture'))->fit(212, 300, function ($constraint) {
            // $constraint->aspectRatio();
            // });
            Storage::disk('uploads')->put('/' . $filenameToStoreCover, (string)$img->encode());
            // $request->cover_image = $filenameToStoreCover;

            $page->update([
                'cover_image' => $filenameToStoreCover,
            ]);
        }

        $page->update([
            'city' => $request->city,
            'country' => $request->country,
            'website' => $request->website,
            'phone' => $request->phone,
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
    public function updateSocial(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'sn_twitter' => ['nullable', 'string', 'max:255'],
            'sn_facebook' => ['nullable', 'string', 'max:255'],
            'sn_instagram' => ['nullable', 'string', 'max:255'],
            'sn_linkedin' => ['nullable', 'string', 'max:255'],
        ]);

        $page->update($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBusinessTypes(Request $request, $id)
    {
        $request->validate([
            'types_array' => ['array', 'max:255'],
        ]);

        DB::table('pages_types')
            ->where('page_id', '=', $id)
            ->delete();

        if (isset($request->types_array)) {
            foreach ($request->types_array as $type_name) {
                $types = DB::table('types')
                    ->select('types.name')
                    ->where('name', '=', $type_name);

                if ($types->doesntExist()) {
                    Types::create([
                        'name' => $type_name,
                    ]);
                }

                $type = Types::where('name', '=', $type_name)->get('id');

                $type = $type[0]->id;

                $existingPageType = DB::table('pages_types')
                    ->select('pages_types.id')
                    ->where('type_id', '=', $type)
                    ->where('page_id', '=', $id);

                if ($existingPageType->doesntExist()) {
                    PagesTypes::create([
                        'page_id' => $id,
                        'type_id' => $type,
                    ]);
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createBusinessType(Request $request, $id)
    {
        $request->validate([
            'type_name' => ['required', 'string', 'max:255'],
        ]);

        $types = DB::table('types')
            ->select('types.name')
            ->where('name', '=', $request->type_name);

        if ($types->doesntExist()) {
            Types::create([
                'name' => $request->type_name,
            ]);
        }

        $type = Types::where('name', '=', $request->type_name)->get('id');

        PagesTypes::create([
            'page_id' => $id,
            'type_id' => $type[0]->id,
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
