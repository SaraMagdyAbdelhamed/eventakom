<!DOCTYPE html>
<html lang="{{ Session::get('locale') }}">
  <head>
    <!-- =====================================================-->
    <!-- ==================HEAD=============================-->
    <!-- =====================================================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="ايفنتكوم">
    <meta name="keywords" content="ايفنتكوم">
    <!-- =============== APP FAVICON ===============-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#ee4a7e">
    <meta name="msapplication-TileColor" content="#ee4a7e">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#281160">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- =============== APP TITLE ===============-->
    <title>Eventakom | ايفينتاكوم</title>
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="{{ asset( App::isLocale('ar') ? 'css/style__0__rtl.min.css' : 'css/style__0__ltr.min.css') }}">
    <!-- =============== APP SCRIPT ===============-->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="toggled" id="wrapper">
      <div class="layout_sidebar">
        <div class="wrapper">
          <!-- top navbar-->
          <header class="topnavbar-wrapper">
            <nav class="top-navbar navbar-expand-lg     bradius--noborder bshadow--1 ">
              <div class="container"><span></span>
                <button class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars  "></span></button>
                <ul class="actionsbar moile-view hidden-lg hidden-md hidden-sm">
                  <li class="dropdowny"><a class="nav-link dropdowny-toggle  " href="#"><i class="fa fa-bell"></i></a>
                    <ul class="dropdowny-menu" role="menu">
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                      <li><a href="#">
                          <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                          <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                            11:00:00AM</span></a></li>
                    </ul>
                  </li>
                </ul>
                <div class="collapse navbar-collapse nav pull-right  " id="navbarSupportedContent">
                  <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link English  " href="{{ App::isLocale('ar') ? preg_replace('/ar/', 'en', Request::url(), 1) : preg_replace('/en/', 'ar', Request::url(), 1) }}" title="{{ App::isLocale('ar') ? 'English' : 'Arabic' }}">{{ App::isLocale('ar') ? 'English' : 'العربية' }}</a></li>
                  </ul>
                  <ul class="actionsbar desktop-view hidden-xs">
                    <li class="dropdowny"><a class="nav-link dropdowny-toggle  " href="#"><i class="fa fa-bell"></i></a>
                      <ul class="dropdowny-menu" role="menu">
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum dollarss</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                        <li><a href="#">
                            <div class="icon-container"><i class="fa fa-volume-up"> </i></div>
                            <p>lorem ipsum dollar lorem ipsum</p><span class="notification_date"><i class="fa fa-clock-o"></i>5/11/2015
                              11:00:00AM</span></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>
          <div class="full-body">
            <div class="overlay-toggle-up"></div>
            <!-- sidebar-->
            <!-- ==============================================================-->
            <!-- ============================SIDEBAR==============================-->
            <!-- ==============================================================-->
            <!-- Sidebar-->
            <nav class="navbar navbar-fixed-top   bshadow--0 bradius--noborder " id="sidebar-wrapper" role="navigation">
              <ul class="sidebar-navigation">
                <li class="brand   bshadow--0"><a href="{{ Helper::route('about') }}"> <img src="{{ asset('img/logo/logo__light.svg') }}" alt="ايفنتكوم"></a></li>
              </ul>
              <div class="coverglobal text-center bshadow--2" style="background:undefined url( '{{ asset('img/covers/dummy.jpg') }}') no-repeat center center; background-size:cover;">
                <button class="hamburger is-closed" type="button" data-toggle="offcanvas"><span class="hamb-top"></span><span class="hamb-middle"></span><span class="hamb-bottom"></span></button>
                <div class="text-center"><a href="user_profile.html"><img class="coverglobal__avatar bradius--circle" src="{{ asset('img/avaters/male.jpg') }}">
                    <h3 class="coverglobal__title">{{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h3>
                    </a>
                    <small class="coverglobal__slogan">
                      <div class="row text-center">
                        {{ Helper::getUserLocalTimezone(Helper::getUserLastLogin()) }}
                      </div>
                    </small>
                  
                    <div style="margin-top: 5%;">
                      <a href="{{ route('logout') }}" class="master-btn bradius--small">{{ __('keywords.logout') }}</a>
                    </div>
                </div>
              </div>
              <div class="side">
                <ul class="side-menu">
                  <li class="side__list openedmenu"><a class="side__item side__item--sub">@lang('keywords.mainData')</a>
                    <ul class="side__submenu">
                      <li class="side__sublist"><a class="side__subitem pure-active" href="{{ \Helper::route('about') }}">@lang('keywords.aboutUs')</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="{{ \Helper::route('terms')  }}">@lang('keywords.terms')</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="{{ \Helper::route('privacy')  }}">@lang('keywords.privacy')</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="{{ \Helper::route('contact')  }}">@lang('keywords.contactUs')</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="{{ \Helper::route('event/categories')  }}">@lang('keywords.eventCategories')</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="main_data_famous_attractions_categories.html">Famous attractions categories</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="main_data_sponsors.html">Sponsors</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="main_data_trending_searches_control.html">Trending searches control</a>
                      </li>
                      <li class="side__sublist"><a class="side__subitem" href="main_data_notification_distance.html">Notification distance</a>
                      </li>
                    </ul>
                  </li>
                  <li class="side__list"> <a class="side__item side__item--sub">@lang('keywords.Users')</a>
                    <ul class="side__submenu">
                      <li class="side__sublist"><a class="side__subitem" href="{{ \Helper::route('users_mobile')  }}">@lang('keywords.MobileAppUsers')</a></li>
                      <li class="side__sublist"><a class="side__subitem" href="users_backend_users.html">@lang('keywords.BackendUsers')</a></li>
                    </ul>
                  </li>
                  <li class="side__list"> <a class="side__item side__item--sub">Events</a>
                    <ul class="side__submenu">
                      <li class="side__sublist"><a class="side__subitem" href="events_backend.html">Added from backend</a></li>
                      <li class="side__sublist"><a class="side__subitem" href="events_mobile_app.html">Added from mobile application</a></li>
                      <li class="side__sublist"><a class="side__subitem" href="events_big.html">Big events</a></li>
                    </ul>
                  </li>
                  <li class="side__list"> <a class="side__item side__item--sub">barcode</a>
                    <ul class="side__submenu">
                      <li class="side__sublist"><a class="side__subitem" href="barcode_scaning.html">barcode scaning</a></li>
                      <li class="side__sublist"><a class="side__subitem" href="barcode_success.html">barcode success</a></li>
                      <li class="side__sublist"><a class="side__subitem" href="barcode_failed.html">barcode failed</a></li>
                    </ul>
                  </li>
                  <li class="side__list"> <a class="side__item" href="famous_attractions.html">Famous attractions</a>
                  </li>
                  <li class="side__list"> <a class="side__item" href="offers_and_deals.html">Offers and deals</a>
                  </li>
                  <li class="side__list"> <a class="side__item" href="shop_and_dine.html">Shop and dine</a>
                  </li>
                  <li class="side__list"> <a class="side__item" href="notifications.html">Notifications</a>
                  </li>
                  <li class="side__list"> <a class="side__item" href="google_analytics.html">Google analytics</a>
                  </li>
                </ul>
              </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">

              {{-- Start alert messages --}}
              <div class="col-lg-12">
                @if (Session::has('success'))
                  <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('warning'))
                  <div class="alert alert-warning text-center">{{ Session::get('warning') }}</div>
                @endif

                @if (Session::has('error'))
                  <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif
              </div>
              {{-- End alert --}}

              {{-- yield data --}}
              @yield('content')
                
            </div>
          </div>
          <!-- Page footer-->
          <footer>
            <!-- =====================================================-->
            <!-- ==================FOOTER=============================-->
            <!-- =====================================================-->
            <div class="clear-fix"></div>
            <div class="footer--1 text-center     bradius--noborder bshadow--3">
              <p>
                 جميع الحقوق محفوظة  ©<span class="cp     bradius--noborder bshadow--0">ايفنتكوم</span>2018</p>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- =============== APP MAIN SCRIPTS ===============-->
    
    <script type="text/javascript" src="{{ asset('js/scripts.min.js') }}"></script>
    
    <!-- =============== PAGE VENDOR SCRIPTS ===============-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.4/tinymce.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        tinyMCE.init({
          selector: ".tinyMce",
          plugins: [ "image" , "code visualblocks"],
          valid_elements : '*[*]',
          toolbar: "image | undo | redo | styleselect | bold | italic | fontsizeselect | alignleft | aligncenter | alignright | alignjustify | preview ",
          schema: "html5",
        });
      });

      // hide alert message after 4 seconds => 4000 ms
      window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 4000);
    </script>

    <script type="text/javascript">
      //--Data table trigger --1
      $(document).ready(function(){
        if ( $('html').attr('lang') == 'ar' ) {
          var datatable_one = $("#dataTableTriggerId_001").DataTable({
          'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'this-include-check',
            'render': function (data, type, full, meta){
              return '<input class="input-in-table" type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
            }
          }],
          'order': [1, 'asc'],
            dom: '   <"row"    <" filterbar" flr + <"sortingr__btns_cont"  >> <"filter__btns_cont"  >    >  <"row"   <"data-table-trigger-cont"  t>    >  <"row"<"tableActions__btns_cont"> <"viewing-pagination"pi>  > ' ,
            "language": {
              "search": "dd",
              "sLengthMenu": "عرض _MENU_  ",
              search: " البحث _INPUT_",
              searchPlaceholder: "ابحث فى الجدول"          ,
              "emptyTable":     "لا توجد بيانات متاحه فى الجدول",
              "info":           "عرض _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
              "infoEmpty":      " عرض  0 to 0 of 0 مُدخل",
              "infoFiltered":   "(filtered from _MAX_ total entries)",
              "loadingRecords": "جارى التحميل...",
              "processing":     "جارى المعالجة...",
              "zeroRecords":    "لا توجد نتائج مطابخة",
              "paginate": {
                "first":      "الاول",
                "last":       "الاخير",
                "next":       "التالى",
                "previous":   "السابق"
              },
              "aria": {
                "sortAscending":  ": رتب تصاعدياً",
                "sortDescending": ": رتب تنازلياً"
              }
            }
          });
          
          //-trigger check one by one 
          $(document).on('click','#dataTableTriggerId_001 tbody tr input.input-in-table',function(){
            var RowParent = $(this).parents('tr') ;
            
            if ( $(this).parents('tr').hasClass('selected') ) {
              $(this).parents('tr').removeClass('selected');
            }
            else {
              $(this).parents('tr').addClass('selected');
            }  
          });
      
          //-trigger check All
          $('#dataTableTriggerId_001 #select-all').on('click',function(){
            if($(this).attr('data-click-state') == 0) {
              $(this).attr('data-click-state',1)
              var rows = datatable_one.rows().nodes();
              $('input.input-in-table' , rows).prop('checked',this.checked).parents('tr').addClass('selected');
              
            } else {
              var rows = datatable_one.rows().nodes();
              $('input.input-in-table' , rows).prop('checked',false).parents('tr').removeClass('selected');
              $(this).attr('data-click-state', 0);
            }
          });
      
          //-Delete buttons
          $('#delete-test').on('click', function() {
            var selectedRows = datatable_one.rows( $('#dataTableTriggerId_001 tr.selected') ).data().to$();
            datatable_one.rows( '.selected' ).remove().draw(false);
          });
          
          
        } else {
      
          var datatable_one = $("#dataTableTriggerId_001").DataTable({
            'columnDefs': [{
            'targets': 0,
            'searchable':false,
            'orderable':false,
            'className': 'this-include-check',
            'render': function (data, type, full, meta){
              return '<input class="input-in-table" type="checkbox" name="id[]" >';
            }
          }],
          'order': [1, 'asc'],
            dom: '   <"row"    <" filterbar" f + <"quick_filter_cont"  > + lr + <"sortingr__btns_cont"  >> <"filter__btns_cont"  >    >  <"row"   <"data-table-trigger-cont"  t>    >  <"row"<"tableActions__btns_cont"> <"viewing-pagination"pi>  > ' ,
            "language": {
              "search": "dd",
              "sLengthMenu": "Entries _MENU_  ",
              search: " Search _INPUT_",
              searchPlaceholder: "Search table ...."
            }
          });
      
          //-trigger check one by one 
          $(document).on('click','#dataTableTriggerId_001 tbody tr input.input-in-table',function(){
            var RowParent = $(this).parents('tr') ;
            
            if ( $(this).parents('tr').hasClass('selected') ) {
              $(this).parents('tr').removeClass('selected');
            }
            else {
              $(this).parents('tr').addClass('selected');
            }  
          });
      
          //-trigger check All
          $('#dataTableTriggerId_001 #select-all').on('click',function(){
            if($(this).attr('data-click-state') == 0) {
              $(this).attr('data-click-state',1)
              var rows = datatable_one.rows().nodes();
              $('input.input-in-table' , rows).prop('checked',this.checked).parents('tr').addClass('selected');
              
            } else {
              var rows = datatable_one.rows().nodes();
              $('input.input-in-table' , rows).prop('checked',false).parents('tr').removeClass('selected');
              $(this).attr('data-click-state', 0);
            }
          });
      
          //-Delete buttons
          $('#delete-test').on('click', function() {
            var selectedRows = datatable_one.rows( $('#dataTableTriggerId_001 tr.selected') ).data().to$();
            datatable_one.rows( '.selected' ).remove().draw(false);
          });
      
        }
      });
      
      
      $(document).ready(function(){
        $(".full-table").each(function() {
          $(this).find(".filter__btns").appendTo($(this).find(".filter__btns_cont"));
          $(this).find(".sortingr__btns").appendTo($(this).find(".sortingr__btns_cont"));
          $(this).find(".bottomActions__btns").appendTo($(this).find(".tableActions__btns_cont"));
          $(this).find(".quick_filter").appendTo($(this).find(".quick_filter_cont"));
          $(this).find(".view_options").appendTo($(this).find(".view_options_cont"));
        });
      });
      
      //-============================================================
      //-===============================comp__#009__select
      //-============================================================
    </script>
    <script type="text/javascript">
      $(function () {
        $(".select2").select2();
      });
      
      
    </script>


  </body>
</html>
