<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class challengeData extends Controller
{
    //
    public function getTime()
    {
        $fechaActual = gmdate("Y-m-j", time());
        return response()->json($fechaActual);
    }
    public function getQuick()
    {
     //   $hoy=new DateTime("now");
     //gmdate("Y/m/j H:i:s", time()
        $fechaActual = gmdate("Y-m-j", time());
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 1)->where('fechaInicio','=',$fechaActual)->get();
        return response()->json($quickTable);
    }
    public function getDialy()
    {
        $fechaActual = gmdate("Y/m/j H:i:s", time());
        $quickTable = DB::table('tbl_challengeDT')->select()->where('idChallenge', 2)->where('fechaInicio','=',$fechaActual)->get();
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
    public function getTrackRace()
    {
        $quickTable = DB::table('tbl_track')->select()->where('mode',1)->get();
        return response()->json($quickTable);
    }
    public function getTrackBattle()
    {
        $quickTable = DB::table('tbl_track')->select()->where('mode',2)->get();
        return response()->json($quickTable);
    }
}
