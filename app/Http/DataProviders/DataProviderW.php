<?php
namespace App\Http\DataProviders;
class DataProviderW extends Provider{ 
    protected $url="http://api.mcg.pm/DataProviderW.json";
    protected $provider_name="DataProviderW";
   
    public function mapData(){
        $mapping=[];
        foreach($this->data as $one){
            if($one->status == "done")
            $status="paid";
            elseif($one->status == "wait")
            $status="pending";  
            elseif($one->status == "nope")
            $status="reject";
            $one->status=$status;
            $one->provider_name=$this->provider_name;
            $one->id=(string)$one->id;
            $mapping[]=$one;
        }
        return $mapping;
    }
     
}
?>