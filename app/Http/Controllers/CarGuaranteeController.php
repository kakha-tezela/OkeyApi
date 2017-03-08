<?php
namespace App\Http\Controllers;
use App\CarGuarantee;
use Illuminate\Http\Request;

class CarGuaranteeController extends Controller
{
    public function showGuarantee( Request $request )
    {
        $carGuarantee = CarGuarantee::find( $request->guarantee_id );
        
        $data = [
            "id"                => $carGuarantee->id,
            "order_number"      => $carGuarantee->order_number,
            "market_price"      => $carGuarantee->market_price,
            "liquid_price"      => $carGuarantee->liquid_price,
            "discount"          => $carGuarantee->discount,
            "tech_number"       => $carGuarantee->tech_number,
            "engine_number"     => $carGuarantee->engine_number,
            "id_number"         => $carGuarantee->id_number,
            "model"             => $carGuarantee->model,
            "estimation_date"   => $carGuarantee->estimation_date,
            "ownerFirstName"    => $carGuarantee->ownerFullName->firstname,
            "ownerLastName"     => $carGuarantee->ownerFullName->lastname,
            "state_number"      => $carGuarantee->state_number,
            "vin_code"          => $carGuarantee->vin_code,
            "body_number"       => $carGuarantee->body_number,
            "date_of_issue"     => $carGuarantee->date_of_issue,
            "start_date"        => $carGuarantee->start_date,
            "end_date"          => $carGuarantee->end_date,
            "comment"           => $carGuarantee->comment,
            "currency"          => $carGuarantee->currency->title,
        ];
        
        return $data;
    }
}
