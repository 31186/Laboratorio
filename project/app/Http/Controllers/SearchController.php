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
use Symfony\Component\Console\Input\Input;

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
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSearch(Request $request)
    {
        $results = DB::table('companies')
            ->join('pages', 'page_id', '=', 'pages.id')
            ->select('pages.*', 'companies.company_name')
            ->get();

        if ($request->input('company_type') !== null) {
            $pages = DB::table('companies')
                ->join('pages', 'page_id', '=', 'pages.id')
                ->select('pages.*', 'companies.company_name')
                ->where('companies.company_type_id', '=', $request->input('company_type'))
                ->get();

            $results = $pages;
        }

        if ($request->input('country') !== null) {
            $pagesToSend = [];

            $pages = DB::table('companies')
                ->join('pages', 'page_id', '=', 'pages.id')
                ->select('pages.*', 'companies.company_name')
                ->where('pages.country', '=', $request->input('country'))
                ->get();

            foreach ($results as $currentPage) {
                foreach ($pages as $page) {
                    if ($currentPage->country === $page->country) {
                        array_push($pagesToSend, $page);
                    }
                }
            }

            $results = $pagesToSend;
        }

        if ($request->input('city') !== null) {
            $pagesToSend = [];

            $pages = DB::table('companies')
                ->join('pages', 'page_id', '=', 'pages.id')
                ->select('pages.*', 'companies.company_name')
                ->where('pages.city', '=', $request->input('city'))
                ->get();

            foreach ($results as $currentPage) {
                foreach ($pages as $page) {
                    if ($currentPage->city === $page->city) {
                        array_push($pagesToSend, $page);
                    }
                }
            }

            $results = $pagesToSend;
        }

        // TODO: skills

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
            'selectedCompanyType' => $request->input('company_type'),
            'selectedCountry' => $request->input('country'),
            'selectedCity' => $request->input('city'),
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
