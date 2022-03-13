<?php
namespace App\Http\DataProviders;
class DataProviderX extends Provider{ 
    protected $url="http://api.mcg.pm/DataProviderX.json";
    protected $provider_name="DataProviderX";
    
    public function mapData(){
        $mapping=[];
         foreach($this->data as $one){
            if($one->transactionStatus == "1")
            $status="paid";
            elseif($one->transactionStatus == "2")
            $status="pending";  
            elseif($one->transactionStatus == "3")
            $status="reject";
             $mapping[]=[
                "amount"=>$one->transactionAmount,
                "currency"=>$one->Currency,
                "phone"=>$one->senderPhone,
                "status"=> $status,
                "created_at"=> $one->transactionDate,
                "id"=> $one->transactionIdentification,
                "provider_name"=>$this->provider_name,
             ];
        }
        return $mapping;
    }
     
}
?>