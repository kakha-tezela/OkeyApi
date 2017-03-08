<?php
namespace App\Http\Controllers;
use App\RealEstateGuarantee;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    
    public function showGuarantee( Request $request )
    {
        $estate = RealEstateGuarantee::find( $request->guarantee_id );
        
        $owners = [];
        
        foreach( $estate->owners as $owner ):
            
            $owners[] = [
                "ownerFirstname" => $owner->firstname,
                "ownerLirstname" => $owner->lastname,
                "ownerPid"       => $owner->personal_id,
            ];
        
        endforeach;
        
        $data = [
            "id"                   => $estate->id,
            "order_number"         => $estate->order_number,
            "market_price"         => $estate->market_price,
            "liquid_price"         => $estate->liquid_price,
            "discount"             => $estate->discount,
            "currency"             => $estate->currency->title,
            "cadastral_code"       => $estate->cadastral_code,
            "object_area"          => $estate->object_area,
            "location"             => $estate->location,
            "build_date"           => $estate->build_date,
            "description"          => $estate->description,
            "estimation_date"      => $estate->estimation_date,
            "start_date"           => $estate->start_date,
            "end_date"             => $estate->end_date,
            "comment"              => $estate->comment,
            "estateType"           => $estate->RealEstateType->title,
            "mortgage"             => $estate->mortgage,
            "mortgagee_name"       => $estate->mortgagee_name,
            "mortgage_sequence"    => $estate->mortgage_sequence,
            "owners"               => $owners,
        ];

        return $data;
    }
    
}
