<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\DataProviders\DataAdapter;
use App\Http\DataProviders\DataProviderW;
use App\Http\DataProviders\DataProviderX;
use App\Http\DataProviders\DataProviderY;

class HomeController extends Controller{ 
 
    public function index(Request $request){
        DataAdapter::init(new DataProviderW());
        DataAdapter::init(new DataProviderX());
        DataAdapter::init(new DataProviderY());
        return DataAdapter::search($request);
    }
}
?>