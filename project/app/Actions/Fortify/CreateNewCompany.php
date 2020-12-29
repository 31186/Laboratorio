<?php

namespace App\Actions\Fortify;

use App\Models\Company;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewCompany implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Company
     */
    public function create(array $input)
    {
        $page = Page::create([
            'logo' => 'logo-default.png',
            'cover_image' => 'cover_placeholder.jpg',
        ]);

        Validator::make($input, [
            'company_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Company::class),
            ],
            'password' => $this->passwordRules(),
            'fk_type' => ['required', 'integer', 'exists:company_types,id']
        ])->validate();

        $company = Company::create([
            'company_name' => $input['company_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'page_id' => $page->id,
        ]);

        $company->company_type()->associate($input['fk_type']);
        $company->save();

        return $company;
    }
}