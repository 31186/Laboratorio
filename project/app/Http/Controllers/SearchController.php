<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Page;
use App\Models\User;
use App\Models\Company;
use App\Models\Types;
use Illuminate\Http\Request;
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
        $results = [];

        $companies = Company::get();
        $pages = Page::get();

        $results[0] = $companies;
        $results[1] = $pages;

        $countries = DB::table('pages')
            ->select('pages.country')
            ->distinct()
            ->orderBy('country')
            ->get();

        $cities = DB::table('pages')
            ->select('pages.city')
            ->distinct()
            ->orderBy('city')
            ->get();

        return view('search', [
            'profile' => Profile::findOrFail(Auth::id()),
            'user' => User::findOrFail(Auth::id()),
            'results' => $results,
            'types' => Types::distinct()->get(),
            'countries' => $countries,
            'cities' => $cities,
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
        //
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
