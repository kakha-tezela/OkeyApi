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
            "merchant_id" => $invoice['merchant'],
            "sum_price"   => $invoice['totalprice'],
            "address"     => $invoice['address'],
            "city"        => $invoice['city'],
            "ip"          => $request->ip()
        ];
        
        
        $invoice_id = DB::table('invoices')->insertGetId( $data );
        
        return $this->seedInvoiceProducts( $invoice_id, $invoice['products'] );
        
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

            DB::table('invoice_products')->insert( $data );
        
        endforeach;
        
    }
    
    
    
    
}
