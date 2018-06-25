@extends('layouts.app')

@section('content')

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

<div class="row">
    <div class="col-xs-12">
        <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
            <div class="col-xs-12">
            <div class="text-xs-center">         
                <div class="text-wraper">
                    <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.famousAtt')</h4>
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
        <form id="horizontal-pill-steps">


            <h3>@lang('keywords.infoEn')</h3>
            <fieldset>
            <div class="row">

                {{-- Place Name --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Place_name">@lang('keywords.placeName')</label>
                    <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name" name="place_name" value="{{ old('place_name') }}">
                    @if ($errors->has('place_name'))
                        <span class="master_message color--fadegreen">{{ $errors->first('place_name') }}</span>
                    @endif
                </div>
                </div>

                {{-- Place Category --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label mandatory" for="Place_Category">@lang('keywords.placeCategories')</label>
                    <select class="master_input select2" name="place_categories[]" required 
                            id="Place_Category" multiple="multiple" data-placeholder="choose an option.." style="width:100%;" >
                        @if ( isset($categories) && !empty($categories) )
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                </div>

                {{-- Google Maps API --}}
                <div class="col-xs-12">
                    <div class="mapouter">
                        <div id="map" style="width: 100%; height: 100%; position: absolute;"></div>
                        <input type="hidden" name="lat" id="lat" value="1.234">
                        <input type="hidden" name="lng" id="lng" value="2.345">
                    </div>
                </div>

                {{-- Address --}}
                <div class="col-xs-6">
                <div class="master_field" >
                    <label class="master_label" for="Address_name">@lang('keywords.address')</label>
                    <input class="master_input" type="text" placeholder="ex:52 Ahmed Salh st .city stars" readonly Required id="address" name="address" value="Cairo, Egypt">
                </div>
                </div>

                {{-- Phone Number --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Phone_number">@lang('keywords.Phone')</label>
                    <input class="master_input" type="number" placeholder="0020123456789" Required id="Phone_number" name="phone_number" value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                        <span class="master_message color--fadegreen">{{ $errors->first('phone_number') }}</span>
                    @endif
                </div>
                </div>

                {{-- Website --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Website">@lang('keywords.Website')</label>
                    <input class="master_input" type="url" placeholder="www.domain.com" Required id="Website" name="website" value="{{ old('website') }}">
                    @if ($errors->has('website'))
                        <span class="master_message color--fadegreen">{{ $errors->first('website') }}</span>
                    @endif
                </div>
                </div>

                <div class="col-xs-6">
                    <label class="container">@lang('keywords.isThisPlaceActive')
                        <input type="checkbox" name="is_active" value="1" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>

                <div class="col-sm-12 col-xs-12">
                <h5>@lang('keywords.openday')</h5>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                        <input type="checkbox" name="sat" value="1" id="Opening_days_1">
                    <label for="Opening_days_1">@lang('keywords.saturday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="sat_start" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="sat_end" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="sun" id="Opening_days_2">
                    <label for="Opening_days_2">@lang('keywords.sunday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="radio" id="Opening_days_3">
                    <label for="Opening_days_3">@lang('keywords.monday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="radio" id="Opening_days_4">
                    <label for="Opening_days_4">@lang('keywords.tuesday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="radio" id="Opening_days_5">
                    <label for="Opening_days_5">@lang('keywords.wednesday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="radio" id="Opening_days_6">
                    <label for="Opening_days_6">@lang('keywords.thursday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="radio" id="Opening_days_7">
                    <label for="Opening_days_7">@lang('keywords.friday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="Other_info">@lang('keywords.otherInfo')</label>
                    <textarea class="master_input" name="textarea" id="Other_info" placeholder="Other info" Required></textarea>
                </div>
                </div>
            </div>
            </fieldset>


            <h3>@lang('keywords.infoAr')</h3>
            <fieldset>
            <div class="row">
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Place_name">@lang('keywords.placeName')</label>
                    <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name"><span class="master_message color--fadegreen">validation message will be here</span>
                </div>
                </div>
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Address_name">@lang('keywords.placeAddress')</label>
                    <input class="master_input" type="text" placeholder="ex:52 Ahmed Salh st .city stars" Required id="Address_name"><span class="master_message color--fadegreen">validation message will be here</span>
                </div>
                </div>
                <div class="col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="Other_info_ar">@lang('keywords.otherInfo')</label>
                    <textarea class="master_input" name="textarea" id="Other_info_ar" placeholder="Other info" Required></textarea>
                </div>
                </div>
            </div>
            </fieldset>


            <h3>@lang('keywords.media')</h3>
            <fieldset>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="YouTube_video_en">add youtube video link in English</label>
                    <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en">
                </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="YouTube_video_ar">add youtube video link in Arabic</label>
                    <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar">
                </div>
                </div>
                <div class="col-sm-6 col-xs-12 text-center">
                <h4>Upload event images (max no. 5 images) in Arabic</h4>
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="row">
                    <section class="l-main" role="main">
                        <div class="uploader__box js-uploader__box l-center-box">
                        <form action="your/nonjs/fallback/" method="POST">
                            <div class="uploader__contents">
                            <label class="button button--secondary" for="fileinput">Select Files</label>
                            <input class="uploader__file-input" id="fileinput" type="file" multiple value="Select Files">
                            </div>
                            <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                        </form>
                        </div>
                    </section>
                    </div>
                </div>
                </div>
                <div class="col-sm-6 col-xs-12 text-center">
                <h4>Upload event images (max no. 5 images) in English</h4>
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="row">
                    <section class="l-main" role="main">
                        <div class="uploader__box js-uploader__box l-center-box">
                        <form action="your/nonjs/fallback/" method="POST">
                            <div class="uploader__contents">
                            <label class="button button--secondary" for="fileinput">Select Files</label>
                            <input class="uploader__file-input" id="fileinput" type="file" multiple value="Select Files">
                            </div>
                            <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                        </form>
                        </div>
                    </section>
                    </div>
                </div>
                </div>
            </div>
            </fieldset>

            
        </form>
        </div>
    </div><br>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $(function () {
            $(".select2").select2();
        });

        var form = $("#horizontal-pill-steps").show();
        form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        });

        $(function () {
            $('.datepicker').datepicker({autoclose: true});
            $(".timepicker").timepicker({showInputs: false});
        });
    });

    (function(){
      var options = {};
      $('.js-uploader__box').uploader(options);
    }());

     $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
    
</script>


@endsection