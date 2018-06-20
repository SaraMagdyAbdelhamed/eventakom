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
      <div class="add-mode">Edit mode</div>
      <div class="row">
        <div class="col-xs-12">
          <div class="text-xs-center">         
            <div class="text-wraper">
              <h4 class="cover-inside-title">Events</h4><i class="fa fa-chevron-circle-right"></i>
              <h4 class="cover-inside-title sub-lvl-2">Edit a backend event</h4>
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

      <form id="horizontal-pill-steps" action="{{ route('event_backend.update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $event->id }}">

        <h3>Info in En</h3>
        <fieldset>
          <div class="row">

            {{-- Event name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">Event name</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required 
                  id="Event_name" name="english_event_name" value="{{ $event->name ? : '' }}">
                @if ($errors->has('event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">Description</label>
                <textarea class="master_input" id="description" placeholder="Description" Required 
                  name="english_description">{{ $event->description ? : '' }}</textarea>
                @if ($errors->has('english_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Google Maps API --}}
            <div class="col-xs-12">
              <div class="mapouter">
                <div id="map" style="width: 100%; height: 100%; position: absolute;"></div>
                <input type="hidden" name="lat" id="lat" value="{{ $event->latitude ? : '' }}">
                <input type="hidden" name="lng" id="lng" value="{{ $event->longtuide ? : '' }}">
              </div>
            </div>


            {{-- English Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">Venue</label>
                <input class="master_input" type="text" placeholder="ex:CFC" Required 
                  id="venue" name="english_venu" value="{{ $event->venue ? : '' }}">
                @if ($errors->has('english_venu'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_venu') }}</span>
                @endif
              </div>
            </div>


            {{-- English Hashtags --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory">Hashtags</label>
                @if (isset($event->hashtags) && !empty($event->hashtags))
                    <?php $hashtags = ""; ?>
                    @foreach ($event->hashtags as $hash)
                        <?php $hashtags .= $hash->name.','; ?>
                    @endforeach
                @endif
                <input type="text" value="{{ $event->hashtags ? $hashtags : 'KSA,Sports' }}" data-role="tagsinput" name="english_hashtags">
              </div>
              <div class="clearfix"></div>
            </div>


            {{-- Allowed Genders --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory" for="gender">gender</label>
                <select class="master_input select2" id="gender" style="width:100%;" name="gender">
                  <option value="" disabled selected>-- Please select a gender --</option>
                  @if ( isset($genders) && !empty($genders) )
                      @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}" {{ $gender->id == $event->gender_id ? 'selected' : '' }}>{{ $gender->name }}</option>
                      @endforeach
                  @endif
                </select>

              </div>
            </div>

            {{-- Allowed Age ranges --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory" for="age">Allowed Age Range</label>
                <select class="master_input select2" id="age" style="width:100%;" name="age_range">
                  <option value="" disabled selected>-- Please Select Age Range</option>
                  @if ( isset($age_range) && !empty($age_range) )
                      @foreach ($age_range as $range)
                          <option value="{{ $range->id }}" {{ $range->id == $event->age_range_id ? 'selected' : '' }}>{{ $range->name }}</option>
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
                <label class="master_label" for="start_date">start date</label>
                <div class="bootstrap-timepicker">
                  <input class="datepicker master_input" type="text" placeholder="start date" Required 
                    id="start_date" name="start_date" value="{{ $event->start_datetime ? $event->start_datetime->format('d/m/Y') : '' }}">
                </div>
                @if ($errors->has('start_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_date') }}</span>
                @endif
              </div>
            </div>


            {{-- Start time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="start_time">start date time</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time" name="start_time" value="{{ $event->start_datetime ? $event->start_datetime->format('H:i') : '' }}">
                </div>
                @if ($errors->has('start_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_time') }}</span>
                @endif
              </div>
            </div>


            {{-- End date --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_date">end date</label>
                <div class="bootstrap-timepicker">
                  <input class="datepicker master_input" type="text" placeholder="end date" Required id="end_date" name="end_date" value="{{ $event->end_datetime ? $event->end_datetime->format('d/m/Y') : '' }}">
                </div>
                @if ($errors->has('end_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_date') }}</span>
                @endif
              </div>
            </div>


            {{-- End time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_time">end date time</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time" name="end_time" value="{{ $event->end_datetime ? $event->end_datetime->format('H:i') : '' }}">
                </div>
                @if ($errors->has('end_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_time') }}</span>
                @endif
              </div>
            </div>


            {{-- Categories --}}
            <div class="col-sm-6 col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory" for="category">category</label>
                <select class="master_input select2" id="category" multiple="multiple" data-placeholder="placeholder" style="width:100%;" name="categories[]">

                  @if ( isset($categories) && !empty($categories) )
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ isset( $event->categories[$loop->index] )  ? 'selected' : ''  }} >{{ $category->name }}</option>
                      @endforeach
                  @endif
                  
                </select>
                @if ($errors->has('categories'))
                  <span class="master_message color--fadegreen">{{ $errors->first('categories') }}</span>
                @endif
              </div>
            </div>

            {{-- Suggest as big Event --}}
            <div class="col-sm-3 col-xs-6">
              <label class="container">Suggest as big event
                <input type="checkbox" name="is_big_event" value="1" {{ $event->suggest_big_event ? 'checked' : '' }} />
                <span class="checkmark"></span>
              </label>
            </div>
  
  
            {{-- Is Event Active or Not --}}
            <div class="col-sm-3 col-xs-6">
              <label class="container">Is your event active
                <input type="checkbox" name="is_active" value="1" {{ $event->is_active ? 'checked' : '' }} />
                <span class="checkmark"></span>
              </label>
            </div>

          </div>
        </fieldset>

        <h3>Info in Ar</h3>
        <fieldset>
          <div class="row">

            {{-- Arabic Event Name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">اسم الحدث</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required id="Event_name" name="arabic_event_name" value="{{ \Helper::localization('events', 'name', $event->id, 2) }}">
                @if ($errors->has('arabic_event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">وصف الحدث</label>
                <textarea class="master_input" id="description" placeholder="Description" Required name="arabic_description">{{ \Helper::localization('events', 'description', $event->id, 2) }}</textarea>
                @if ($errors->has('arabic_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">مكان الحدث</label>
                <input class="master_input" type="text" placeholder="ex:CFC" Required id="venue" name="arabic_venu" value="{{ \Helper::localization('events', 'venue', $event->id, 2) }}">
                @if ($errors->has('arabic_venu'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_venu') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Hashtags --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory">الكلمات البحثية</label>
                @if ( count(\Helper::get_hashtags($event->id, 2)) > 0 )
                    <?php $hashtagsAr = ""; ?>
                    @foreach (\Helper::get_hashtags($event->id, 2) as $hash)
                        <?php $hashtagsAr .= $hash->value.','; ?>
                    @endforeach
                @endif
                
                <input type="text" data-role="tagsinput" name="arabic_hashtags" value="{{ \Helper::get_hashtags($event->id, 2) ? $hashtagsAr : '' }}">
              </div>
              @if ($errors->has('arabic_hashtags'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_hashtags') }}</span>
                @endif
              <div class="clearfix"></div>
            </div>
          </div>
        </fieldset>

        <h3>Tickets</h3>
        <fieldset>

          {{-- Is Event for Free or Paid --}}
          <div class="row">
            <div class="col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory">Is it free or paid ?</label>
              <input class="icon" type="radio" name="is_paid" id="radbtn_2_free" checked="{{ $event->is_paid ? false : true }}" value="0">
                <label for="radbtn_2_free">free</label>
                <input class="icon" type="radio" name="is_paid" checked="{{ $event->is_paid ? true : false }}" value="1" id="event_is_paid">
                <label for="radbtn_3_paid">paid</label>
              </div>
            </div>
          </div>
          <div class="paid-details">

            {{-- Ticket Price --}}
            <div class="row">
              <div class="col-xs-8">
                <div class="master_field">
                  <label class="master_label" for="Price">Price</label>
                  <input class="master_input" type="number" placeholder="50" min="0" id="Price" name="price" value="{{ $ticket->price ? : 0 }}">
                  @if ($errors->has('price'))
                    <span class="master_message color--fadegreen">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              </div>


              {{-- Currency Symbol --}}
              <div class="col-xs-4">
                <div class="master_field">
                  <label class="master_label mandatory" for="Currency">Currency</label>
                  <select class="master_input" id="Currency" name="currency">
                    <option value="" disabled selected>-- Please Select a Currency Symbol --</option>
                    @if ( isset($currencies) && !empty($currencies) )
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}" {{ $currency->id == $ticket->currency_id ? 'selected' : '' }}>{{ $currency->symbol }}</option>
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
                  <label class="master_label" for="Available_tickets">Available tickets</label>
                  <input class="master_input" type="number" placeholder="5" min="0" Required 
                    id="Available_tickets" name="number_of_tickets" value="{{ $ticket->available_tickets ? : 0 }}">
                  @if ($errors->has('number_of_tickets'))
                  <span class="master_message color--fadegreen">{{ $errors->first('number_of_tickets') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
        </fieldset>

        <h3>Contact Info</h3>
        <fieldset>
          <div class="row">

            {{-- Website URL --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Website">Website</label>
                <input class="master_input" type="url" placeholder="ex:www.domain.com" id="Website" 
                    name="website" value="{{ $event->website ? : '' }}">
                @if ($errors->has('website'))
                  <span class="master_message color--fadegreen">{{ $errors->first('website') }}</span>
                @endif
              </div>
            </div>


            {{-- Email --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="e_email">email</label>
                <input class="master_input" type="email" placeholder="email" Required id="e_email" 
                    name="email" value="{{ $event->email ? : '' }}">
                @if ($errors->has('email'))
                  <span class="master_message color--fadegreen">{{ $errors->first('email') }}</span>
                @endif
              </div>
            </div>


            {{-- Code Number --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Code_numbe">Code number</label>
                <input class="master_input" type="number" placeholder="ex: 2012545" Required id="Code_numbe" 
                    name="code_number" value="{{ $event->code ? : '' }}">
                @if ($errors->has('code_number'))
                  <span class="master_message color--fadegreen">{{ $errors->first('code_number') }}</span>
                @endif
              </div>
            </div>


            {{-- Mobile Number --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Mobile_number">mobile number</label>
                <input class="master_input" type="number" placeholder="0123456789" Required id="Mobile_number" 
                    name="mobile_number" value="{{ $event->mobile ? : '' }}">
                @if ($errors->has('mobile_number'))
                  <span class="master_message color--fadegreen">{{ $errors->first('mobile_number') }}</span>
                @endif
              </div>
            </div>
          </div>
        </fieldset>

        <h3>Media</h3>
        <fieldset>
          
          <div class="row">

            {{-- 1st Youtube vedio in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en">Add YouTube video (1) Link in Arabic</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en" 
                    name="youtube_ar_1" value="{{ $event->media[2]->link }}">
                @if ($errors->has('youtube_ar_1'))
                  <span class="master_message inherit">{{ $errors->first('youtube_ar_1') }}</span>
                @endif
              </div>
            </div>

            {{-- 1st Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar">Add YouTube video (1) Link in English</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar" 
                    name="youtube_en_1" value="{{  $event->media[0]->link }}">
                @if ($errors->has('youtube_en_1'))
                  <span class="master_message inherit">{{ $errors->first('youtube_en_1') }}</span>
                @endif
              </div>
            </div>

            {{-- 2nd Youtube video in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en">Add YouTube video (2) Link in Arabic</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en" 
                    name="youtube_ar_2" value="{{  $event->media[3]->link }}">
                @if ($errors->has('youtube_ar_2'))
                  <span class="master_message inherit">{{ $errors->first('youtube_ar_2') }}</span>
                @endif
              </div>
            </div>

            {{-- 2nd Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar">Add YouTube video (2) Link in English</label>
                <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar" 
                    name="youtube_en_2" value="{{  $event->media[1]->link }}">
                @if ($errors->has('youtube_en_2'))
                  <span class="master_message inherit">{{ $errors->first('youtube_en_2') }}</span>
                @endif
              </div>
            </div>
            <div class="col-xs-12">
              <hr>
            </div>
              
            {{-- Arabic images --}}
            <input type="file" name="arabic_images[]" multiple>

            {{-- English images --}}
            <input type="file" name="english_images[]" multiple>

          </div>

          <button type="submit" id="submitButton" hidden>Submit</button>
        </fieldset>
      </form>


    </div>
  </div><br>
</div>


<script type="text/javascript">
$(document).ready(function() {
  $(function () {
    $(".select2").select2();
  });

  $("#finish").click(function(){
    var form = $("#horizontal-pill-steps").serializeArray();
    var form_data = {};
    console.log(form);
    $.each(form,function(index,element){
      form_data[element.name] = element.value;
    })
    if(form_data.active_event == undefined && form_data.big_event == undefined){
      //big_event & active event =false (API)
      console.log("2 undefined")
    }
    else if(form_data.active_event == undefined){
      // active_event = false (API)
      console.log("active undefined")
    }
    else if(form_data.big_event == undefined){
      //big_event = false (API)
      console.log("big undefined")
    }
    else{
      // 2= true
      console.log("2 ~undefined")
    }
  });

  var form = $("#horizontal-pill-steps").show();
  form.steps({
    headerTag: "h3",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft"
    });
  

  $(function() {
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
  });
  
  

  $(function () {
    $('.datepicker').datepicker({autoclose: true});
    $(".timepicker").timepicker({showInputs: false});
  });

  (function(){
    var options = {};
    $('.js-uploader__box').uploader(options);
  }());
  

  $(function () {
    $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
  });
  
  

  // $('.paid-details').fadeOut();
  
  $('label[for="radbtn_3_paid"]').on('click' , function(){
    $('.paid-details').fadeIn(100);
  });
  
  $('label[for="radbtn_2_free"]').on('click' , function(){
    $('.paid-details').fadeOut();
  });
  
});

</script>

<script>
    @if( $event->is_paid == 1 )
      $('.paid-details').fadeIn(100);
    @endif
</script>

<script>
  $(document).ready(function() {
    // Prevent Enter key from submitting form
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
</script>

<script>
  
  $(document).ready(function() {
    // Click on finish button triggers a hidden submit button
    $("#finish1").click(function(){
      $("#submitButton").trigger('click');
    });
  });
</script>

@endsection