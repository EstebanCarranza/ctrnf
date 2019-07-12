<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class challengeDT extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $challengeDTArray = array();
        
        $challengeDT = array();
        array_push($challengeDT, "Kamikase");
        array_push($challengeDT, "Explota blablabla");
        array_push($challengeDT, "0");
        array_push($challengeDT, "2");
        array_push($challengeDTArray, $challengeDT);

        $challengeDT = array();
        array_push($challengeDT, "adfafa");
        array_push($challengeDT, "dfadasfdasf blablabla");
        array_push($challengeDT, "0");
        array_push($challengeDT, "5");
        array_push($challengeDTArray, $challengeDT);

        $challengeDT = array();
        array_push($challengeDT, "adfadfadfasf");
        array_push($challengeDT, "nmhmhm blablabla");
        array_push($challengeDT, "0");
        array_push($challengeDT, "1");
        array_push($challengeDTArray, $challengeDT);

        $challengeDT = array();
        array_push($challengeDT, "rtrtr");
        array_push($challengeDT, "afggng blablabla");
        array_push($challengeDT, "0");
        array_push($challengeDT, "10");
        array_push($challengeDTArray, $challengeDT);

        return response()->json($challengeDTArray);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
