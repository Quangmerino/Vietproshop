<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $now = Carbon::now();

        $current_month = $now->format('m');
        $current_year = $now->format('Y');
        for($i = 1; $i <= $current_month; $i++){
            $arr['Tháng0'.$i] = Order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$i)->sum('total');
        }
        $data['chartData']= $arr;
        $data['cerrentMonth'] = $current_month;
        $data['totalOrder'] = Order::where('state',2)->whereYear('updated_at',$i)->count();
        return view('admin.index',$data);
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
