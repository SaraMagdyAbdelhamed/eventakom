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
        
                <div class="buttons"><a class="pull-right btn bordered-btn" href="" target="_blank"><i class="fa fa-external-link"></i>@lang('keywords.website')</a>
                  <form action="{{ route('changeLang') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="url" value="{{ Request::url() }}">
                    <input type="hidden" name="locale" value="{{ Session::get('lang_var') != 'en' ? 'en' : 'ar' }}">
                    <button type="submit" class="nav-link English" style="background-color: inherit; border: 0px; color: white; ">{{ Session::get('lang_var') == 'en' ? 'العربية' : 'English' }}</button>
                    
                    {{--  <a class="pull-right btn bordered-btn" href="{{ route('event_view',['id' => $event->id]) }}">{{ App::isLocale('ar') ? 'English' : 'العربية' }}</a>  --}}
                  </form>
                  @if(!isset($subscribers))
                    <a class="pull-right btn bordered-btn" id="subscribe_btn" href="#subscribe"><i class="fa fa-edit"></i>@lang('keywords.subscribe')</a>
                  @endif</div>
                              {{--  <button type="submit" class="nav-link English" style="background-color: inherit; border: 0px; color: white; ">{{ App::isLocale('ar') ? 'English' : 'العربية' }}</button>  --}}
                              {{--  <a class="pull-right btn bordered-btn" href="{{ route('event_view_ar',['id' => $event->id]) }}">ar</a>  --}}
              </div>
            </div>
          </header>
          <div class="full-body">
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/home.js') }}"></script> --}}
    </body>
</html>
