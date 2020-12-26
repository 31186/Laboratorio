<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        return view('company.page.show', [
            'page' => Page::findOrFail(Auth::id()),
            'visitedPage' => Page::findOrFail($id),
            'company' => Company::findOrFail(Auth::id()),
            'visitedCompany' => Company::findOrFail($id),
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

        return view('company.page.edit', [
            'page' => Page::findOrFail(Auth::id()),
            'visitedPage' => Page::findOrFail($id),
            'company' => Company::findOrFail(Auth::id()),
            'visitedCompany' => Company::findOrFail($id),
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
            'business_type' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'website' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'logo' => ['file', 'max:8192'],
            'cover_image' => ['file', 'max:8192'],
        ]);

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
            'business_type' => $request->business_type,
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

    public function updateSocial(Request $request, $id)
    {
        // TODO: implement not required social
        $page = Page::findOrFail($id);

        $request->validate([
            'sn_twitter' => ['required', 'string', 'max:255'],
            'sn_facebook' => ['required', 'string', 'max:255'],
            'sn_instagram' => ['required', 'string', 'max:255'],
            'sn_linkedin' => ['required', 'string', 'max:255'],
        ]);

        if (!isset($request->sn_twitter))
            Page::where('id', '=', $id)
                ->update('sn_twitter', null);

        if (!isset($request->sn_facebook))
            Page::where('id', '=', $id)
                ->update('sn_facebook', null);

        if (!isset($request->sn_instagram))
            Page::where('id', '=', $id)
                ->update('sn_instagram', null);

        if (!isset($request->sn_linkedin))
            Page::where('id', '=', $id)
                ->update('sn_linkedin', null);

        $page->update($request->all());
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
