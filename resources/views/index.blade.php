@extends('layouts.master')
@section('body')
<h4 class="center">Week 2 (2019-07-10 to 2019-07-17) [AAAA-MM-DD] </h4>
<h5 class='center gmtDate'></h5>
<br>
 <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab tabChallenge theme col s2"><a class="active" href="#test0">Tier</a></li>
        <li class="tab tabChallenge theme col s2"><a href="#test1">Quick</a></li>
        <li class="tab tabChallenge theme col s2"><a  href="#test2">Dialy</a></li>
        <li class="tab tabChallenge theme col s2"><a href="#test3">Weekly</a></li>
        <li class="tab tabChallenge theme col s2"><a href="#test4">Themed</a></li>
        <li class="tab tabChallenge theme col s2"><a href="#test5">Pro</a></li>
      </ul>
    </div>
    <div id="test0" class="col s12">@include('inc.tier')</div>
    <div id="test1" class="col s12">@include('inc.quick')</div>
    <div id="test2" class="col s12">@include('inc.dialy')</div>
    <div id="test3" class="col s12">@include('inc.weekly')</div>
    <div id="test4" class="col s12">@include('inc.themed')</div>
    <div id="test5" class="col s12">@include('inc.pro')</div>
  </div>




  <!-- Modal Structure -->
  <div id="modal1" class="modal theme">
    <div class="modal-content">
      <h4 class='theme'>CTRNF <--> Twicky Team</h4>
      <p class='theme flow-text'>
        This website is not official, it is only designed by fans of the videogame 'crash team racing nitro fueled' in order to help the community.
        <br>What can you do here?<br>
        Capture your progress of the challenges shown in the GrandPrix, progress is only saved in the web browser and not in a database.</p>
    </div>
    <div class="modal-footer theme">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat theme">Agree</a>
    </div>
  </div>



    <script>


        $(document).ready(function(){
            $('.sidenav').sidenav();
             $('.tabs').tabs();
              $('.modal').modal();

               $('#modal1').modal('open');
              TierList = [];

              function updateClock(){
                 dataTime = new Date().toISOString();
                 dateVal = dataTime.substring(0, 10);
                 timeVal = dataTime.substring(11, 19);
                  $(".gmtDate").text('NOW ['+dateVal+']['+timeVal+']' + " [GMT]");
              }
              $(".tabChallenge").click(function(){setTheme();});            
              setTheme();

            // call this function again in 1000ms
            setInterval(updateClock, 1000);


            
            


        });
        
    </script>
@stop
