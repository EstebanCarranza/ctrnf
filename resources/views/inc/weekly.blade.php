<h1>Weekly</h1>

      <div class="tblWeekly row"></div>
<script>
  $(document).ready()
    {
      challengeListWeekly = [];
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
                  $(".tblWeekly").append(
                  "<div class='row col s12'>"+
                          "<div class='card col s12 row'>"+
                            "<p class='col l2 m3 s12 row'>"+
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
                                "<span class='col s12 center'><strong>Total</strong></span>"+
                                "<a class='btnRemoveWeekly col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>"+
                                  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center txtCountWeekly col s6' type='text' value='"+challengeListWeekly[i].completado+"'/><span class='col s6'>/"+challengeListWeekly[i].total + "</span></span>" +
                                "<a class='btnAddWeekly col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                            "</p>"+
                          "</div>"+
                        
                      "</div>"
                    );
                
              }
               localStorage.setItem('challengeListWeekly', JSON.stringify(challengeListWeekly));
              $(".btnRemoveWeekly").on('click', function(){
                  index = $(this).parent().find('.txtCountWeekly').attr('index');
                  if(challengeListWeekly[index].completado>0)
                  {
                    challengeListWeekly[index].completado--;
                    $(this).parent().find('.txtCountWeekly').val(challengeListWeekly[index].completado);
                    localStorage.setItem('challengeListWeekly', JSON.stringify(challengeListWeekly));
                    challengeListWeekly = JSON.parse(localStorage.getItem('challengeListWeekly'));
                  }
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
                  }
                }); 
             // alert('successful');
            },
             error : function(xhr, status) {
                alert('Disculpe, existió un problema' + xhr + " " +status);
            }
        }
      );
    };
</script>