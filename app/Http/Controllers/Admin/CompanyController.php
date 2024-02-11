<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyCreateRequest;
use App\Http\Requests\Admin\Company\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\CompanyService;
use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * @var CompanyService
     */
    private CompanyService $companyService;


    /**
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);

        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyCreateRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyCreateRequest $request): RedirectResponse
    {
        $company = $this->companyService->create($request->validated());

        return redirect()->route('admin.companies.edit', $company)->with('success', __('Company created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company): View|Factory|Application
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyUpdateRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $this->companyService->update($company, $request->validated());

        return redirect()->route('admin.companies.edit', $company)->with('success', __('Company updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->companyService->destroy($company);

        return redirect()->route('admin.companies.index')->with('success', __('Company deleted successfully.'));
    }
}
