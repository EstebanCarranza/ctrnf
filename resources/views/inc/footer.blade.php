 <footer class="page-footer blue darken-4">
    <div class="container">
    <div class="row">
        <div class="col l6 s12">
        <h5 class="white-text">Twicky</h5>
        <p class="grey-text text-lighten-4">A page powered for Twicky Team</p>
         
        <p> <a class="waves-effect waves-light btn modal-trigger blue darken-4" href="#modal1">See announcement of the beginning</a></p>
        </div>
        <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
            <li><a class="grey-text text-lighten-3" href="http://twicky.com.mx">Twicky Page</a></li>
        </ul>
        </div>
    </div>
    </div>
    <div class="footer-copyright">
    <div class="container">
        © 2019 Twicky
        [Visits:&nbsp;<span class='visitsWebPage'> </span>]
    </div>
    </div>
</footer>
<script>
    $(document).ready(function(){
       function updateViews()
      {
          $.ajax(
            {
                type:'GET',
                url:'/Views',
                dataType:'json',
                async:'true',

                success: function(data){
                  if(data != null)
                  $(".visitsWebPage").text(data.value);
                // alert('successful');
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema' + xhr + " " +status);
                }
            }
          );
      }
      updateViews();
    });
</script>