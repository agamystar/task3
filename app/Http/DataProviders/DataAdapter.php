<?php
namespace App\Http\DataProviders;
class DataAdapter{
    public static $DataAfterMapping=[];
    public static function init($obj)
    {
        collect($obj->getData()->mapData())
        ->map(function ($e) {
            self::$DataAfterMapping[]= $e;
        });
      
    }
    public static function search($filter){
       $q=collect(self::$DataAfterMapping);
        if($filter->id){
        $q=$q->where("id",$filter->id);
        }
        if($filter->provider){
        $q=$q->where("provider_name",$filter->provider);
        }
        if($filter->currency){
        $q=$q->where("currency",$filter->currency);
        }
        if($filter->statusCode){
         $q=$q->where("status",$filter->statusCode);
        }
        if($filter->amounteMin){
         $q=$q->where("amount",'>=',$filter->amounteMin);
        }
        if($filter->amounteMin){
        $q=$q->where("amount",'<=',$filter->amounteMax);
        }

       return $q;
    }
}
?>