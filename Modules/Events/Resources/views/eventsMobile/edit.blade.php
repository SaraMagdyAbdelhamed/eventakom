@extends('layouts.app')

@section('content')

<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #submit {
    color: white;
    background-color: #281160;
    border: 0px;
    padding: 12px 36px;
  }
</style>


<div class="row">
  <div class="col-xs-12">
    <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
      <div class="add-mode">Editing mode</div>
      <div class="row">
        <div class="col-xs-12">
          <div class="text-xs-center">         
            <div class="text-wraper">
              <h4 class="cover-inside-title">@lang('keywords.events')</h4><i class="fa fa-chevron-circle-right"></i>
              <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.addfromMobile')</h4>
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

      <form id="horizontal-pill-steps" action="{{ route('event_mobile.update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <h3>@lang('keywords.Info in En')</h3>
        <fieldset>
          <div class="row">

            {{-- Event name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">@lang('keywords.eventName')</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3"  id="Event_name" name="english_event_name" value="{{$event->name}}" >
                @if ($errors->has('event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">@lang('keywords.eventDescription')</label>
                <textarea class="master_input" id="description" placeholder="Description"  name="english_description">{{$event->description}}</textarea>
                @if ($errors->has('english_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Google Maps API --}}
            <div class="col-xs-12">
              <div class="mapouter">
                <div id="map" style="width: 100%; height: 100%; position: absolute;"></div>
                <input type="hidden" name="event_id" value="{{$event->id}}">
                <input type="hidden" name="lat" id="lat" >
                <input type="hidden" name="lng" id="lng" >
              </div>
            </div>


            {{-- English Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">@lang('keywords.venue')</label>
                <input class="master_input" type="text" placeholder="ex:CFC"  id="venue" name="english_venu" value="{{$event->venue}}" >
                @if ($errors->has('english_venu'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_venu') }}</span>
                @endif
              </div>
            </div>


            {{-- English Hashtags --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory">@lang('keywords.Hashtags')</label>
                <input type="text" value="@foreach($event->hashtags as $value) {{$value->name}} , @endforeach" data-role="tagsinput" name="english_hashtags" >
              </div>
              <div class="clearfix"></div>
            </div>


            {{-- Allowed Genders --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory" for="gender">@lang('keywords.Gender')</label>
                <select class="master_input select2" id="gender" style="width:100%;" name="gender">
                  <option value="" disabled selected>-- @lang('keywords.Please select a gender') --</option>
                  @if ( isset($genders) && !empty($genders) )
                      @foreach ($genders as $gender)
                          <option value="{{ $gender->id }}" @if($gender->id == $event->gender_id) selected @endif>{{ $gender->name }}</option>
                      @endforeach
                  @endif
                </select>

              </div>
            </div>

            {{-- Allowed Age ranges --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory" for="age">@lang('keywords.Allowed Age Range')</label>
                <select class="master_input select2" id="age" style="width:100%;" name="age_range">
                  <option value="" disabled selected>-- @lang('keywords.Please Select Age Range')</option>
                  @if ( isset($age_range) && !empty($age_range) )
                      @foreach ($age_range as $range)
                          <option value="{{ $range->id }}" @if($range->id == $event->age_range_id) selected @endif>{{ $range->name }}</option>
                      @endforeach
                  @endif
                </select>
                @if ($errors->has('age_range'))
                  <span class="master_message color--fadegreen">{{ $errors->first('age_range') }}</span>
                @endif
              </div>
            </div>


            {{-- Start date --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="start_date">@lang('keywords.start date')</label>
                <div class="bootstrap-timepicker">
                  <input class="datepicker master_input" type="text" placeholder="start date"  id="start_date" name="start_date" value="<?=date('Y-m-d', strtotime($event->start_datetime))?>{{ old('start_date') }}">
                </div>
                @if ($errors->has('start_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_date') }}</span>
                @endif
              </div>
            </div>


            {{-- Start time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="start time"  id="start_time" name="start_time" value="<?=date('h:i A', strtotime($event->start_datetime))?>{{ old('start_time') }}">
                </div>
                @if ($errors->has('start_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_time') }}</span>
                @endif
              </div>
            </div>


            {{-- End date --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_date">@lang('keywords.end date')</label>
                <div class="bootstrap-timepicker">
                  <input class="datepicker master_input" type="text" placeholder="end date"  id="end_date" name="end_date" value="<?=date('Y-m-d', strtotime($event->end_datetime))?>{{ old('end_date') }}">
                </div>
                @if ($errors->has('end_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_date') }}</span>
                @endif
              </div>
            </div>


            {{-- End time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="end time"  id="end_time" name="end_time" value="<?=date('h:i A', strtotime($event->start_datetime))?>{{ old('end_date') }}">
                </div>
                @if ($errors->has('end_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_time') }}</span>
                @endif
              </div>
            </div>
         

            {{-- Categories --}}
            <div class="col-sm-6 col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory" for="category">@lang('keywords.category')</label>
                <select class="master_input select2" id="category" multiple="multiple" data-placeholder="placeholder" style="width:100%;" value="hala" name="categories[]">
                  @if ( isset($categories) && !empty($categories) )
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" @foreach($event_categories as $ec) 
                           <?php $selected = ($category->id == $ec->interest_id)? 'selected' : ''; echo $selected;?> @endforeach>{{ $category->name }}</option>
                      @endforeach
                  @endif
                </select>
                @if ($errors->has('categories'))
                  <span class="master_message color--fadegreen">{{ $errors->first('categories') }}</span>
                @endif
              </div>
            </div>
           @if(\App::isLocale('en')) 
            {{-- Suggest as big Event --}}
            <div class="col-sm-3 col-xs-6">
              <div class="master_field">
                <label class="master_label" for="big_event">@lang('keywords.Suggest as big event')</label>
                <input class="make-switch" type="checkbox" @if($bigEventCount > 0) checked @endif data-on-text="@lang('keywords.yes')" data-off-text="@lang('keywords.no')" name="is_big_event" value="1">
              </div>
            </div>


            {{-- Is Event Active or Not --}}
            <div class="col-sm-3 col-xs-6">
              <div class="master_field">
                <label class="master_label" for="active_event">@lang('keywords.is your event active or in active')</label>
                <input class="make-switch" type="checkbox" @if($event->is_active == 1) checked @endif data-on-text="@lang('keywords.Active')" data-off-text="@lang('keywords.Inactive')" name="is_active" value="1">
              </div>
            </div>
          @else
           <div class="col-sm-3 col-xs-6">
              <div class="master_field" style="display:flex;">
                <input type="checkbox"  @if($bigEventCount > 0) checked @endif data-on-text="@lang('keywords.yes')" data-off-text="@lang('keywords.no')" name="is_big_event" value="1" data-on-text="yes" data-off-text="no" name="big_event">
                <label class="master_label" for="big_event" style="padding: 2%;">@lang('keywords.Suggest as big event')</label>
                 </div>
                 </div>
                 <div class="col-sm-3 col-xs-6">
                 <div class="master_field" style="display:flex;">
                <input type="checkbox"  @if($event->is_active == 1) checked @endif data-on-text="@lang('keywords.Active')" data-off-text="@lang('keywords.Inactive')" name="is_active" value="1" data-on-text="yes" data-off-text="no" name="active_event">
                <label class="master_label" for="active_event" style="padding: 2%;">@lang('keywords.is your event active or in active')</label>
                </div>
              </div>
          @endif

          </div>
        </fieldset>

        <h3>@lang('keywords.Info in Ar')</h3>
        <fieldset>
          <div class="row">

            {{-- Arabic Event Name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">@lang('keywords.eventName')</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3"  id="Event_name" name="arabic_event_name" value="{{$event->arabic('name',$event->id)}}" >
                @if ($errors->has('arabic_event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">@lang('keywords.eventDescription')</label>
                <textarea class="master_input" id="description" placeholder="Description"  name="arabic_description">{{$event->arabic('description',$event->id)}}{{ old('arabic_description') }}</textarea>
                @if ($errors->has('arabic_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">@lang('keywords.venue')</label>
                <input class="master_input" type="text" placeholder="ex:CFC"  id="venue" name="arabic_venu" value="{{$event->arabic('venue',$event->id)}}"  >
                @if ($errors->has('arabic_venu'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_venu') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Hashtags --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory">@lang('keywords.Hashtags')</label>
                <input type="text" data-role="tagsinput" name="arabic_hashtags" value="@foreach($arabic_hashtags as $arhash) {{$arhash->value }},   @endforeach" >
              </div>
              @if ($errors->has('arabic_hashtags'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_hashtags') }}</span>
                @endif
              <div class="clearfix"></div>
            </div>
          </div>
        </fieldset>

        <h3>@lang('keywords.tickets')</h3>
        <fieldset>

          {{-- Is Event for Free or Paid --}}
          <div class="row">
            <div class="col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory">@lang('keywords.Is it free or paid ?')</label>
                <input class="icon" type="radio" name="is_paid" id="radbtn_2_free" @if($event->is_paid!=1) checked="true" @endif value="0">
                <label for="radbtn_2_free">@lang('keywords.free')</label>
                <input class="icon" type="radio" name="is_paid" @if($event->is_paid==1) checked="true" @endif  id="radbtn_3_paid" value="1">
                <label for="radbtn_3_paid">@lang('keywords.paid')</label>
              </div>
            </div> 
          </div> 
        
        <!--   <div class="row">
                          <div class="col-xs-12">
                            <div class="master_field">
                              <label class="master_label mandatory">@lang('keywords.Is it free or paid ?')</label>
                              <input class="master_input" type="text" name="free">
                              <input class="icon" type="radio" name="radbtn_2_free" id="radbtn_2_free" @if($event->is_paid!=1) checked="true" @endif value="0">
                              <label for="radbtn_2_free">@lang('keywords.free')</label>
                              <input class="icon" type="radio" name="radbtn_3_paid" id="radbtn_3_paid" >
                              <label for="radbtn_3_paid">@lang('keywords.paid')</label>
                            </div>
                          </div>
                        </div> -->
          <div class="paid-details">

            {{-- Ticket Price --}}
            <div class="row">
              <div class="col-xs-8">
                <div class="master_field">
                  <label class="master_label" for="Price">@lang('keywords.Price')</label>
                  <input class="master_input" type="number" placeholder="50" min="0" id="Price" name="price"  @if ( isset($event_tickets->price) && !empty($event_tickets->price) ) value="{{$event_tickets->price}}" @endif  >
                  @if ($errors->has('price'))
                    <span class="master_message color--fadegreen">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              </div>


              {{-- Currency Symbol --}}
              <div class="col-xs-4">
                <div class="master_field">
                  <label class="master_label mandatory" for="Currency">@lang('keywords.Currency')</label>
                  <select class="master_input" id="Currency" name="currency">
                    <option value="" disabled selected>-- @lang('keywords.Please Select a Currency Symbol') --</option>
                    @if ( isset($currencies) && !empty($currencies) )
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}" @if(isset($event_tickets->price) && !empty($event_tickets->price) && $event_tickets->currency_id == $currency->id) selected @endif>{{ $currency->symbol }}</option>
                        @endforeach
                    @endif
                  </select>
                  @if ($errors->has('currency'))
                    <span class="master_message color--fadegreen">{{ $errors->first('currency') }}</span>
                  @endif
                </div>
              </div>


              {{-- Number of Tickets --}}
              <div class="col-xs-12">
                <div class="master_field">
                  <label class="master_label" for="Available_tickets">@lang('keywords.Available tickets')</label>
                  <input class="master_input" type="number" placeholder="5" min="0"  id="Available_tickets" name="number_of_tickets"  @if ( isset($event_tickets->available_tickets) && !empty($event_tickets->price) )  value="{{$event_tickets->available_tickets}}" @endif >
                  @if ($errors->has('number_of_tickets'))
                  <span class="master_message color--fadegreen">{{ $errors->first('number_of_tickets') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
        </fieldset>


        <h3>@lang('keywords.Contact Info')</h3>
        <fieldset>
          <div class="row">

            {{-- Website URL --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Website">@lang('keywords.Website')</label>
                <input class="master_input" type="url" placeholder="ex:www.domain.com" id="Website" name="website" value="{{$event->website}}" >
                @if ($errors->has('website'))
                  <span class="master_message color--fadegreen">{{ $errors->first('website') }}</span>
                @endif
              </div>
            </div>


            {{-- Email --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="e_email">@lang('keywords.email')</label>
                <input class="master_input" type="email" placeholder="email"  id="e_email" name="email" value="{{$event->email}}" >
                @if ($errors->has('email'))
                  <span class="master_message color--fadegreen">{{ $errors->first('email') }}</span>
                @endif
              </div>
            </div>


            {{-- Code Number --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Code_numbe">@lang('keywords.Code number')</label>
                <input class="master_input" type="number" placeholder="ex: 2012545"  id="Code_numbe" name="code_number" value="{{$event->code}}" >
                @if ($errors->has('code_number'))
                  <span class="master_message color--fadegreen">{{ $errors->first('code_number') }}</span>
                @endif
              </div>
            </div>


            {{-- Mobile Number --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Mobile_number">@lang('keywords.mobile number')</label>
                <input class="master_input" type="number" placeholder="0123456789"  id="Mobile_number" name="mobile_number" value="{{$event->mobile}}" >
                @if ($errors->has('mobile_number'))
                  <span class="master_message color--fadegreen">{{ $errors->first('mobile_number') }}</span>
                @endif
              </div>
            </div>
          </div>
        </fieldset>


        <h3>@lang('keywords.Media')</h3>
        <fieldset>
          
          <div class="row">

            {{-- 1st Youtube vedio in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en">@lang('keywords.YouTube-ar-1')</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en" name="youtube_ar_1" @if ( isset($event_media[2]['link']) && !empty($event_media[2]['link']) )   value="{{$event_media[2]['link']}}" @endif >
                @if ($errors->has('youtube_ar_1'))
                  <span class="master_message inherit">{{ $errors->first('youtube_ar_1') }}</span>
                @endif
              </div>
            </div>

            {{-- 1st Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar">@lang('keywords.YouTube-en-1')</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar" name="youtube_en_1" @if( isset($event_media[0]['link']) && !empty($event_media[0]['link']) )  value="{{$event_media[0]['link']}}" @endif  >
                @if ($errors->has('youtube_en_1'))
                  <span class="master_message inherit">{{ $errors->first('youtube_en_1') }}</span>
                @endif
              </div>
            </div>

            {{-- 2nd Youtube video in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en">@lang('keywords.YouTube-ar-2')</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en" name="youtube_ar_2" @if( isset($event_media[3]['link']) && !empty($event_media[3]['link']) ) value="{{$event_media[3]['link']}}" @endif >
                @if ($errors->has('youtube_ar_2'))
                  <span class="master_message inherit">{{ $errors->first('youtube_ar_2') }}</span>
                @endif
              </div>
            </div>

            {{-- 2nd Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar">@lang('keywords.YouTube-en-2')</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar" name="youtube_en_2" @if( isset($event_media[1]['link']) && !empty($event_media[1]['link']) ) value="{{$event_media[1]['link']}}" @endif >
                @if ($errors->has('youtube_en_2'))
                  <span class="master_message inherit">{{ $errors->first('youtube_en_2') }}</span>
                @endif
              </div>
            </div>
            <div class="col-xs-12">
              <hr>
            </div>
              
            {{-- Arabic images --}}
             <input type="file" name="test" accept="image/*">
             <div class="col-sm-6 col-xs-12 text-center">
                            <h4 class="text-center">upload event images (in Arabic ) (max no. 5 images)</h4>
                            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                              <div class="row">
                                <section class="l-main" role="main">
                                  <!--  -->

                                  <!--  -->
                                  <div class="uploader__box js-uploader__box l-center-box">
                                    <div action="your/nonjs/fallback/" method="POST">
                                      <div class="uploader__contents">
                                        <label class="button button--secondary" for="fileinput">Select Files</label>
                                        <input class="uploader__file-input" id="fileinput" type="file" multiple value="Drag-Drop Files" name="arabic_images[]">
                                        <label class="button button--secondary" for="fileinput1">Select Files</label>
                                        <input class="uploader__file-input1" id="fileinput" type="file" multiple value="Drag-Drop Files">
                                      </div>
                                      <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                                    </div>
                                  </div>
                                </section>
                              </div>
                            </div>
                          </div>

            {{-- English images --}}
                    <div class="col-sm-6 col-xs-12 text-center">
                            <h4 class="text-center">upload event images (in English ) (max no. 5 images)</h4>
                            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                              <div class="row">
                                <section class="l-main" role="main">
                                  <div class="uploader__box js-uploader__box l-center-box">
                                    <div action="your/nonjs/fallback/" method="POST">
                                      <div class="uploader__contents">
                                        <label class="button button--secondary" for="fileinput">Select Files</label>
                                        <input class="uploader__file-input" id="fileinput" type="file" multiple value="Drag-Drop Files" name="english_images[]">
                                        <label class="button button--secondary" for="fileinput1">Select Files</label>
                                        <input class="uploader__file-input1" id="fileinput" type="file" multiple value="Drag-Drop Files">
                                      </div>
                                      <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                                    </div>
                                  </div>
                                </section>
                              </div>
                            </div>
                          </div>

          </div>

          <button type="submit" id="submit">@lang('keywords.submit')</button>
        </fieldset>
      </form>


    </div>
  </div><br>
</div>



<script type="text/javascript">

$(document).ready(function(){

  $(function () {
  $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
  });

  $(".select2").select2();

  var form = $("#horizontal-pill-steps").show();
  form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
  });
  

  $('input, select').on('change', function(event) {
    var $element = $(event.target),
      $container = $element.closest('.example');

    if (!$element.data('tagsinput'))
      return;

    var val = $element.val();
    if (val === null)
      val = "null";
    $('code', $('pre.val', $container)).html( ($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\"") );
    $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
  }).trigger('change');
  

  $('.datepicker').datepicker({autoclose: true});
  $(".timepicker").timepicker({showInputs: false});

  var options = {};
  $('.js-uploader__box').uploader(options);


  $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();


  //$('.paid-details').fadeOut();
  
  $('label[for="radbtn_3_paid"]').on('click' , function(){
    $('.paid-details').fadeIn(100);
  });
  
  $('label[for="radbtn_2_free"]').on('click' , function(){
    $('.paid-details').fadeOut();
  });

   $("#finish1").attr("type", "submit");
    $("#finish1").val("Submit");

});

</script>


@endsection