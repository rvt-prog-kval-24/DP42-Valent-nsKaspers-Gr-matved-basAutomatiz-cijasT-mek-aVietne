<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Admin\Invoice\InvoiceUpdateRequest;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\User;
use App\Services\InvoiceService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceService
     */
    private InvoiceService $invoiceService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $invoices = Invoice::orderBy('id', 'desc')->paginate(10);

        return view('admin.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $companies = Company::all();
        $clientTypes = Invoice::getClientTypes();

        return view('admin.invoice.create', compact('companies', 'clientTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InvoiceStoreRequest $request
     * @return RedirectResponse
     */
    public function store(InvoiceStoreRequest $request): RedirectResponse
    {
        $invoice = $this->invoiceService->store($request->validated());

        return redirect()->route('admin.invoices.edit', $invoice)->with('success', __('Invoice created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Application|Factory|View
     */
    public function edit(Invoice $invoice): View|Factory|Application
    {
        $companies = Company::all();
        $clientTypes = Invoice::getClientTypes();

        return view('admin.invoice.edit', compact('invoice', 'companies', 'clientTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoiceUpdateRequest $request
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice): RedirectResponse
    {
        $this->invoiceService->update($invoice, $request->validated());

        return redirect()->route('admin.invoices.edit', $invoice)->with('success', __('Invoice updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return RedirectResponse
     */
    public function destroy(Invoice $invoice): RedirectResponse
    {
        $this->invoiceService->destroy($invoice);

        return redirect()->route('admin.invoices.index')->with('success', __('Invoice deleted successfully.'));
    }

    /**
     * @param Invoice $invoice
     * @return Response|Application|ResponseFactory
     */
    public function show(Invoice $invoice): Response|Application|ResponseFactory
    {
        return response($this->invoiceService->show($invoice))->header('Content-Type', 'application/pdf');
    }
}
