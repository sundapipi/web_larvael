<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //
    function index(Request $request){
//        return 11421211;
    
        DB::table('table_user')->where('连贯操作','where 条件')->get();
    }
}
