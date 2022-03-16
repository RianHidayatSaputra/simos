<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $year = ['2015','2016','2017','2018','2019','2020'];

        // $user = [];
        // foreach ($year as $key => $value) {
        //     $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        // }
        // ->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))

        $data = UsersRepository::hitung();
        dd($data);

    	return view('backend.dashboard',$data);
    }
}
