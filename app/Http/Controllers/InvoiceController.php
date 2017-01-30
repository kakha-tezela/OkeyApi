<?php

namespace App\Http\Controllers;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    
    
    public function getInvoiceInfo( Request $request )
    {
        if( !$request->has( 'transaction_id' ) )
            return response()->json("Transaction Id Not Provided");
        
        
        $result = [];
        
        $data = DB::table('invoices')->select('invoices.id as InvioceId', 'invoices.price as invoicePrice', 'invoices.sum_price as invoiceSumPrice',
                'invoices.address as invoiceAddress', 'invoices.city as invoiceCity', 'invoice_products.title as productTitle', 'invoice_products.price as productPrice', 
                'invoice_products.quantity as productQuantity', 'categories.title_geo as productCategory' )
                ->leftJoin('merchant_history', 'merchant_history.invoice_id', '=', 'invoices.id' )
                ->leftJoin('invoice_products', 'invoice_products.invoice_id', '=', 'invoices.id' )
                ->leftJoin('categories', 'invoice_products.category_id', '=', 'categories.id' )
                ->where('merchant_history.transaction_id', '=', $request->transaction_id )
                ->get();
        
        
        
        foreach( $data as $row ):
            
            $result['InvoiceInfo'] = [

                'invoiceId'         => $row->InvioceId,
                'invoicePrice'      => $row->invoicePrice,
                'invoiceSumPrice'   => $row->invoiceSumPrice,
            ];
        
            
            $result['shipping'] = [
                
                'invoiceAddress' => $row->invoiceAddress,
                'invoiceCity'    => $row->invoiceCity,
            ];
            
            
            $result['products'][] = [
                
                'productTitle'      => $row->productTitle,
                'productPrice'      => $row->productPrice,
                'productQuantity'   => $row->productQuantity,
                'productCategory'   => $row->productCategory
            ]; 
                                
        endforeach;
        
        return $result;
    }
    
}
