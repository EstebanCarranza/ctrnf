<h1>Dialy</h1>

      <div class="tblDialyBody row"></div>
<script>
  $(document).ready()
    {
      challengeListDialy = [];
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
  
                  $(".tblDialyBody").append(
                 "<div class='row col s12'>"+
                          "<div class='card col s12 row'>"+
                            "<p class='col l2 m3 s12 row'>"+
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
                                "<span class='col s12 center'><strong>Total</strong></span>"+
                                "<a class='btnRemoveDialy col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>"+
                                  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center txtCountDialy col s6' type='text' value='"+challengeListDialy[i].completado+"'/><span class='col s6'>/"+challengeListDialy[i].total + "</span></span>" +
                                "<a class='btnAddDialy col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                            "</p>"+
                          "</div>"+
                        
                      "</div>"
                    );
                
              }
              localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
              $(".btnRemoveDialy").on('click', function(){
                  index = $(this).parent().find('.txtCountDialy').attr('index');
                  if(challengeListDialy[index].completado>0)
                  {
                    challengeListDialy[index].completado--;
                    $(this).parent().find('.txtCountDialy').val(challengeListDialy[index].completado);
                    localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
                    challengeListDialy = JSON.parse(localStorage.getItem('challengeListDialy'));
                  }
                });
                $(".btnAddDialy").on('click',function(){
                  //debugger;
                  index = $(this).parent().find('.txtCountDialy').attr('index');
                  if(challengeListDialy[index].completado<challengeListDialy[index].total)
                  {
                    challengeListDialy[index].completado++;
                    $(this).parent().find('.txtCountDialy').val(challengeListDialy[index].completado);
                    localStorage.setItem('challengeListDialy', JSON.stringify(challengeListDialy));
                    challengeListDialy = JSON.parse(localStorage.getItem('challengeListDialy'));
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