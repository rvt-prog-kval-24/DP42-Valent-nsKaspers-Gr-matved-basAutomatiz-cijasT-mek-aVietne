<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invoice\InvoiceUpdateRequest;
use App\Http\Requests\API\InvoiceCreateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Services\InvoiceService;
use App\Services\MailSendingService;
use DomainException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    /**
     * @var MailSendingService
     */
    private MailSendingService $mailSendingService;

    /**
     * @var Company|null
     */
    private ?Company $company;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService, MailSendingService $mailSendingService)
    {
        $this->invoiceService = $invoiceService;
        $this->mailSendingService = $mailSendingService;
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

        $result = $this->invoiceService->store($data);
        $this->mailSendingService->sendUnpaidInvoiceMessage($result);

        return $result;
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
            return response()->json(['message' => __('Provided invoice id is wrong!')],404);
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
