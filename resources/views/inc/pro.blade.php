<div class='row'>
  <h1 class='col l8 s12 proTotalData'>Pro</h1>
  <h1 class='col l2 s4'><img class='col s12 responsive-img' src='img/05_pro.png'></h1>
  <h1 class='col l2 s4 offset-s4'><a class="waves-effect waves-light btn blue btnDeletePro">delete<i class="material-icons right">delete</i></a></h1>
</div>
     <div class="tblProBody theme row"></div> 
<script>
  $(document).ready()
    {
      challengeListPro = [];
      proTotalDataCompletado = 0;
      function updateProList()
      {
        $.ajax(
          {
              type:'GET',
              url:'/Pro',
              dataType:'json',
              async:'true',

              success: function(data){
                
                challengeListProArray = JSON.parse(localStorage.getItem('challengeListPro'));
                
                //Validar localstorage primero
                contResultPro = 0;
                
                if(challengeListProArray != null)
                if(challengeListProArray.length > 0)
                for(i = 0; i < data.length; i++)
                {
                  if(data[i].idChallengeDT == challengeListProArray[i].idChallengeDT)
                  {
                    contResultPro++;
                  }
                }
                for(i = 0; i < data.length; i++)
                {
                  if(contResultPro == data.length)
                  {
                    challengeListPro[i] = new challengeDT(challengeListProArray[i]);
                  }
                  else
                  {
                    challengeListPro[i] = new challengeDT(data[i]);
                  }
                  cardPro = "<div class='row col s12'>";

                    if(challengeListPro[i].completado == challengeListPro[i].total){
                      cardPro += "<div class='card col green darken-1 white-text s12 row'>";
                      proTotalDataCompletado++;
                    }
                    else
                      cardPro += "<div class='card col theme s12 row'>";

                    cardPro += "<p class='col l2 m3 s12 row'>"+
                                "<span class='col s12'><strong>Title</strong></span>"+
                                "<span class='col s12'>"+challengeListPro[i].title+"</span>"+
                              "</p>"+
                              "<p class='col l4 m3 s12 row'>"+
                                "<span class='col s12'><strong>Description</strong></span>"+
                                "<span class='col s12'>"+challengeListPro[i].description+"</span>"+
                              "</p>"+
                              "<p class='col l2 m2 s12 row'>"+
                                "<span class='col s12'><strong>Nitro Points</strong></span>"+
                                "<span class='col s12'>"+challengeListPro[i].NitroPoints+"</span>"+
                              "</p>"+
                            
                              "<p class='col l4 m4 s12 row'>"+
                                  "<span class='col s12 center'><strong>Total</strong></span>";
                              if(challengeListPro[i].completado == 0)
                                cardPro +=    "<a class='disabled btnRemovePro col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                              else
                                cardPro +=    "<a class='btnRemovePro col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";

                              cardPro +=      "<span class='col s6 center row'>" + "<input index='"+i+"' class='center theme txtCountPro col s6' type='text' value='"+challengeListPro[i].completado+"'/><span class='col s6'>/"+challengeListPro[i].total + "</span></span>";

                              if(challengeListPro[i].completado == challengeListPro[i].total)
                                cardPro +=    "<a class='disabled btnAddPro col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                              else
                                cardPro +=    "<a class='btnAddPro col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";

                              cardPro +="</p>"+
                            "</div>"+
                          
                        "</div>"
                      ;
                      $(".tblProBody").append(cardPro);
                  
                }
                setTheme();
                localStorage.setItem('challengeListPro', JSON.stringify(challengeListPro));
                $(".btnRemovePro").on('click', function(){
                    index = $(this).parent().find('.txtCountPro').attr('index');
                    if(challengeListPro[index].completado>0)
                    {
                      challengeListPro[index].completado--;
                      $(this).parent().find('.txtCountPro').val(challengeListPro[index].completado);
                      localStorage.setItem('challengeListPro', JSON.stringify(challengeListPro));
                      challengeListPro = JSON.parse(localStorage.getItem('challengeListPro'));
                      if(challengeListPro[index].completado == challengeListPro[index].total-1)
                      {
                        proTotalDataCompletado--;
                        $(".proTotalData").html("Pro ["+proTotalDataCompletado+"/"+challengeListPro.length+"]");

                      }
                    }
                    if(challengeListPro[index].completado == 0)
                    {
                      $(this).addClass('disabled');
                    }
                     $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    $(this).parent().find('.btnAddPro').removeClass('disabled');
                  });
                  $(".btnAddPro").on('click',function(){
                    //debugger;
                    index = $(this).parent().find('.txtCountPro').attr('index');
                    if(challengeListPro[index].completado<challengeListPro[index].total)
                    {
                      challengeListPro[index].completado++;
                      $(this).parent().find('.txtCountPro').val(challengeListPro[index].completado);
                      localStorage.setItem('challengeListPro', JSON.stringify(challengeListPro));
                      challengeListPro = JSON.parse(localStorage.getItem('challengeListPro'));
                      $(this).parent().find('.btnRemovePro').removeClass('disabled');
                    }
                     if(challengeListPro[index].completado == challengeListPro[index].total)
                  {
                    $(this).parent().parent().removeClass("white");
                    $(this).parent().parent().removeClass("black-text");
                    $(this).parent().parent().removeClass("grey darken-4");
                    $(this).parent().parent().removeClass("white-text");
                    $(this).parent().parent().removeClass("theme");
                    $(this).parent().parent().addClass("green darken-1");
                    $(this).parent().parent().addClass("white-text");
                    $(this).addClass('disabled');
                    proTotalDataCompletado++;
                        $(".proTotalData").html("Pro ["+proTotalDataCompletado+"/"+challengeListPro.length+"]");
                  }else{
                    
                    $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    $(this).removeClass('disabled');
                  }
                  }); 
              // alert('successful');
              $(".proTotalData").html("Pro ["+proTotalDataCompletado+"/"+challengeListPro.length+"]");
              },
              error : function(xhr, status) {
                  alert('Disculpe, existió un problema' + xhr + " " +status);
              }
          }
        );
      }
       updateProList();
      $(".btnDeletePro").click(function(){
        proTotalDataCompletado = 0;
        localStorage.removeItem('challengeListPro');
        $(".tblProBody").text("");
        updateProList();
        setTheme();
      });
    };
</script>