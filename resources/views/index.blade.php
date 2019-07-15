@extends('layouts.master')
@section('body')
<h4 class="center">Week 2 (2019-07-10 to 2019-07-17) [AAAA-MM-DD] </h4>
<h5 class='center gmtDate'></h5>
<br>
<div class="row">
  <div class="row col l6 s12">
  <div class='row card-panel col s12 theme'>
    <p class="col l12 m4 s12 row">
        <span class="col s12 row center"><strong>Total Wumpa Coins</strong></span>
        <span class="input-field col s12">
          <input id="txtWumpaCoins" type="number" class="txtWumpaCoins validate center theme col s12" value="0">
          <label for="txtWumpaCoins">Wumpa Coins</label>
        </span>
        <span class="col s12 row center"><strong>Add/remove wumpas</strong></span>
        <a class="btnRemoveWumpaCoins col s3 blue darken-4 waves-effect waves-light btn left"><i class="material-icons">remove</i></a>        
        <span class="col s6 row">
          <input id="txtWumpaCoins" type="number" class="txtWumpaCoinsValue center validate center theme col s12" value="0">
        </span>
        <a class="btnAddWumpaCoins col s3 blue darken-4 waves-effect waves-light btn right"><i class="material-icons">add</i></a>
        <a class="col s12 waves-effect waves-light btn blue darken-4 btnDeleteWumpaCoins">delete<i class="material-icons right">delete</i></a>
      </p>
    </div>
  </div>
  <div class="row col l6 s12">
    <div class='row card-panel col s12 theme'>
      <p class="col l12 m4 s12 row">
        <span class="col s12 row center"><strong>Total Trophies</strong></span>
        <span class="input-field col s12">
          <input id="txtTrophies" type="number" class="txtTrophies validate center theme col s12" value="0">
          <label for="txtTrophies">Trophies</label>
        </span>
        <span class="col s12 row center"><strong>Add/remove trophies</strong></span>
        <a class="btnRemoveTrophies col s3 blue darken-4 waves-effect waves-light btn left"><i class="material-icons">remove</i></a>
        <span class="col s6 row">
          <input id="txtTrophies" type="number" class="txtTrophiesValue center validate center theme col s12" value="0">
        </span>
        <a class="btnAddTrophies col s3 blue darken-4 waves-effect waves-light btn right"><i class="material-icons">add</i></a>
        <a class="col s12 waves-effect waves-light btn blue darken-4 btnDeleteTrophies">delete<i class="material-icons right">delete</i></a>
      </p>
    </div>
  </div>
</div>
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


  
  
  <div class="row">
    <h1>Feedback</h1>    
      <form method="post" action="challengeDT" class="col s12">
        {{@csrf_field()}}
        <div class="row">
          <div class="input-field col s12">
            <textarea name="description" id="textarea2" class="materialize-textarea theme" required></textarea>
            <label for="textarea2">Write your feedback</label>
          </div>
        </div>
         <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Send feedback
            <i class="material-icons right">send</i>
          </button>
      </form>
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

            function saveDataLocalStorage(objectData, name)
            {
              localStorage.setItem(name, objectData.val());
              objectData.val(localStorage.getItem(name));
            }
          
            $(".txtWumpaCoins").change(function(){saveDataLocalStorage($(this),'wumpaCoinsData');}).keyup(function(){saveDataLocalStorage($(this),'wumpaCoinsData'); ($(this).val()=="")?($(this).val(0)):('nothing');});
            $(".txtTrophies").change(function(){saveDataLocalStorage($(this),'trophiesData');}).keyup(function(){saveDataLocalStorage($(this),'trophiesData'); ($(this).val()=="")?($(this).val(0)):('nothing');});
            
            $(".txtWumpaCoins").val((localStorage.getItem("wumpaCoinsData")!=null)?localStorage.getItem('wumpaCoinsData'):0);
            $(".txtTrophies").val((localStorage.getItem("trophiesData")!=null)?localStorage.getItem('trophiesData'):0);

            $(".txtWumpaCoinsValue").change(function(){validarCambioValor($(this));}).keyup(function(){validarCambioValor($(this));});
            $(".txtTrophiesValue").change(function(){validarCambioValor($(this));}).keyup(function(){validarCambioValor($(this));});

            function validarCambioValor(objectData)
            {
              if(objectData.val() != 0)
              {
                
                if(objectData.hasClass('txtWumpaCoinsValue')){
                  localStorage.setItem("txtWumpaCoinsValue",objectData.val());
                  $(".btnRemoveWumpaCoins").removeClass("disabled");
                  $(".btnAddWumpaCoins").removeClass("disabled");
                }else if(objectData.hasClass('txtTrophiesValue')){
                  localStorage.setItem("txtTrophiesValue",objectData.val());
                  $(".btnRemoveTrophies").removeClass("disabled");
                  $(".btnAddTrophies").removeClass("disabled");
                }
              }else 
              {
                if(objectData.hasClass('txtWumpaCoinsValue')){
                  $(".btnRemoveWumpaCoins").addClass("disabled");
                  $(".btnAddWumpaCoins").addClass("disabled");
                }else if(objectData.hasClass('txtTrophiesValue')){
                  $(".btnRemoveTrophies").addClass("disabled");
                  $(".btnAddTrophies").addClass("disabled");
                }
                
              }
              
              if(objectData.val() == "")
              {
                objectData.val(0);
              }
            }
            $(".btnAddWumpaCoins").click(function(){
              addRemoveValue($(this),"add","txtWumpaCoinsValue","txtWumpaCoins","wumpaCoinsData");
            });
            $(".btnRemoveWumpaCoins").click(function(){
              addRemoveValue($(this),"remove","txtWumpaCoinsValue","txtWumpaCoins","wumpaCoinsData");
            });
            $(".btnAddTrophies").click(function(){
              addRemoveValue($(this),"add","txtTrophiesValue","txtTrophies","trophiesData");
            });
            $(".btnRemoveTrophies").click(function(){
              addRemoveValue($(this),"remove","txtTrophiesValue","txtTrophies","trophiesData");
            });
            function addRemoveValue(objectData,status,classInput,classOutput,localStorageName)
            {
                if(status == "add")
                {
                    tmpData = parseInt($("."+classOutput).val(),10) + parseInt($("."+classInput).val(),10);
                    
                }else if(status == "remove"){
                    tmpData = parseInt($("."+classOutput).val(),10) - parseInt($("."+classInput).val(),10);
                } 
                localStorage.setItem(localStorageName, tmpData);
                localStorage.setItem(classInput, $("."+classInput).val());
                $("."+classOutput).val(localStorage.getItem(localStorageName));
            }
            $(".txtWumpaCoinsValue").val((localStorage.getItem("txtWumpaCoinsValue")!=null)?localStorage.getItem("txtWumpaCoinsValue"):0);
            $(".txtTrophiesValue").val((localStorage.getItem("txtTrophiesValue")!=null)?localStorage.getItem("txtTrophiesValue"):0);


            $(".btnDeleteTrophies").click(function(){
              localStorage.setItem("txtTrophiesValue",0);
              localStorage.setItem("trophiesData",0);
              $(".txtTrophiesValue").val(0);
              $(".txtTrophies").val(0);
            });
            $(".btnDeleteWumpaCoins").click(function(){
              localStorage.setItem("txtWumpaCoinsValue",0);
              localStorage.setItem("wumpaCoinsData",0);
              $(".txtWumpaCoinsValue").val(0);
              $(".txtWumpaCoins").val(0);
            });
        });
        
    </script>
@stop
