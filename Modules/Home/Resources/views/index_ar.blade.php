<!DOCTYPE html>
<html lang="ar">
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
    <link rel="stylesheet" href="{{Module::asset('home:css/style__rtl.css')}}">
    <!-- =============== APP SCRIPT ===============-->
    <script src="{{Module::asset('home:js/modernizr.js')}}"></script>
      
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
          height: 100% !important;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
      </style>

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
                <div class="buttons"><a class="pull-right btn bordered-btn" href="" target="_blank"><i class="fa fa-external-link"></i>الموقع</a><a class="pull-right btn bordered-btn" href="{{ route('event_view',['id' => $event->id]) }}">en</a><a class="pull-right btn bordered-btn" id="subscribe_btn" href="#subscribe"><i class="fa fa-edit"></i>اشترك</a></div>
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
                <div class="col-xs-12 image-content-area no-padding" data-wow-duration="1000ms" data-wow-delay="400ms">
                  <!--.col-sm-5.no-padding//img.img-responsive.img-msg(src="img/contact/contact-form.jpg")
                  -->
                  <div class="col-sm-6 col-xs-12 no-padding">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h3> {{$event_name}}</h3>
                      <p>{{$event_description}}</p>
                      <div class="map" id="map" style="width:100% ;height:200px !important">
                        {{--  <iframe class="img-responsive" id="gmap_canvas" height="300" src="https://maps.google.com/maps?q=cairo fest   ival&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net"></a>  --}}
                      </div>
                      
                      <a class="pull-right link" id="subscriped_users_btn" href="#subscriped_users"><i class="fa fa-link"></i>&nbsp;
                        المشتركين</a>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 no-padding"><img class="img-responsive" src="{{asset($event_media) or Module::asset('home:img/event-img.jpg')}}"></div>
                </div>
              </div>
              <div class="clearfix"> </div>
              <div class="container shadow bg" id="subscribe">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h3> للاشتراك</h3>
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
              </div>
              <div class="clearfix"></div><br>
              <div class="container shadow bg" id="subscriped_users">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h3> المشتركين</h3>
                </div>
                <div class="col-xs-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th> #</th>
                        <th> Name</th>
                        <th> email</th>
                        <th> Mobile</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> 234234</td>
                        <td> <a href="">User Name1</a></td>
                        <td> <a href="mailto:"> example@gmail.com</a></td>
                        <td> <a href="">0123456789</a></td>
                      </tr>
                      <tr>
                        <td> 234234</td>
                        <td> <a href="">User Name2</a></td>
                        <td> <a href="mailto:"> example@gmail.com</a></td>
                        <td> <a href="">0123456789</a></td>
                      </tr>
                      <tr>
                        <td> 234234</td>
                        <td> <a href="">User Name3</a></td>
                        <td> <a href="mailto:"> example@gmail.com</a></td>
                        <td> <a href="">0123456789</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
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
                <div class="text-center">حقوق البرمجة<a class="gold" href="http://pentavalue.com/en"> Pentavalue </a><span>- جميع الحقوق محفوظة ©</span><a class="brandName" href="home.html">Eventakom</a><span>2018</span></div><br>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- =============== APP MAIN SCRIPTS ===============-->
    <script type="text/javascript" src="{{Module::asset('home:js/scripts.js')}}"></script>
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <script type="text/javascript">
      var map;
      function initMap() {
        // The location of Uluru
      //  var uluru = {lat: -25.344, lng: 131.036};
        var uluru = { lat: {{ $event->latitude }}, lng: {{ $event->longtuide }} };
        // The map, centered at Uluru
         map = new google.maps.Map(
            document.getElementById('map'), {zoom: 18, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8aQknkKjiVzor_CteINbAwM1gvNESPLA&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">
      $("#subscribe_btn").on('click',function(){
        $("#subscribe").toggle();
      })
      $(function(){
        $("#subscribe").hide();
      })
      $("#subscriped_users_btn").on('click',function(){
        $("#subscriped_users").toggle();
      })
      $(function(){
        $("#subscriped_users").hide();
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
