<?php

namespace App\Http\Controllers;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    
    
    public function getInvoiceInfo( Request $request )
    {
        if( !$request->has( 'trans_id' ) )
            return response()->json("Transaction Id Not Provided");
        
        
        $result = [];
        
        $data = DB::table('invoices')->select('invoices.id as InvioceId','invoices.shipping_price as shippingPrice','invoices.price as invoicePrice','invoices.sum_price as invoiceSumPrice',
                'invoices.address as invoiceAddress', 'invoices.city as invoiceCity' )
                ->leftJoin('merchant_history', 'merchant_history.invoice_id', '=', 'invoices.id' )
                ->where('merchant_history.transaction_id', '=', $request->trans_id )
                ->get();
        
        
        
        foreach( $data as $row ):
            
            $result = [

                'invoiceId'         => $row->InvioceId,
                'shippingPrice'     => $row->shippingPrice,
                'invoicePrice'      => $row->invoicePrice,
                'invoiceSumPrice'   => $row->invoiceSumPrice,
                'invoiceAddress' => $row->invoiceAddress,
                'invoiceCity'    => $row->invoiceCity,
            ];
                                
        endforeach;
        
        return $result;
    }
    
    public function getInvoiceProducts( Request $request )
    {
        if( !$request->has( 'trans_id' ) )
            return response()->json("Transaction Id Not Provided");
        
        
        $result = [];
        
        $data = DB::table('merchant_history')->select( 'invoice_products.title as productTitle', 'invoice_products.price as productPrice', 
                'invoice_products.quantity as productQuantity', 'categories.title_geo as productCategory' )
                ->leftJoin('invoice_products', 'invoice_products.invoice_id', '=', 'merchant_history.invoice_id' )
                ->leftJoin('categories', 'invoice_products.category_id', '=', 'categories.id' )
                ->where('merchant_history.transaction_id', '=', $request->trans_id )
                ->get();
        
        
        
        foreach( $data as $row ):
            $result[] = [
                'productTitle'      => $row->productTitle,
                'productPrice'      => $row->productPrice,
                'productQuantity'   => $row->productQuantity,
                'productCategory'   => $row->productCategory
            ]; 
                                
        endforeach;
        
        return $result;
    }
    
}
