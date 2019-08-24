<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class challengeData extends Controller
{
    public function getImageTrack(Request $request)
    {
        //Si no manda ID solamente retornará la leyenda que este en el "else"
        if($request->id)
        {
            $id = $request->id;
            
            $data = DB::table('tbl_track')->select('pathImage')->where('numberTrack', $id)->first();
            if($data)
            { 
               if($exists = Storage::disk('local')->exists($data->pathImage))
                    $response = response()->make(Storage::get($data->pathImage, 200));
                else 
                    $response = response()->make(Storage::get('public/sample.jpg', 200));
                
                
                $response->header("Content-Type", 'image/png');
                return $response;
                
            }
            else {return "Imagen no encontrada";}
        }else {
            return "Los datos ingresados no son correctos";
        }
        
    }
    //
    public function getFeedbacks()
    {
        $quickTable = DB::table('tbl_feedback')->select()->get();
        
        return response()->json($quickTable);
    }

    public function getVisitPage()
    {
        $quickTable = DB::table('tbl_webPageParams')->select()->where('idWebPageParams', 1)->first();

        DB::table('tbl_webPageParams')
            ->where('idWebPageParams', 1)
            ->update([
                'value'        =>          ($quickTable->value+1)
            ]);
        
        $quickTable = DB::table('tbl_webPageParams')->select()->where('title', 'ctrnfPageViews')->first();
        return response()->json($quickTable);
    }
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
        $fechaActual = gmdate("Y-m-j", time());
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
