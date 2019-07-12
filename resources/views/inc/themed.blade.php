<h1>Themed</h1>

      <div class="tblThemedBody row"></div>
<script>
  $(document).ready()
    {
      challengeListThemed = [];
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
                  $(".tblThemedBody").append(
                   "<div class='row col s12'>"+
                          "<div class='card col s12 row'>"+
                            "<p class='col l2 m3 s12 row'>"+
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
                                  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center txtCountThemed col s6' type='text' value='"+challengeListThemed[i].completado+"'/><span class='col s6'>/"+challengeListThemed[i].total + "</span></span>" +
                                "<a class='btnAddThemed col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                            "</p>"+
                          "</div>"+
                        
                      "</div>"
                    );
                
              }
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