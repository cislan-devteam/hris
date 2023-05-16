<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dcblogdev\Xero\Facades\Xero;
use App\Http\Controllers\Controller;

class XeroContactsController extends Controller
{
    public function index()
    {
        try {
            $contacts = Xero::contacts()->get();
        } catch (\Exception $e) {
            return redirect('xero/connect');
        }

        return view('contacts', compact('contacts'));
    }
}
