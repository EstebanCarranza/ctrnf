<div class='row'>
  <h1 class='col l8 s12 weeklyTotalData'>Weekly</h1>
  <h1 class='col l2 s4'><img class='col s12 responsive-img' src='img/03_weekly.png'></h1>
  <h1 class='col l2 s4 offset-s4'><a class="waves-effect waves-light btn blue btnDeleteWeekly">delete<i class="material-icons right">delete</i></a></h1>
</div>

      <div class="tblWeeklyBody theme row"></div>
<script>
  $(document).ready()
    {
      challengeListWeekly = [];
      weeklyTotalDataCompletado = 0;
      function updateWeeklyList()
      {
        $.ajax(
          {
              type:'GET',
              url:'/Weekly',
              dataType:'json',
              async:'true',

              success: function(data){
                
                
                challengeListWeeklyArray = JSON.parse(localStorage.getItem('challengeListWeekly'));
                //Validar localstorage primero
                contResultWeekly = 0;
                if(challengeListWeeklyArray != null)
                if(challengeListWeeklyArray.length > 0)
                for(i = 0; i < data.length; i++)
                {
                  if(data[i].idChallengeDT == challengeListWeeklyArray[i].idChallengeDT)
                  {
                    contResultWeekly++;
                  }
                }
                for(i = 0; i < data.length; i++)
                {
                  if(contResultWeekly == data.length)
                  {
                    challengeListWeekly[i] = new challengeDT(challengeListWeeklyArray[i]);
                  }
                  else
                  {
                    challengeListWeekly[i] = new challengeDT(data[i]);
                  }
                  
                  cardWeekly = "<div class='row col s12'>";

                    if(challengeListWeekly[i].completado == challengeListWeekly[i].total){
                      cardWeekly += "<div class='card col green darken-1 white-text s12 row'>";
                      weeklyTotalDataCompletado++;
                    }
                    else
                      cardWeekly += "<div class='card col theme s12 row'>";

                    cardWeekly += "<p class='col l2 m3 s12 row'>"+
                                "<span class='col s12'><strong>Title</strong></span>"+
                                "<span class='col s12'>"+challengeListWeekly[i].title+"</span>"+
                              "</p>"+
                              "<p class='col l4 m3 s12 row'>"+
                                "<span class='col s12'><strong>Description</strong></span>"+
                                "<span class='col s12'>"+challengeListWeekly[i].description+"</span>"+
                              "</p>"+
                              "<p class='col l2 m2 s12 row'>"+
                                "<span class='col s12'><strong>Nitro Points</strong></span>"+
                                "<span class='col s12'>"+challengeListWeekly[i].NitroPoints+"</span>"+
                              "</p>"+
                            
                              "<p class='col l4 m4 s12 row'>"+
                                  "<span class='col s12 center'><strong>Total</strong></span>";
                              if(challengeListWeekly[i].completado == 0)
                               cardWeekly +=   "<a class='disabled btnRemoveWeekly col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                               else
                               cardWeekly +=   "<a class='btnRemoveWeekly col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";

                               cardWeekly +=     "<span class='col s6 center row'>" + "<input index='"+i+"' class='center theme txtCountWeekly col s6' type='text' value='"+challengeListWeekly[i].completado+"'/><span class='col s6'>/"+challengeListWeekly[i].total + "</span></span>";
                              if(challengeListWeekly[i].completado == challengeListWeekly[i].total)
                               cardWeekly +=   "<a class='disabled btnAddWeekly col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                              else
                               cardWeekly +=   "<a class='btnAddWeekly col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";

                             cardWeekly+= "</p>"+
                            "</div>"+
                          
                        "</div>"
                      ;
                      $(".tblWeeklyBody").append(cardWeekly);
                  
                }
                setTheme();
                localStorage.setItem('challengeListWeekly', JSON.stringify(challengeListWeekly));
                $(".btnRemoveWeekly").on('click', function(){
                    index = $(this).parent().find('.txtCountWeekly').attr('index');
                    if(challengeListWeekly[index].completado>0)
                    {
                      challengeListWeekly[index].completado--;
                      $(this).parent().find('.txtCountWeekly').val(challengeListWeekly[index].completado);
                      localStorage.setItem('challengeListWeekly', JSON.stringify(challengeListWeekly));
                      challengeListWeekly = JSON.parse(localStorage.getItem('challengeListWeekly'));
                      if(challengeListWeekly[index].completado == challengeListWeekly[index].total-1)
                        {
                            weeklyTotalDataCompletado--;
                          $(".weeklyTotalData").html("Weekly ["+weeklyTotalDataCompletado+"/"+challengeListWeekly.length+"]");
                        }
                    }
                    if(challengeListWeekly[index].completado == 0)
                    {
                      $(this).addClass("disabled");
                    }
                     $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    $(this).parent().find('.btnAddWeekly').removeClass('disabled');
                  });
                  $(".btnAddWeekly").on('click',function(){
                    //debugger;
                    index = $(this).parent().find('.txtCountWeekly').attr('index');
                    if(challengeListWeekly[index].completado<challengeListWeekly[index].total)
                    {
                      challengeListWeekly[index].completado++;
                      $(this).parent().find('.txtCountWeekly').val(challengeListWeekly[index].completado);
                      localStorage.setItem('challengeListWeekly', JSON.stringify(challengeListWeekly));
                      challengeListWeekly = JSON.parse(localStorage.getItem('challengeListWeekly'));
                      $(this).parent().find('.btnRemoveWeekly').removeClass('disabled');
                    }
                     if(challengeListWeekly[index].completado == challengeListWeekly[index].total)
                  {
                    $(this).parent().parent().removeClass("white");
                    $(this).parent().parent().removeClass("black-text");
                    $(this).parent().parent().removeClass("grey darken-4");
                    $(this).parent().parent().removeClass("white-text");
                    $(this).parent().parent().removeClass("theme");
                    $(this).parent().parent().addClass("green darken-1");
                    $(this).parent().parent().addClass("white-text");
                    $(this).addClass("disabled");
                    weeklyTotalDataCompletado++;
                        $(".weeklyTotalData").html("Weekly ["+weeklyTotalDataCompletado+"/"+challengeListWeekly.length+"]");
                  }else{
                    
                    $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    $(this).removeClass("disabled");
                  }
                  }); 
                  $(".weeklyTotalData").html("Weekly ["+weeklyTotalDataCompletado+"/"+challengeListWeekly.length+"]");
              // alert('successful');
              },
              error : function(xhr, status) {
                  alert('Disculpe, existió un problema' + xhr + " " +status);
              }
          }
        );
      }
       updateWeeklyList();
      $(".btnDeleteWeekly").click(function(){
        weeklyTotalDataCompletado = 0;
        localStorage.removeItem('challengeListWeekly');
        $(".tblWeeklyBody").text("");
        updateWeeklyList();
        setTheme();
      });
    };
</script>