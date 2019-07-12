<div class='row'>
  <h1 class='col l8 s12 dialyTotalData'>Dialy</h1>
  <h1 class='col l2 s4'><img class='col s12 responsive-img' src='img/02_dialy.png'></h1>
  <h1 class='col l2 s4 offset-s4'><a class="waves-effect waves-light btn blue btnDeleteDialy">delete<i class="material-icons right">delete</i></a></h1>
</div>
      <div class="tblDialyBody theme row"></div>
<script>
  $(document).ready()
    {
      challengeListDialy = [];
      dialyTotalDataCompletado = 0;
      function updateDialyList()
      {
          $.ajax(
            {
                type:'GET',
                url:'/Dialy',
                dataType:'json',
                async:'true',

                success: function(data){
                  
                challengeListDialyArray = JSON.parse(localStorage.getItem('challengeListDialy'));
                  //Validar localstorage primero
                  contResultDialy = 0;
                  
                  if(challengeListDialyArray != null)
                  for(i = 0; i < data.length; i++)
                  {
                    if(data[i].idChallengeDT == challengeListDialyArray[i].idChallengeDT)
                    {
                      contResultDialy++;
                    }
                  }
                  for(i = 0; i < data.length; i++)
                  {
                    if(contResultDialy == data.length)
                    {
                      challengeListDialy[i] = new challengeDT(challengeListDialyArray[i]);
                    }
                    else
                    {
                      challengeListDialy[i] = new challengeDT(data[i]);
                    }
      
                      
                    cardDialy = "<div class='row col s12'>";

                    if(challengeListDialy[i].completado == challengeListDialy[i].total){
                      cardDialy += "<div class='card col green darken-1 white-text s12 row'>";
                      dialyTotalDataCompletado++;
                      }
                    else
                      cardDialy += "<div class='card col theme s12 row'>";

                    cardDialy += "<p class='col l2 m3 s12 row'>"+
                                  "<span class='col s12'><strong>Title</strong></span>"+
                                  "<span class='col s12'>"+challengeListDialy[i].title+"</span>"+
                                "</p>"+
                                "<p class='col l4 m3 s12 row'>"+
                                  "<span class='col s12'><strong>Description</strong></span>"+
                                  "<span class='col s12'>"+challengeListDialy[i].description+"</span>"+
                                "</p>"+
                                "<p class='col l2 m2 s12 row'>"+
                                  "<span class='col s12'><strong>Nitro Points</strong></span>"+
                                  "<span class='col s12'>"+challengeListDialy[i].NitroPoints+"</span>"+
                                "</p>"+
                              
                                "<p class='col l4 m4 s12 row'>"+
                                    "<span class='col s12 center'><strong>Total</strong></span>";
                                if(challengeListDialy[i].completado == 0){
                                cardDialy +=
                                    "<a class='disabled btnRemoveDialy col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                                }else {
                                cardDialy +=  "<a class='btnRemoveDialy col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                                }
                                cardDialy +=  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center theme txtCountDialy col s6' type='text' value='"+challengeListDialy[i].completado+"'/><span class='col s6'>/"+challengeListDialy[i].total + "</span></span>";
                                if(challengeListDialy[i].completado == challengeListDialy[i].total){
                                cardDialy +=  "<a class='disabled btnAddDialy col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                                }else {
                                cardDialy +=  "<a class='btnAddDialy col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                                }
                                cardDialy +=
                                "</p>"+
                              "</div>"+
                            
                          "</div>"
                        ;
                    $(".tblDialyBody").append(cardDialy);
                  }
                  setTheme();
                  localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
                  $(".btnRemoveDialy").on('click', function(){
                      index = $(this).parent().find('.txtCountDialy').attr('index');
                      if(challengeListDialy[index].completado>0)
                      {
                        challengeListDialy[index].completado--;
                        $(this).parent().find('.txtCountDialy').val(challengeListDialy[index].completado);
                        localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
                        challengeListDialy = JSON.parse(localStorage.getItem('challengeListDialy'));
                        if(challengeListDialy[index].completado == challengeListDialy[index].total-1)
                        {
                            dialyTotalDataCompletado--;
                          $(".dialyTotalData").html("Dialy ["+dialyTotalDataCompletado+"/"+challengeListDialy.length+"]");
                        }
                        
                      }
                      if(challengeListDialy[index].completado == 0){
                        $(this).addClass("disabled");
                      }
                        $(this).parent().parent().addClass("theme");
                        $(this).parent().parent().removeClass("green darken-1");
                        $(this).parent().parent().removeClass("white-text");
                        setTheme();
                        $(this).parent().find('.btnAddDialy').removeClass("disabled");
                    });
                    $(".btnAddDialy").on('click',function(){
                      debugger;
                      index = $(this).parent().find('.txtCountDialy').attr('index');
                      if(challengeListDialy[index].completado<challengeListDialy[index].total)
                      {
                        challengeListDialy[index].completado++;
                        $(this).parent().find('.txtCountDialy').val(challengeListDialy[index].completado);
                        localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
                        challengeListDialy = JSON.parse(localStorage.getItem('challengeListDialy'));
                        $(this).parent().find('.btnRemoveDialy').removeClass("disabled");
                      }
                       if(challengeListDialy[index].completado == challengeListDialy[index].total)
                      {
                        $(this).parent().parent().removeClass("white");
                        $(this).parent().parent().removeClass("black-text");
                        $(this).parent().parent().removeClass("grey darken-4");
                        $(this).parent().parent().removeClass("white-text");
                        $(this).parent().parent().removeClass("theme");
                        $(this).parent().parent().addClass("green darken-1");
                        $(this).parent().parent().addClass("white-text");
                        $(this).addClass("disabled");
                        dialyTotalDataCompletado++;
                        $(".dialyTotalData").html("Dialy ["+dialyTotalDataCompletado+"/"+challengeListDialy.length+"]");
                      }else{
                        
                        $(this).parent().parent().addClass("theme");
                        $(this).parent().parent().removeClass("green darken-1");
                        $(this).parent().parent().removeClass("white-text");
                        setTheme();
                        $(this).removeClass("disabled");
                        /*
                        if(challengeListDialy[index].completado == challengeListDialy[index].total-1){
                          dialyTotalDataCompletado--;
                          $(".dialyTotalData").html("Dialy ["+dialyTotalDataCompletado+"/"+challengeListDialy.length+"]");
                        }*/
                      }
                      
                    });
                    $(".dialyTotalData").html("Dialy ["+dialyTotalDataCompletado+"/"+challengeListDialy.length+"]"); 
                // alert('successful');
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema' + xhr + " " +status);
                }
            }
          );
      }
      updateDialyList();
      $(".btnDeleteDialy").click(function(){
        dialyTotalDataCompletado = 0;
        localStorage.removeItem('challengeListDialy');
        $(".tblDialyBody").text("");
        updateDialyList();
        setTheme();
      });
    };
</script>