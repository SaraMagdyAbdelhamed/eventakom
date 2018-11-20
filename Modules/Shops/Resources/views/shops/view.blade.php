@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '{{ asset('img/covers/dummy2.jpg') }}' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover">
        <div class="row">
            <div class="col-xs-12">
            <div class="text-xs-center">         
                <div class="text-wraper">
                <h3 class="cover-inside-title  ">@lang('keywords.shop_and_dine')</h3>
                </div>
            </div>
            </div>
            <div class="cover--actions"><span></span>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="row">
            <div class="col-xs-12">
            <div class="tabs--wrapper">
                <div class="clearfix"></div>
                <ul class="tabs">
                <li id="media">@lang('keywords.media')</li>
                <li id="info">@lang('keywords.info')</li>
                </ul>
                <ul class="tab__content">
                <li class="tab__content_item active" id="media-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="row">
                        <div class="col-xs-12">
                        <h5 class="text-left bold-font">@lang('keywords.images')</h5>
                        </div>
                        <div class="col-xs-12">
                        <div class="slideperview" id="slider--3">
                            <div class="swiper-container">
                            <div class="swiper-wrapper">

                                {{-- Todo: render each image --}}
                                @if ( isset($shop->shop_media) && count($shop->shop_media) > 0 )
                                    
                                    @foreach ($shop->shop_media as $media)
                                        @if ( $media->type == 1 )
                                            <div class="swiper-slide">
                                                <img class="full-size img_slider" src="{{ asset( $media->link ) }}">
                                            </div>
                                        @endif
                                    @endforeach

                                @endif

                                @if ( count(\Helper::getLinks($shop->id, 2)) > 0 )
                                    @foreach (\Helper::getLinks($shop->id, 2) as $link)
                                        <div class="swiper-slide">
                                            <img class="full-size img_slider" src="{{ asset( $link->value ) }}">
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"> </div>
                            </div>
                        </div>
                        </div>

                        {{-- Todo: Youtube links --}}
                        <div class="col-xs-12">
                            <h5 class="text-left bold-font">@lang('keywords.videos')</h5>

                            @if ( isset($shop->shop_media) && count($shop->shop_media) > 0 )
                            @foreach ($shop->shop_media as $media)
                                @if ( $media->type == 2 )
                                    {{-- Youtube link #1 --}}
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                                            <iframe width="560" height="315" src="{{ url( \App::isLocal('en') ? $media->link ? : '' : \Helper::localization('shop_media', 'link', $shop->id, 2, '') ) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>

                                    {{-- Youtube link #2 --}}
                                    {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                                            <iframe width="100%" height="350" src="{{ \App::isLocal('en') ? $media->link[1] ? : '' : '' }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div> --}}
                                @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    </div>
                </li>
                <li class="tab__content_item" id="info-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="full-table">
                        <table class="verticaltable table-master">
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.placeName')</span></th>
                            <td><span class="cellcontent">{{ $shop->name ? : '' }}</span></td>
                        </tr>
                        {{-- <tr>
                            <th><span class="cellcontent">@lang('keywords.placeCategories')</span></th>
                            <td><span class="cellcontent">{{ $shop-> }}</span></td>
                        </tr> --}}
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.placePhone')</span></th>
                            <td><span class="cellcontent">{{ $shop->phone ? : '' }}</span></td>
                        </tr>
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.website')</span></th>
                            <td>
                                <span class="cellcontent">
                                    <a href="{{ $shop->website ? : '' }}">{{ $shop->website ? : '' }}</a>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.openday')</span></th>
                            <td>
                                <span class="cellcontent">
                                    @foreach (@$shop->days as $day)
                                        {{ $day->name }}
                                    @endforeach
                                </span>
                            </td>
                        </tr>
                        {{-- <tr>
                            <th><span class="cellcontent">@lang('keywords.Startdate/time')</span></th>
                            <td><span class="cellcontent">12:00PM</span></td>
                        </tr>
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.End date/time')</span></th>
                            <td><span class="cellcontent">12:00AM</span></td>
                        </tr> --}}
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.status')</span></th>
                            <td><i class ="fa icon-in-table-true {{ $shop->is_active ? 'fa-check' : 'fa-times' }}"></td>
                        </tr>
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.otherInfo')</span></th>
                            <td><span class="cellcontent">{{ $shop->info ? : '' }}</span></td>
                        </tr>
                        <tr>
                            <th><span class="cellcontent">@lang('keywords.address')</span></th>
                            <td><span class="cellcontent">{{ $shop->address ? : '' }}</span></td>
                        </tr>
                        </table>

                    </div><br>

                    </div>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
        var swiper = new Swiper('.slideperview .swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 4,
            paginationClickable: true,
            spaceBetween: 5,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            autoplay: 2500,
            keyboardControl: true,
            loop: true,
            autoplayDisableOnInteraction: false,
            mousewheelControl: false,
        });
    </script>
@endsection