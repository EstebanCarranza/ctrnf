@extends('layouts.master')
@section('body')
<div class='card-panel theme'>
    <div class="row">
        <div class='col s12 dataRandomTrack theme'></div>
        <a class="col s12 btnUpdateTrackSelector blue darken-4 waves-effect waves-light btn"><i class="material-icons right">update</i>Update</a>
    </div>
</div>
    <script>
        $(document).ready(function(){
            getRaceTracks();
          $('.materialboxed').materialbox();

            $(".btnUpdateTrackSelector").click(function(){
                if (RaceTracks.length > 0)
                {
                    index = randomIntFromInterval(1, 32) - 1;
                    $(".dataRandomTrack").html("<h1>Number Track: " + RaceTracks[index].numberTrack + "<br>Name track: " + RaceTracks[index].title + "</h1><img class='materialboxed' width='100%' src='http://localhost:8000/image/track?id="+RaceTracks[index].numberTrack + "'><br>");
                }
            });
        });
        
    </script>
@stop
