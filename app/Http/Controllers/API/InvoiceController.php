<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invoice\InvoiceUpdateRequest;
use App\Http\Requests\API\InvoiceCreateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    /**
     * @var Company|null
     */
    private ?Company $company;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
        $this->company = $this->getCurrentCompany();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Invoice::where('company_id', $this->company?->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceCreateRequest $request)
    {
        $data = $request->validated();
        $data['company_id'] = $this->company?->id;

        return  $this->invoiceService->store($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Invoice::where([
            'company_id' => $this->company?->id,
            'id' => $id
        ])->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, string $id)
    {
        $invoice = Invoice::where([
            'company_id' => $this->company?->id,
            'id' => $id
        ])->first();

        if (!$invoice) {
            return response(status: 404)->json(['message' => __('Provided invoice id is wrong!')]);
        }

        $data = $request->validated();
        $data['company_id'] = $this->company->id;

        $this->invoiceService->update($invoice, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::where([
            'company_id' => $this->company?->id,
            'id' => $id
        ])->first();

        if ($invoice) {
            $invoice->delete();
        }

        return response()->json(['message' => __('Invoice has been deleted successfully.')]);
    }

    /**
     * @return Company|null
     */
    private function getCurrentCompany(): ?Company
    {
        $apiCode = (string)request()->header('X-API-Code');

        return Company::where('api_code', $apiCode)->first();
    }
}
