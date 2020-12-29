<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
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
        $typesSelected = [];

        $results = DB::table('companies')
            ->join('pages', 'companies.page_id', '=', 'pages.id')
            ->join('pages_types', 'pages.id', 'pages_types.page_id')
            ->join('types', 'pages_types.type_id', 'types.id')
            ->select('companies.id', 'companies.company_name', 'pages.cover_image', 'pages.logo', 'pages.country', 'pages.city', 'types.name')
            ->distinct('companies.id')
            ->get();

        if ($request->input('company_type') !== null) {
            $pages = DB::table('companies')
                ->join('pages', 'companies.page_id', '=', 'pages.id')
                ->join('pages_types', 'pages.id', 'pages_types.page_id')
                ->join('types', 'pages_types.type_id', 'types.id')
                ->select('companies.id', 'companies.company_name', 'pages.cover_image', 'pages.logo', 'pages.country', 'pages.city', 'types.name')
                ->distinct('companies.id')
                ->where('companies.company_type_id', '=', $request->input('company_type'))
                ->get();

            $results = $pages;
        }

        if ($request->input('country') !== null) {
            $pagesToSend = [];

            $pages = DB::table('companies')
                ->join('pages', 'companies.page_id', '=', 'pages.id')
                ->join('pages_types', 'pages.id', 'pages_types.page_id')
                ->join('types', 'pages_types.type_id', 'types.id')
                ->select('companies.id', 'companies.company_name', 'pages.cover_image', 'pages.logo', 'pages.country', 'pages.city', 'types.name')
                ->distinct('companies.id')
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
                ->join('pages', 'companies.page_id', '=', 'pages.id')
                ->join('pages_types', 'pages.id', 'pages_types.page_id')
                ->join('types', 'pages_types.type_id', 'types.id')
                ->select('companies.id', 'companies.company_name', 'pages.cover_image', 'pages.logo', 'pages.country', 'pages.city', 'types.name')
                ->distinct('companies.id')
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

        if ($request->input('types_array') !== null) {
            $pagesToSend = [];

            // TODO: 2 company names with same type, should show the ones that match the other fields

            foreach ($request->input('types_array') as $type) {
                $pages = DB::table('companies')
                    ->join('pages', 'companies.page_id', '=', 'pages.id')
                    ->join('pages_types', 'pages.id', 'pages_types.page_id')
                    ->join('types', 'pages_types.type_id', 'types.id')
                    ->select('companies.id', 'companies.company_name', 'pages.cover_image', 'pages.logo', 'pages.country', 'pages.city', 'types.name')
                    ->distinct('companies.id')
                    ->where('types.name', '=', $type)
                    ->get();

                foreach ($results as $currentPage) {
                    foreach ($pages as $page) {
                        if ($currentPage->id !== $page->id)
                            break;
                        $alreadyExists = 0;
                        foreach ($pagesToSend as $existingPage) {
                            if ($existingPage->id === $page->id) {
                                $alreadyExists = 1;
                                break;
                            }
                        }
                        if (!$alreadyExists)
                            array_push($pagesToSend, $page);
                    }
                }

                array_push($typesSelected, $type);
            }

            $results = $pagesToSend;
        }

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
            'selectedTypes' => $typesSelected,
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
