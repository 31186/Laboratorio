<?php

namespace App\Actions\Fortify;

use App\Models\Company;
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
        ])->validate();

        return Company::create([
            'company_name' => $input['company_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}