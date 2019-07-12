<nav class="blue darken-4">
    <div class="container">
        <div class="nav-wrapper">
        <a href="#!" class="brand-logo">CTRNF [NO OFICIAL]</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="#">Acerca de</a></li>
             <li>
                <!-- Switch -->
                <div class="switch material-icons">
                    <label>
                    brightness_2
                    <input type="checkbox" class="chkTheme">
                    <span class="lever"></span>
                    brightness_high
                    </label>
                </div>
             </li>
             
        </ul>
        </div>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="#">Acerca de</a></li>
     <li>
        <!-- Switch -->
                <div class="switch material-icons">
                    <label>
                    brightness_2
                    <input type="checkbox" class="chkTheme">
                    <span class="lever"></span>
                    brightness_high
                    </label>
                </div>
        </li>
  </ul>
          

  <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            if(!localStorage.getItem('theme'))
            {
                $(".chkTheme").checked = true;
            }

            if(localStorage.getItem('theme') == "white")
            {
                //debugger;
                $.each($(".chkTheme"), function( index, value ) {
                    value.checked = true;
                });
                //$(".chkTheme").checked = true;
            }
             if(localStorage.getItem('theme') == "black")
            {
                //debugger;
                $.each($(".chkTheme"), function( index, value ) {
                    value.checked = false;
                });
            }   
             

            $(".chkTheme").change(function(){
                 if(!localStorage.getItem('theme'))
                    localStorage.setItem("theme", "white");
                //debugger;
                if($(this)[0].checked) tema = "white"; 
                else tema = "black";
                
                localStorage.setItem('theme',tema);
                if(tema == "white")
                {
                    $(".theme").removeClass("grey darken-4");
                    $(".theme").removeClass("white-text");
                    $(".theme").addClass("white");
                    $(".theme").addClass("black-text");
                }
                if(tema == "black")
                {
                    $(".theme").removeClass("white");
                    $(".theme").removeClass("black-text");
                    $(".theme").addClass("grey darken-4");
                    $(".theme").addClass("white-text");
                }
            });
        });
        
    </script>