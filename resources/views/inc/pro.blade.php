<h1>Pro</h1>

     <div class="tblProBody row"></div> 
<script>
  $(document).ready()
    {
      challengeListPro = [];
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
                  $(".tblProBody").append(
                  "<div class='row col s12'>"+
                          "<div class='card col s12 row'>"+
                            "<p class='col l2 m3 s12 row'>"+
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
                                "<span class='col s12 center'><strong>Total</strong></span>"+
                                "<a class='btnRemovePro col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>"+
                                  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center txtCountPro col s6' type='text' value='"+challengeListPro[i].completado+"'/><span class='col s6'>/"+challengeListPro[i].total + "</span></span>" +
                                "<a class='btnAddPro col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                            "</p>"+
                          "</div>"+
                        
                      "</div>"
                    );
                
              }
               localStorage.setItem('challengeListPro', JSON.stringify(challengeListPro));
              $(".btnRemovePro").on('click', function(){
                  index = $(this).parent().find('.txtCountPro').attr('index');
                  if(challengeListPro[index].completado>0)
                  {
                    challengeListPro[index].completado--;
                    $(this).parent().find('.txtCountPro').val(challengeListPro[index].completado);
                    localStorage.setItem('challengeListPro', JSON.stringify(challengeListPro));
                    challengeListPro = JSON.parse(localStorage.getItem('challengeListPro'));
                  }
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