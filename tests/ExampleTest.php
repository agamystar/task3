<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Http\DataProviders\DataProviderX;
use App\Http\DataProviders\DataProviderY;

class ExampleTest extends TestCase
{
    
    public function testURL()
    {
    $response =$this->call('GET','/api/v1/transactions');
    $this->assertEquals(200, $response->status());     
    }
    public function testMapping()
    {
    $x=new DataProviderX();
    $x=$x->getData()->mapData();
    $y=new DataProviderY();
    $y=$y->getData()->mapData();
    
    if(array_diff_key((array)$x[0],(array)$y[0])==[]){
    $this->assertTrue(true);    
    }else{
    $this->assertTrue(false);    
    } 
    
}

}
