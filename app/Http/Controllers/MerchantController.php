<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class MerchantController extends Controller
{
    
    
    
    public function processInvoice(Request $request)
    {
        $invoice = $request->all();

        $data = [
            
            "merchant_id"      => $invoice['merchant'],
            "price"            => $invoice['totalprice'],
            "shipping_price"   => $invoice['shipping_price'],
            "sum_price"        => $invoice['totalprice'] + $invoice['shipping_price'],
            "address"          => $invoice['address'],
            "city"             => $invoice['city'],
            "ip"               => $request->ip()
        ];
        
        
        $invoice_id = DB::table('invoices')->insertGetId( $data );
        
        $this->seedInvoiceProducts( $invoice_id, $invoice['products'] );
        $this->seedMerchantHistory( $invoice_id, $invoice );
        
    }
    
    
    
    
    
    
    
    
    public function seedInvoiceProducts( $invoice_id, $products )
    {

        foreach( $products as $product ):
            
            $data = [
                "invoice_id"    => $invoice_id, 
                "title"         => $product['title'],
                "category_id"   => $product['category'],
                "price"         => $product['price'],
                "quantity"      => $product['quantity'],
            ];

            if( !DB::table('invoice_products')->insert( $data ) )
                return response()->json( "Failed To Seed invoice Products", 400 );
        
        endforeach;
        
    }
    
    
    
    
    
    
    
    public function seedMerchantHistory( $invoice_id, $invoice )
    {
        
        $data = [
                "merchant_id"      => $invoice['merchant'],
                "invoice_id"       => $invoice_id,
                "transaction_id"   => str_random(40),
                "total_price"      => $invoice['totalprice'],
                "status"           => "PENDING",
                "result_code"      => 1,
            ];
        
        if( !DB::table('merchant_history')->insert( $data ) )
            return response()->json( "Failed To Seed merchant_history", 400 );
    }
    
    
}
