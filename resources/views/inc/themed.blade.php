<div class='row'>
  <h1 class='col l8 s12 themedTotalData'>Themed</h1>
  <h1 class='col l2 s4'><img class='col s12 responsive-img' src='img/04_themed.png'></h1>
  <h1 class='col l2 s4 offset-s4'><a class="waves-effect waves-light btn blue btnDeleteThemed">delete<i class="material-icons right">delete</i></a></h1>
</div>

      <div class="tblThemedBody theme row"></div>
<script>
  $(document).ready()
    {
      challengeListThemed = [];
      themedTotalDataCompletado = 0;
      function updateThemedList()
      {
        $.ajax(
          {
              type:'GET',
              url:'/Themed',
              dataType:'json',
              async:'true',

              success: function(data){
                
              challengeListThemedArray = JSON.parse(localStorage.getItem('challengeListThemed'));
                //Validar localstorage primero
                contResultThemed = 0;
                
                if(challengeListThemedArray != null)
                for(i = 0; i < data.length; i++)
                {
                  if(data[i].idChallengeDT == challengeListThemedArray[i].idChallengeDT)
                  {
                    contResultThemed++;
                  }
                }
                for(i = 0; i < data.length; i++)
                {
                  if(contResultThemed == data.length)
                  {
                    challengeListThemed[i] = new challengeDT(challengeListThemedArray[i]);
                  }
                  else
                  {
                    challengeListThemed[i] = new challengeDT(data[i]);
                  }
                   cardThemed = "<div class='row col s12'>";

                    if(challengeListThemed[i].completado == challengeListThemed[i].total){
                      cardThemed += "<div class='card col green darken-1 white-text s12 row'>";
                      themedTotalDataCompletado++;
                    }
                    else
                      cardThemed += "<div class='card col theme s12 row'>";

                    cardThemed += "<p class='col l2 m3 s12 row'>"+
                                "<span class='col s12'><strong>Title</strong></span>"+
                                "<span class='col s12'>"+challengeListThemed[i].title+"</span>"+
                              "</p>"+
                              "<p class='col l4 m3 s12 row'>"+
                                "<span class='col s12'><strong>Description</strong></span>"+
                                "<span class='col s12'>"+challengeListThemed[i].description+"</span>"+
                              "</p>"+
                              "<p class='col l2 m2 s12 row'>"+
                                "<span class='col s12'><strong>Nitro Points</strong></span>"+
                                "<span class='col s12'>"+challengeListThemed[i].NitroPoints+"</span>"+
                              "</p>"+
                            
                              "<p class='col l4 m4 s12 row'>"+
                                  "<span class='col s12 center'><strong>Total</strong></span>"+
                                  "<a class='btnRemoveThemed col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>"+
                                    "<span class='col s6 center row'>" + "<input index='"+i+"' class='center theme txtCountThemed col s6' type='text' value='"+challengeListThemed[i].completado+"'/><span class='col s6'>/"+challengeListThemed[i].total + "</span></span>" +
                                  "<a class='btnAddThemed col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                              "</p>"+
                            "</div>"+
                          
                        "</div>"
                      ;
                    $(".tblThemedBody").append(cardThemed);
                }
                setTheme();
                localStorage.setItem('challengeListThemed', JSON.stringify(challengeListThemed));
                $(".btnRemoveThemed").on('click', function(){
                    index = $(this).parent().find('.txtCountThemed').attr('index');
                    if(challengeListThemed[index].completado>0)
                    {
                      challengeListThemed[index].completado--;
                      $(this).parent().find('.txtCountThemed').val(challengeListThemed[index].completado);
                      localStorage.setItem('challengeListThemed', JSON.stringify(challengeListThemed));
                      challengeListThemed = JSON.parse(localStorage.getItem('challengeListThemed'));
                    }
                     $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                  });
                  $(".btnAddThemed").on('click',function(){
                    //debugger;
                    index = $(this).parent().find('.txtCountThemed').attr('index');
                    if(challengeListThemed[index].completado<challengeListThemed[index].total)
                    {
                      challengeListThemed[index].completado++;
                      $(this).parent().find('.txtCountThemed').val(challengeListThemed[index].completado);
                      localStorage.setItem('challengeListThemed', JSON.stringify(challengeListThemed));
                      challengeListThemed = JSON.parse(localStorage.getItem('challengeListThemed'));
                    }
                     if(challengeListThemed[index].completado == challengeListThemed[index].total)
                  {
                    $(this).parent().parent().removeClass("white");
                    $(this).parent().parent().removeClass("black-text");
                    $(this).parent().parent().removeClass("grey darken-4");
                    $(this).parent().parent().removeClass("white-text");
                    $(this).parent().parent().removeClass("theme");
                    $(this).parent().parent().addClass("green darken-1");
                    $(this).parent().parent().addClass("white-text");
                    themedTotalDataCompletado++;
                        $(".themedTotalData").html("Themed ["+themedTotalDataCompletado+"/"+challengeListThemed.length+"]");
                    
                  }else{
                    
                    $(this).parent().parent().addClass("theme");
                    $(this).parent().parent().removeClass("green darken-1");
                    $(this).parent().parent().removeClass("white-text");
                    setTheme();
                    themedTotalDataCompletado--;
                        $(".themedTotalData").html("Themed ["+themedTotalDataCompletado+"/"+challengeListThemed.length+"]");
                  }
                  }); 
              // alert('successful');
              },
              error : function(xhr, status) {
                  alert('Disculpe, existió un problema' + xhr + " " +status);
              }
          }
        );
      }
       updateThemedList();
      $(".btnDeleteThemed").click(function(){

        localStorage.removeItem('challengeListThemed');
        $(".tblThemedBody").text("");
        updateThemedList();
        setTheme();
      });
    };
</script>