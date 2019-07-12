<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class challengeData extends Controller
{
    //
    public function getQuick()
    {
     //   $hoy=new DateTime("now");
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 1)->get();
        return response()->json($quickTable);
    }
    public function getDialy()
    {
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 2)->get();
        return response()->json($quickTable);
    }
    public function getWeekly()
    {
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 3)->get();
        return response()->json($quickTable);
    }
    public function getThemed()
    {
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 4)->get();
        return response()->json($quickTable);
    }
    public function getPro()
    {
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 5)->get();
        return response()->json($quickTable);
    }
    public function getTier()
    {
        $quickTable = DB::table('tbl_tier')->select()->get();
        return response()->json($quickTable);
    }
}
