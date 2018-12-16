<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- =====================================================-->
    <!-- ==================HEAD=============================-->
    <!-- =====================================================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Vapulus">
    <meta name="keywords" content="Vapulus">
    <!-- =============== APP FAVICON ===============-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{Module::asset('home:img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{Module::asset('home:img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{Module::asset('home:img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{Module::asset('home:img/favicon/manifest.json')}}">
    <link rel="mask-icon" href="{{Module::asset('home:img/favicon/safari-pinned-tab.svg')}}" color="#22b681">
    <meta name="msapplication-TileColor" content="#22b681">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#1c5ba8">
    <!-- =============== APP TITLE ===============-->
    <title>Eventakom</title>
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{Module::asset('home:css/style__ltr.css')}}">
    <!-- =============== APP SCRIPT ===============-->
    <script src="{{Module::asset('home:js/modernizr.js')}}"></script>
  </head>
  <body>
    <div class="toggled" id="wrapper">
      <div class="layout_sidebar">
        <div class="wrapper">
          <!-- top navbar-->
          <header class="topnavbar-wrapper">
            <div class="thetop"></div>
            <button class="scrolltop shadow" id="topBtn" title="Go to top"><i class="fa fa-caret-up scroll"></i></button>
            <div class="fixed-logo">
              <div class="container no-padding"><a class="navbar-brand shadow" href=""><img class="logo" src="{{Module::asset('home:img/logo/logo__dark.svg')}}" alt=""></a>
              </div>
            </div>
          </header>
          <div class="full-body">
            <!-- search-->
            <!-- =============== OVERLAY ===============-->
            <!-- Page content-->
            <div>
              <div class="banner_area share-page">  </div>
              <div class="container animated fadeInRightBig share_area no-padding">
                <div class="col-xs-12 text-center" data-wow-duration="1000ms" data-wow-delay="400ms"><br><br>
                  @if(!isset($event_not_found))
                  <h2> This Event Has Expired</h2>
                 @else
                  <h2> Event not Found </h2>
                  @endif
                </div>
              </div>
              {{--  <div class="clearfix"> </div>
              <div class="container shadow bg" id="subscribe">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h3> Subscription</h3>
                </div>
                <form class="form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <div class="col-xs-12 no-padding">
                        <input type="text" id="first-name" placeholder="Name ..."><small>error message</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 no-padding">
                        <input type="email" id="email" placeholder="Email Address ..."><small>error message</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 no-padding">
                        <input type="number" id="mobile" placeholder="Mobile number ..."><small>error message</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button class="shadow pull-right bordered-btn">Send</button>
                  </div>
                  <div class="clearfix"></div><br>
                </form>
              </div>  --}}
              <div class="clearfix"></div>
              <!-- =============== PAGE VENDOR Triggers ===============-->
            </div>
          </div>
          <!-- Page footer-->
          <footer>
            <!-- =====================================================-->
            <!-- ==================FOOTER=============================-->
            <!-- ========================footer=============================-->
            <div class="copyrights">
              <div class="container"><br>
                <div class="text-center">Developed by <a class="gold" href="http://pentavalue.com/en">Pentavalue</a><span> - All rights reserved ©</span><a class="brandName" href="home.html">Eventakom</a><span>2018</span></div><br>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- =============== APP MAIN SCRIPTS ===============-->
    <script type="text/javascript" src="js/scripts.js"></script>
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <script type="text/javascript">
      $("#subscribe_btn").on('click',function(){
        $("#subscribe").toggle();
      })
      $(function(){
        $("#subscribe").hide();
      });

      $(document).ready(function(){
         $("a").on('click', function(event) {
           if (this.hash !== "") {
             event.preventDefault();
             var hash = this.hash;
             $('html, body').animate({
               scrollTop: $(hash).offset().top
             }, 800, function(){
               window.location.hash = hash;
             });
           }
         });
       });

    </script>
  </body>
</html>
