<div class='row'>
  <h1 class='col l8 s12 quickTotalData'>Quick</h1>
  <h1 class='col l2 s4'><img class='col s12 responsive-img' src='img/01_quick.png'></h1>
  <h1 class='col l2 s4 offset-s4'><a class="waves-effect waves-light btn blue btnDeleteQuick">delete<i class="material-icons right">delete</i></a></h1>
</div>

<div class="tblQuickBody theme row"></div>
      
<script>
  $(document).ready()
    {
      challengeListQuick = [];
      quickTotalDataCompletado = 0;
      function updateQuickList()
      {
          $.ajax(
        {
            type:'GET',
            url:'/Quick',
            dataType:'json',
            async:'true',

            success: function(data){
              
              challengeListQuickArray = JSON.parse(localStorage.getItem('challengeListQuick'));
              //Validar localstorage primero
              contResultQuick = 0;
               if(challengeListQuickArray != null)
              for(i = 0; i < data.length; i++)
              {
                if(data[i].idChallengeDT == challengeListQuickArray[i].idChallengeDT)
                {
                  contResultQuick++;
                }
              }
              $(".tblQuickBody").text("");
              for(i = 0; i < data.length; i++)
              {
                if(contResultQuick == data.length)
                {
                  challengeListQuick[i] = new challengeDT(challengeListQuickArray[i]);
                }
                else
                {
                  challengeListQuick[i] = new challengeDT(data[i]);
                }
                  
                    cardQuick = 
                      "<div class='row  col s12'>";
                    
                    if(challengeListQuick[i].completado == challengeListQuick[i].total){
                      cardQuick += "<div class='card-statusQuick card green darken-1 white-text col s12 row'>";
                      quickTotalDataCompletado++;
                    }
                    else 
                      cardQuick += "<div class='card-statusQuick card theme col s12 row'>";
                    cardQuick +=  
                            "<p class='col l2 m3 s12 row'>"+
                              "<span class='col s12'><strong>Title</strong></span>"+
                              "<span class='col s12'>"+challengeListQuick[i].title+"</span>"+
                            "</p>"+
                            "<p class='col l4 m3 s12 row'>"+
                              "<span class='col s12'><strong>Description</strong></span>"+
                              "<span class='col s12'>"+challengeListQuick[i].description+"</span>"+
                            "</p>"+
                            "<p class='col l2 m2 s12 row'>"+
                              "<span class='col s12'><strong>Nitro Points</strong></span>"+
                              "<span class='col s12'>"+challengeListQuick[i].NitroPoints+"</span>"+
                            "</p>"+
                           
                            "<p class='col l4 m4 s12 row'>"+
                                "<span class='col s12 center'><strong>Total</strong></span>";
                              if(challengeListQuick[i].completado == 0){
                               cardQuick += "<a class='disabled btnRemoveQuick col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                              }else {
                                cardQuick +="<a class='btnRemoveQuick col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>";
                                }
                                 cardQuick += "<span class='col s6 center row'>" + "<input index='"+i+"' class='center theme txtCountQuick col s6' type='text' value='"+challengeListQuick[i].completado+"'/><span class='col s6'>/"+challengeListQuick[i].total + "</span></span>";
                              if(challengeListQuick[i].completado == challengeListQuick[i].total){
                                 cardQuick +="<a class='disabled btnAddQuick col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                              }else{
                                cardQuick += "<a class='btnAddQuick col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>";
                              }
                            cardQuick +=
                            "</p>"+
                          "</div>"+
                        
                      "</div>";
                    $(".tblQuickBody").append(cardQuick);

                setTheme();
                 
              }
             
              localStorage.setItem('challengeListQuick', JSON.stringify(challengeListQuick));
              $(".btnRemoveQuick").on('click', function(){
                  index = $(this).parent().find('.txtCountQuick').attr('index');
                  if(challengeListQuick[index].completado>0)
                  {
                    challengeListQuick[index].completado--;
                    $(this).parent().find('.txtCountQuick').val(challengeListQuick[index].completado);
                    localStorage.setItem('challengeListQuick', JSON.stringify(challengeListQuick));
                    challengeListQuick = JSON.parse(localStorage.getItem('challengeListQuick'));
                    $(this).parent().find('.btnAddQuick').removeClass("disabled");
                    quickTotalDataCompletado--;
                    $(".quickTotalData").html("Quick ["+quickTotalDataCompletado+"/"+challengeListQuick.length+"]");
                  }else{
                    $(this).addClass("disabled");
                  }
               
                    $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    
                });
                $(".btnAddQuick").on('click',function(){
                  //debugger;
                  index = $(this).parent().find('.txtCountQuick').attr('index');
                  if(challengeListQuick[index].completado<challengeListQuick[index].total)
                  {
                    challengeListQuick[index].completado++;
                    $(this).parent().find('.txtCountQuick').val(challengeListQuick[index].completado);
                    localStorage.setItem('challengeListQuick', JSON.stringify(challengeListQuick));
                    challengeListQuick = JSON.parse(localStorage.getItem('challengeListQuick'));
                    $(this).parent().find('.btnRemoveQuick').removeClass("disabled");
                  }
                   if(challengeListQuick[index].completado == challengeListQuick[index].total)
                  {
                    debugger;
                    $(this).parent().parent().removeClass("white");
                    $(this).parent().parent().removeClass("black-text");
                    $(this).parent().parent().removeClass("grey darken-4");
                    $(this).parent().parent().removeClass("white-text");
                    $(this).parent().parent().removeClass("theme");
                    $(this).parent().parent().addClass("green darken-1");
                    $(this).parent().parent().addClass("white-text");
                    $(this).addClass("disabled");
                      quickTotalDataCompletado++;
                      $(".quickTotalData").html("Quick ["+quickTotalDataCompletado+"/"+challengeListQuick.length+"]");
                    
                    
                  }else{
                    
                    $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    $(this).removeClass("disabled");
                    quickTotalDataCompletado--;
                    $(".quickTotalData").html("Quick ["+quickTotalDataCompletado+"/"+challengeListQuick.length+"]");
                  }
                }); 


                $(".quickTotalData").html("Quick ["+quickTotalDataCompletado+"/"+challengeListQuick.length+"]");
             // alert('successful');
            },
             error : function(xhr, status) {
                alert('Disculpe, existió un problema' + xhr + " " +status);
            }
        }
        );
      }
      

      updateQuickList();
      $(".btnDeleteQuick").click(function(){

quickTotalDataCompletado = 0;
        localStorage.removeItem('challengeListQuick');
        $(".tblQuickBody").text("");
        updateQuickList();
        setTheme();
      });
    };
</script>