<h1>Quick</h1>

<div class="tblQuickBody row"></div>
      
<script>
  $(document).ready()
    {
      challengeListQuick = [];
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
                  $(".tblQuickBody").append(
                      "<div class='row col s12'>"+
                          "<div class='card col s12 row'>"+
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
                                "<span class='col s12 center'><strong>Total</strong></span>"+
                                "<a class='btnRemoveQuick col s3 blue darken-4 waves-effect waves-light btn left'><i class='material-icons'>remove</i></a>"+
                                  "<span class='col s6 center row'>" + "<input index='"+i+"' class='center txtCountQuick col s6' type='text' value='"+challengeListQuick[i].completado+"'/><span class='col s6'>/"+challengeListQuick[i].total + "</span></span>" +
                                "<a class='btnAddQuick col s3 blue darken-4 waves-effect waves-light btn right'><i class='material-icons'>add</i></a>"+
                            "</p>"+
                          "</div>"+
                        
                      "</div>"
                    );
/*
                  $(".tblQuickBody").append(
                  "<tr>"+
                    "<td class='col s2'>"+challengeListQuick[i].title+"</td>"+
                    "<td class='col s4'>"+challengeListQuick[i].description+"</td>"+
                    "<td class='col s2'>"+challengeListQuick[i].NitroPoints+"</td>"+
                    "<td class='col s4' class='row'>"+
                        "<a class='btnRemoveQuick col s3 blue darken-4 waves-effect waves-light btn'><i class='material-icons'>remove</i></a>"+
                        "<div class='col s6 center row'>" + "<input index='"+i+"' class='txtCountQuick col s6' type='text' value='"+challengeListQuick[i].completado+"'/><label class='col s6'>/"+challengeListQuick[i].total + "</label></div>" +
                        "<a class='btnAddQuick col s3 blue darken-4 waves-effect waves-light btn'><i class='material-icons'>add</i></a>"+
                      "</td>"+
                  "</tr>"
                );*/
                
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
                  }
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