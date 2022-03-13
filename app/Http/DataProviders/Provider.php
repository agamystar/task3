<?php
namespace App\Http\DataProviders;
abstract class Provider{
    protected $url;
    protected $provider_name;
    public $data;
    
    public function getData(){ 
        try{
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$this->url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            $res = curl_exec($ch);
            //$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $this->data=json_decode($res);
            return $this;
        }catch(\Exceprion $ex){
            return $ex->errorMessage();
        }
    }
    abstract public function mapData();
}
?>