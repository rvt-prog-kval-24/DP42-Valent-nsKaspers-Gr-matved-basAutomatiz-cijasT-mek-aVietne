<?php

namespace App\Services;

use App\Models\Company;

class CompanyService
{
    public function create(array $data): Company
    {
        return Company::create([
            'name' => $data['name'],
            'reg_number' => $data['reg_number'],
            'vat_number' => $data['vat_number'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'description' => $data['description'] ?? null,
            'api_code' => $data['api_code'] ?? null,
            'password' => $data['password'] ?? ''
        ]);
    }

    public function update(Company $company, array $data): void
    {
        $dataToUpdate = [
            'name' => $data['name'],
            'reg_number' => $data['reg_number'],
            'vat_number' => $data['vat_number'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'description' => $data['description'] ?? null,
            'api_code' => $data['api_code'] ?? null
        ];

        if (isset($data['password']) && $data['password'] !== '') {
            $dataToUpdate['password'] = $data['password'];
        }

        $company->update($dataToUpdate);
    }

    public function destroy(Company $company): void
    {
        $company->delete();
    }
}
