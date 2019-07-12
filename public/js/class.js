class challengeDT 
{
    constructor(data)
    {   
        this.NitroPoints = data.NitroPoints;
        this.completado = data.completado;
        this.created_at = data.created_at;
        this.description = data.description;
        this.fechaFin = data.fechaFin;
        this.fechaInicio = data.fechaInicio;
        this.idChallenge = data.idChallenge;
        this.idChallengeDT = data.idChallengeDT;
        this.title = data.title;
        this.total = data.total;
        
    }

}
class tier
{
    constructor(data)
    {
        this.idTier = data.idTier;
        this.title  = data.title ;
        this.description = data.description;
        this.bronze  = data.bronze ;
        this.silver  = data.silver ;
        this.gold  = data.gold ;
        this.fechaInicio  = data.fechaInicio ;
        this.fechaFin  = data.fechaFin ;
        this.created_at  = data.created_at ;
        this.updated_at  = data.updated_at ;
    }
}

function setTheme() {
    if (!localStorage.getItem('theme')) {
        $(".chkTheme").checked = true;
    }

    if (localStorage.getItem('theme') == "white") {
        //debugger;
        $.each($(".chkTheme"), function (index, value) {
            value.checked = true;
        });
        $(".theme").removeClass("grey darken-4");
        $(".theme").removeClass("white-text");
        $(".theme").addClass("white");
        $(".theme").addClass("black-text");
        //$(".chkTheme").checked = true;
    }
    if (localStorage.getItem('theme') == "black") {
        //debugger;
        $.each($(".chkTheme"), function (index, value) {
            value.checked = false;
        });
        $(".theme").removeClass("white");
        $(".theme").removeClass("black-text");
        $(".theme").addClass("grey darken-4");
        $(".theme").addClass("white-text");
    }
    
   
}

function randomIntFromInterval(min, max) // min and max included
{
    return Math.floor(Math.random() * (max - min + 1) + min);
}
RaceTracks = [];
function getRaceTracks()
{
    $.ajax(
        {
            type: 'GET',
            url: '/RaceTracks',
            dataType: 'json',
            async: 'true',

            success: function (data) {
                RaceTracks = data;
                
                if (RaceTracks.length > 0)
                {
                    index = randomIntFromInterval(1, 32) - 1;
                    $(".dataRandomTrack").html("<h1>Number Track: " + RaceTracks[index].numberTrack + "<br>Name track: " + RaceTracks[index].title + "</h1>");
                }
                    
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema' + xhr + " " + status);
            }
        }
    );
    return RaceTracks;
}
BattleTracks = [];
function getBattleTracks()
{
    $.ajax(
        {
            type: 'GET',
            url: '/BattleTracks',
            dataType: 'json',
            async: 'true',

            success: function (data) {
                BattleTracks = data;
                debugger;
                // alert('successful');
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema' + xhr + " " + status);
            }
        }
    );
}