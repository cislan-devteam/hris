<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webfox\Xero\OauthCredentialManager;

class XeroController extends Controller
{
    // Checks for connection with Xero
    public function index(Request $request, OauthCredentialManager $xeroCredentials)
    {
        try {
            // Check if we've got any stored credentials
            if ($xeroCredentials->exists()) {

                $xero             = resolve(\XeroAPI\XeroPHP\Api\AccountingApi::class);
                $organisationName = $xero->getOrganisations($xeroCredentials->getTenantId())->getOrganisations()[0]->getName();
                $user             = $xeroCredentials->getUser();
                $username         = "{$user['given_name']} {$user['family_name']} ({$user['username']})";
            }
        } catch (\throwable $e) {
            // This can happen if the credentials have been revoked or there is an error with the organisation (e.g. it's expired)
            $error = $e->getMessage();
        }

        return view('xero', [
            'connected'        => $xeroCredentials->exists(),
            'error'            => $error ?? null,
            'organisationName' => $organisationName ?? null,
            'username'         => $username ?? null,
        ]);
    }

    // Retrieves Employee Data 
    public function getEmployees(OauthCredentialManager $xeroCredentials)
    {
        $xeroInstance     = resolve(\XeroAPI\XeroPHP\Api\AccountingApi::class);
        $xeroEmployees    = $xeroInstance->getEmployees($xeroCredentials->getTenantId())->getEmployees();

        return view('xero.xero_employees', [
            'xeroEmployees' => $xeroEmployees,
        ]);
    }

    // Retrieves Invoices Data 
    public function getInvoices(Request $request, OauthCredentialManager $xeroCredentials)
    {
        $xeroInstance = resolve(\XeroAPI\XeroPHP\Api\AccountingApi::class);
        $xeroInvoices = $xeroInstance->getInvoices($xeroCredentials->getTenantId())->getInvoices();

        // Get the filter values from the request
        $nameFilter           = $request->input('nameFilter');
        $invoiceNumberFilter  = $request->input('invoiceNumberFilter');
        $statusFilter         = $request->input('statusFilter');


        // Apply the filters
        if ($nameFilter || $invoiceNumberFilter || $statusFilter) {
            $filteredInvoices = [];
            foreach ($xeroInvoices as $invoice) {
                $contactName          = strtolower($invoice->getContact()->getName());
                $invoiceNumber        = strtolower($invoice->getInvoiceNumber());
                $status               = strtolower($invoice->getStatus());
                $nameMatch            = !$nameFilter || str_contains($contactName, strtolower($nameFilter));
                $invoiceNumberMatch   = !$invoiceNumberFilter || str_contains($invoiceNumber, strtolower($invoiceNumberFilter));
                $statusMatch          = !$statusFilter || $status === strtolower($statusFilter);
                if ($nameMatch && $invoiceNumberMatch && $statusMatch) {
                    $filteredInvoices[] = $invoice;
                }
            }
            $xeroInvoices = $filteredInvoices;
        }

        return view('xero.xero_invoices', [
            'xeroInvoices'         => $xeroInvoices,
            'nameFilter'           => $nameFilter,
            'invoiceNumberFilter'  => $invoiceNumberFilter,
            'statusFilter'         => $statusFilter,
        ]);        
    }

    public function getBalanceSheet(OauthCredentialManager $xeroCredentials)
    {
        $xeroInstance      = resolve(\XeroAPI\XeroPHP\Api\AccountingApi::class);
        $xeroBalanceSheet  = $xeroInstance->getReportBalanceSheet($xeroCredentials->getTenantId())->getReports()[0];
        $rows              = $xeroBalanceSheet->getRows();

        return view('xero.xero_BalanceSheet', [
            'xeroBalanceSheet'  => $xeroBalanceSheet,
            'rows'              => $rows,
        ]);
    }

    public function getPayRuns(OauthCredentialManager $xeroCredentials)
    {
        $xeroInstance     = resolve(\XeroAPI\XeroPHP\Api\PayrollAuApi::class);
        $xeroPayRuns      = $xeroInstance->getPayRuns($xeroCredentials->getTenantId())->getOrganisations()[0];

        return view('xero.xero_PayRuns', [
            'xeroPayRuns' => $xeroPayRuns,
        ]);
    }
}