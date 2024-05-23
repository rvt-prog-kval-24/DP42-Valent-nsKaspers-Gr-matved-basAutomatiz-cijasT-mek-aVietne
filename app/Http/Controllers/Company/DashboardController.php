<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    private InvoiceService $invoiceService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->where('company_id', $this->getCompanyId())->paginate(10);

        return view('companies-admin.invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        if ((int)$invoice->company_id !== $this->getCompanyId()) {
            abort(403);
        }

        $companies = Company::where('id', $this->getCompanyId())->get();
        $clientTypes = Invoice::getClientTypes();

        return view('companies-admin.invoices.show', compact('invoice', 'companies', 'clientTypes'));
    }

    private function getCompanyId(): int
    {
        return (int)auth()->guard('company')->user()->id;
    }

    /**
     * @param Invoice $invoice
     * @return Response|Application|ResponseFactory
     */
    public function showPdf(Invoice $invoice): Response|Application|ResponseFactory
    {
        if ((int)$invoice->company_id !== $this->getCompanyId()) {
            abort(403);
        }

        return response($this->invoiceService->show($invoice))->header('Content-Type', 'application/pdf');
    }
}
