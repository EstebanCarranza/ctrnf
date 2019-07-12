@extends('layouts.master')
@section('body')
<h4 class="center">Week 2 (2019-07-10 to 2019-07-17) [AAAA-MM-DD] </h4>
<h5 class='center gmtDate'></h5>
<br>
 <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab theme col s2"><a class="active" href="#test0">Tier</a></li>
        <li class="tab theme col s2"><a href="#test1">Quick</a></li>
        <li class="tab theme col s2"><a  href="#test2">Dialy</a></li>
        <li class="tab theme col s2"><a href="#test3">Weekly</a></li>
        <li class="tab theme col s2"><a href="#test4">Themed</a></li>
        <li class="tab theme col s2"><a href="#test5">Pro</a></li>
      </ul>
    </div>
    <div id="test0" class="col s12">@include('inc.tier')</div>
    <div id="test1" class="col s12">@include('inc.quick')</div>
    <div id="test2" class="col s12">@include('inc.dialy')</div>
    <div id="test3" class="col s12">@include('inc.weekly')</div>
    <div id="test4" class="col s12">@include('inc.themed')</div>
    <div id="test5" class="col s12">@include('inc.pro')</div>
  </div>
    <script>


        $(document).ready(function(){
            $('.sidenav').sidenav();
             $('.tabs').tabs();
              TierList = [];

              function updateClock(){
                 dataTime = new Date().toISOString();
                 dateVal = dataTime.substring(0, 10);
                 timeVal = dataTime.substring(11, 19);
                  $(".gmtDate").text('NOW ['+dateVal+']['+timeVal+']' + " [GMT]");
              }
            


            // call this function again in 1000ms
            setInterval(updateClock, 1000);
        });
        
    </script>
@stop
