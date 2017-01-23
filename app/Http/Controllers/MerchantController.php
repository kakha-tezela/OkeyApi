<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function processInvoice(Request $request)
    {
        $invoice = $request->all();        
    }
    
}
