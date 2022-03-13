<?php
namespace App\Http\DataProviders;
class DataProviderY extends Provider{ 
    protected $url="http://api.mcg.pm/DataProviderY.json";
    protected $provider_name="DataProviderY";
   
    public function mapData(){
        $mapping=[];
        foreach($this->data as $one){ 
            if($one->status == 100)
            $status="paid";
            elseif($one->status == 200)
            $status="pending";  
            elseif($one->status == 300)
            $status="reject";
            $one->provider_name=$this->provider_name;
            $one->status=$status;
            $mapping[]=$one;
        }
        return $mapping;
    }
     
}
?>