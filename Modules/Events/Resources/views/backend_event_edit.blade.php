@extends('layouts.app')

@section('content')

<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
    height: 250px !important;
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
      <div class="row">
        <div class="col-xs-12">
          <div class="text-xs-center">
            <div class="text-wraper">
              <h4 class="cover-inside-title">@lang('keywords.events')</h4><i class="fa fa-chevron-circle-right"></i>
              <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.EditEvent')</h4>
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

        <h3>@lang('keywords.infoEn')</h3>
        <fieldset>
          <div class="row">

            {{-- Event name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">@lang('keywords.eventName')</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required
                  maxlength="100"  id="Event_name" name="english_event_name" value="{{ $event->name ? : '' }}">
                @if ($errors->has('event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">@lang('keywords.description')</label>
                <textarea class="master_input" id="description" placeholder="Description" Required
                  maxlength="250"  name="english_description">{{ $event->description ? : '' }}</textarea>
                @if ($errors->has('english_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Google Maps API --}}
            <div class="col-xs-12">
              <div class="mapouter">
                <div id="map" style= " background: none!important;height: 250px;width: 100%;"></div>
                <input type="hidden" name="lat" id="lat" value="{{ $event->latitude ? : ''}}">
                <input type="hidden" name="lng" id="lng" value="{{ $event->longtuide ? : '' }}">
              </div>
            </div>

            {{-- Address --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">@lang('keywords.address')</label>
                <input class="master_input" id="searchInput" type="text" placeholder="ex:CFC" maxlength="150" Required
                  id="location" name="address" value="{{ $event->address }}">
                @if ($errors->has('address'))
                  <span class="master_message color--fadegreen">{{ $errors->first('address') }}</span>
                @endif
              </div>
            </div>


            {{-- English Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">@lang('keywords.venue')</label>
                <input class="master_input" type="text" placeholder="ex:CFC" Required
                  maxlength="100"  id="venue" name="english_venu" value="{{ $event->venue ? : '' }}">
                @if ($errors->has('english_venu'))
                  <span class="master_message color--fadegreen">{{ $errors->first('english_venu') }}</span>
                @endif
              </div>
            </div>


            {{-- English Hashtags --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory">@lang('keywords.Hashtags')</label>
                @if (isset($event->hashtags) && !empty($event->hashtags))
                    <?php $hashtags = ""; ?>
                    @foreach ($event->hashtags as $hash)
                        <?php $hashtags .= $hash->name.','; ?>
                    @endforeach
                @endif
                <input type="text" value="{{ $event->hashtags ? $hashtags : '' }}" data-role="tagsinput" name="english_hashtags">
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
                        <option value="{{ $gender->id }}" {{ $gender->id == $event->gender_id ? 'selected' : '' }}>{{ $gender->name }}</option>
                      @endforeach
                  @endif
                </select>

              </div>
            </div>

            {{-- Allowed Age ranges --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label mandatory" for="age">@lang('keywords.Please select age range')</label>
                <select class="master_input select2" id="age" style="width:100%;" name="age_range">
                  <option value="" disabled selected>-- @lang('keywords.Please select age range') --</option>
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





            {{-- Start time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time" name="start_time" value="{{ $event->start_datetime ? $event->start_datetime->format('H:i') : '' }}">
                </div>
                @if ($errors->has('start_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_time') }}</span>
                @endif
              </div>
            </div>

          {{-- Start date --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="start_date">@lang('keywords.start date')</label>
                <div class="bootstrap-timepicker">
                  <input class=" master_input" type="text" placeholder="start date" Required
                    id="start_date" name="start_date" value="{{ $event->start_datetime ? $event->start_datetime->format('d/m/Y') : '' }}">
                </div>
                @if ($errors->has('start_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('start_date') }}</span>
                @endif
              </div>
            </div>




            {{-- End time --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                <div class="bootstrap-timepicker">
                  <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time" name="end_time" value="{{ $event->end_datetime ? $event->end_datetime->format('H:i') : '' }}">
                </div>
                @if ($errors->has('end_time'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_time') }}</span>
                @endif
              </div>
            </div>
            {{-- End date --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="end_date">@lang('keywords.end date')</label>
                <div class="bootstrap-timepicker">
                  <input class=" master_input" type="text" placeholder="end date" Required id="end_date" name="end_date" value="{{ $event->end_datetime ? $event->end_datetime->format('d/m/Y') : '' }}">
                </div>
                @if ($errors->has('end_date'))
                  <span class="master_message color--fadegreen">{{ $errors->first('end_date') }}</span>
                @endif
              </div>
            </div>

            {{-- Categories --}}
            <div class="col-sm-6 col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory" for="category">@lang('keywords.category')</label>
                <select class="master_input select2" id="category" multiple="multiple" data-placeholder="placeholder"
                  style="width:100%;" name="categories[]" required>

                  @if ( isset($categories) && !empty($categories) )
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ isset( $event->categories[$loop->index] )  ? 'selected' : ''  }} >{{ \App::isLocale('en') ? $category->name : \Helper::localization('interests', 'name', $category->id, 2, $category->name) }}</option>
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

        <h3>@lang('keywords.infoAr')</h3>
        <fieldset>
          <div class="row">

            {{-- Arabic Event Name --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Event_name">اسم الحدث</label>
                <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required id="Event_name" maxlength="100"
                  name="arabic_event_name" value="{{ \Helper::localization('events', 'name', $event->id, 2) }}">
                @if ($errors->has('arabic_event_name'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_event_name') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Description --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="description">وصف الحدث</label>
                <textarea class="master_input" id="description" placeholder="Description" Required maxlength="250"
                  name="arabic_description">{{ \Helper::localization('events', 'description', $event->id, 2) }}</textarea>
                @if ($errors->has('arabic_description'))
                  <span class="master_message color--fadegreen">{{ $errors->first('arabic_description') }}</span>
                @endif
              </div>
            </div>


            {{-- Arabic Venu --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="venue">مكان الحدث</label>
                <input class="master_input" type="text" placeholder="ex:CFC" Required id="venue" name="arabic_venu" maxlength="100"
                  value="{{ \Helper::localization('events', 'venue', $event->id, 2) }}">
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

                <input type="text" data-role="tagsinput" name="arabic_hashtags" value="{{ \Helper::get_hashtags($event->id, 2) ? (isset($hashtagsAr) ? $hashtagsAr : '') : '' }}">
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
              <input class="icon" type="radio" name="is_paid" {{ $event->is_paid ? '' : 'checked' }} value="0" id="free">
                <label for="radbtn_2_free">@lang('keywords.free')</label>
                <input class="icon" type="radio" name="is_paid" {{ $event->is_paid ? 'checked' : '' }} value="1" id="paid">
                <label for="radbtn_3_paid">@lang('keywords.paid')</label>
              </div>
            </div>
          </div>
          <div class="paid-details">

            {{-- Ticket Price --}}
            <div class="row">
              <div class="col-xs-8">
                <div class="master_field">
                  <label class="master_label" for="Price">@lang('keywords.Price')</label>
                  <input class="master_input" type="number" placeholder="50" min="0" id="Price" name="price" value="{{ isset($ticket->price) ? $ticket->price : 0 }}">
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
                            <option value="{{ $currency->id }}" {{ isset($ticket->currency_id) ? ($currency->id == $ticket->currency_id ? 'selected' : '') : '' }}>{{ $currency->symbol }}</option>
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
                  <input class="master_input" type="number" placeholder="5" min="0"
                    id="Available_tickets" name="number_of_tickets" value="{{ isset($ticket->available_tickets) ? $ticket->available_tickets : 0 }}">
                  @if ($errors->has('number_of_tickets'))
                  <span class="master_message color--fadegreen">{{ $errors->first('number_of_tickets') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
        </fieldset>

        <h3>@lang('keywords.contactInfo')</h3>
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

        <h3>@lang('keywords.media')</h3>
        <fieldset>

          <div class="row">

            {{-- 1st Youtube vedio in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar1">Edit YouTube video (1) Link in Arabic</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar1"
                    name="youtube_ar_1" value="{{ isset($youtube_links[0]) ? $youtube_links[0]->link : '' }}">
                  <span class="master_message inherit" id="yl_1"></span>
              </div>
            </div>

            {{-- 1st Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en1">Add YouTube video (1) Link in English</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en1"
                    name="youtube_en_1" value="{{ isset($youtube_links[1]) ? $youtube_links[1]->link : '' }}">
                  <span class="master_message inherit" id="yl_2"></span>
              </div>
            </div>

            {{-- 2nd Youtube video in Arabic --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar2">Add YouTube video (2) Link in Arabic</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar2"
                    name="youtube_ar_2" value="{{ isset($youtube_links[2]) ? $youtube_links[2]->link : '' }}">
                  <span class="master_message inherit" id="yl_3"></span>
              </div>
            </div>

            {{-- 2nd Youtube video in English --}}
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en2">Add YouTube video (2) Link in English</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en2"
                    name="youtube_en_2" value="{{ isset($youtube_links[3]) ? $youtube_links[3]->link : '' }}">
                  <span class="master_message inherit" id="yl_4"></span>
              </div>
            </div>
            <div class="col-xs-12">
              <hr>
            </div>

            {{-- Arabic images --}}
          <div class="col-sm-6 col-xs-12 text-center">

            <h4 class="text-center">upload event images (in Arabic ) (max no. 5 images)</h4>
            <h5 class="text-center">Each image should be 1MB maximum in size.</h5>
            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
              <div class="main-section">
                <div id="fileList"></div>
                <div class="form-group">
                  <input class="inputfile inputfile-1" id="file-1" type="file" name="arabic_images[]" data-multiple-caption="{count} files selected" multiple="" onchange="updateList('file-1','fileList','Ar')" accept=".jpg,.png,.jpeg">
                  <label for="file-1"><span>Choose a file</span></label>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="images_ar" id="images_ar">

          {{-- English images --}}
          <div class="col-sm-6 col-xs-12 text-center">

            <h4 class="text-center">upload event images (in English ) (max no. 5 images)</h4>
            <h5 class="text-center">Each image should be 1MB maximum in size.</h5>
            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
              <div class="main-section">
                <div id="fileList2"></div>
                <div class="form-group">
                  <input class="inputfile inputfile-1" id="file-2" type="file" name="english_images[]" data-multiple-caption="{count} files selected" multiple="" onchange="updateList('file-2','fileList2','en')" accept=".jpg,.png,.jpeg">
                  <label for="file-2"><span>Choose a file</span></label>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="images_en" id="images_en">

          </div>

          <button type="submit" id="submitButton" hidden>Submit</button>
        </fieldset>
      </form>


    </div>
  </div><br>
</div>

<!--***************************UI*******************************-->
<script type="text/javascript">

    var listAr = [];
    var listEn = [];
    var check = false;
    var img;
    var imgMaxSize = 1024;
    var error;
    var reader=new FileReader();
    function updateIndexList(){

    }
    function closebtn(index,value){

      if(value==1){
        listAr.splice(index,1);
        $.each(listAr,function(id,value,){
          value.index = id;
        });
        check = true;
        $("#file-1").prop('disabled', false);
        updateList('file-1','fileList',"Ar");
      }
      if(value==2){
        listEn.splice(index,1);
        $.each(listEn,function(id,value){
          value.index = id;
        });
        check = true;
        $("#file-2").prop('disabled', false);
        updateList("file-2","fileList2","en");
      }
      }
    //check image size
    function checkImageSize(listAr,listEn){
      error=0;
      let newList=listAr.concat(listEn)

      $.each(newList,function(index,element){
            if(element.class == 'red-class'){
              error+=1;
            }
          });
          if(error>0){
            return true;
          }
          else{
            return false;
          }
    }

    function updateList (inputID,outputID,listName) {

        let input = document.getElementById(inputID);
        let output = document.getElementById(outputID);
        let files1 = input.files;

      if(listName =='Ar'){
          console.log("arabic")
            if (check == true) {
            output.innerHTML = '<ul class="js-uploader__file-list uploader__file-list">';
            for (var i = 0; i < listAr.length; i++) {
                output.innerHTML += `<li  class="${listAr[i].class} js-uploader__file-list uploader__file-list">
                                <span class="uploader__file-list__thumbnail">
                                <img class="thumbnail" id="img_" src="${listAr[i].image}">
                                </span><span class="uploader__file-list__text hidden-xs">${listAr[i].name}</span>
                                <span class="uploader__file-list__size hidden-xs">${(listAr[i].size) / 1000} KB</span>
                                <span class="uploader__file-list__button"></span>
                                <span class="uploader__file-list__button" id="delete" ><a id="close" onclick="closebtn(${listAr[i].index},1)" class="uploader__icon-button fa fa-times" >
                                </a></span></li>`;
            }
            output.innerHTML += '</ul>';
            check = false;
        }
        else {
            if (files1.length > 5) {
                alert("max no. 5 images");
                return;
            }

            if (window.File && window.FileList && window.FileReader) {
                    if (files1.length == 5) {
                $(`#${inputID}`).prop('disabled', true);
            }
                for (var i = 0; i < files1.length; i++) {
                    var file = files1[i];
                    var imgReaderAr = new FileReader();
                    imgReaderAr.addEventListener("load", function (event) {
                        var imgFileAr = event.target;
                        if(file.size/1000 > imgMaxSize){
                            listAr.push({
                              'name': file.name,
                              'size': file.size,
                              'index': listAr.length,
                              'image': imgFileAr.result,
                              'class':'red-class',
                          });
                        }
                        else{
                          listAr.push({
                              'name': file.name,
                              'size': file.size,
                              'index': listAr.length,
                              'image': imgFileAr.result,
                              'class':'upload',
                          });
                        }

                        output.innerHTML = '<ul  class="js-uploader__file-list uploader__file-list" >';
                        for (var i = 0; i < listAr.length; i++) {
                            output.innerHTML += `<li class="${listAr[i].class} js-uploader__file-list uploader__file-list">
                                <span class="uploader__file-list__thumbnail">
                                <img class="thumbnail" id="img_" src="${listAr[i].image}">
                                </span><span class="uploader__file-list__text hidden-xs">${listAr[i].name}</span>
                                <span class="uploader__file-list__size hidden-xs">${(listAr[i].size) / 1000} KB</span>
                                <span class="uploader__file-list__button"></span>
                                <span class="uploader__file-list__button" id="delete" ><a id="close" onclick="closebtn(${listAr[i].index},1)" class="uploader__icon-button fa fa-times" >
                                </a></span></li>`;
                        }
                        output.innerHTML += '</ul>';
                    });
                    //Read the image
                    imgReaderAr.readAsDataURL(file);
                }
            }
              $(`#${inputID}`).val('');
            if (listAr.length == 4) {
                $(`#${inputID}`).prop('disabled', true);
            }
        }
      }
      //English Images
      if(listName == 'en'){
          console.log("english")
          if (check == true) {
            output.innerHTML = '<ul class="js-uploader__file-list uploader__file-list">';
            for (var i = 0; i < listEn.length; i++) {
                output.innerHTML += `<li  class="${listEn[i].class} js-uploader__file-list uploader__file-list">
                                <span class="uploader__file-list__thumbnail">
                                <img class="thumbnail" id="img_" src="${listEn[i].image}">
                                </span><span class="uploader__file-list__text hidden-xs">${listEn[i].name}</span>
                                <span class="uploader__file-list__size hidden-xs">${(listEn[i].size) / 1000} KB</span>
                                <span class="uploader__file-list__button"></span>
                                <span class="uploader__file-list__button" id="delete" ><a id="close" onclick="closebtn(${listEn[i].index},2)" class="uploader__icon-button fa fa-times" >
                                </a></span></li>`;
            }
            output.innerHTML += '</ul>';
            check = false;
        }
        else {
            if (files1.length > 5) {
                alert("max no. 5 images");
                return;
            }

            if (window.File && window.FileList && window.FileReader) {
                    if (files1.length == 5) {
                $(`#${inputID}`).prop('disabled', true);
            }
                for (var i = 0; i < files1.length; i++) {
                    var file = files1[i];
                    var imgReaderEn = new FileReader();
                    imgReaderEn.addEventListener("load", function (event) {
                        var imgFileEn = event.target;
                        if(file.size/1000 > imgMaxSize){
                            listEn.push({
                              'name': file.name,
                              'size': file.size,
                              'index': listEn.length,
                              'image': imgFileEn.result,
                              'class':'red-class',
                          });
                        }
                        else{
                          listEn.push({
                              'name': file.name,
                              'size': file.size,
                              'index': listEn.length,
                              'image': imgFileEn.result,
                              'class':'upload',
                          });
                        }

                        output.innerHTML = '<ul  class="js-uploader__file-list uploader__file-list" >';
                        for (var i = 0; i < listEn.length; i++) {
                            output.innerHTML += `<li class="${listEn[i].class} js-uploader__file-list uploader__file-list">
                                <span class="uploader__file-list__thumbnail">
                                <img class="thumbnail" id="img_" src="${listEn[i].image}">
                                </span><span class="uploader__file-list__text hidden-xs">${listEn[i].name}</span>
                                <span class="uploader__file-list__size hidden-xs">${(listEn[i].size) / 1000} KB</span>
                                <span class="uploader__file-list__button"></span>
                                <span class="uploader__file-list__button" id="delete" ><a id="close" onclick="closebtn(${listEn[i].index},2)" class="uploader__icon-button fa fa-times" >
                                </a></span></li>`;
                        }
                        output.innerHTML += '</ul>';
                    });
                    //Read the image
                    imgReaderEn.readAsDataURL(file);
                }
            }
              $(`#${inputID}`).val('');
            if (listEn.length == 4) {
                $(`#${inputID}`).prop('disabled', true);
            }
        }
      }
    }

   //get  images from database
    function get_images(){
      @if( count($images_ar) > 0 )
        @foreach($images_ar as $image)
          listAr.push({
            'name': '{{ "Arabic image #" . ++$loop->index }}',
            'size': '',
            'image': '{{ asset($image->link) }}',
            'id': '{{ $image->id }}'
          });
        @endforeach
      @endif


      @if( count($images_en) > 0 )
        @foreach($images_en as $image)
          listEn.push({
            'name': '{{ "English image #" . ++$loop->index }}',
            'size': '',
            'image': '{{ asset($image->link) }}',
            'id': '{{ $image->id }}'
          });
        @endforeach
      @endif

      add_index(listAr);
      add_index(listEn);
    }
    //add index
    function add_index(list){
        $.each(list,function(id,value){
          value.index = id;
        })
        console.log(list)
        show_image(listEn,"fileList2","en");
        show_image(listAr,"fileList","ar");
    }
    //draw images
    function show_image(list,output_section,ref){
      let value;
      switch(ref){
          case 'ar':
                value=1;
                break;
          case 'en':
              value=2;
              break;
      }
                  let output = document.getElementById(output_section);
                   output.innerHTML = '<ul class="js-uploader__file-list uploader__file-list">';
                            for (var i = 0; i < list.length; i++) {
                                output.innerHTML += `<li class="js-uploader__file-list uploader__file-list">
                                    <span class="uploader__file-list__thumbnail">
                                    <img class="thumbnail" id="img_" src="${list[i].image}">
                                    </span><span class="uploader__file-list__text hidden-xs">${list[i].name}</span>
                                    <span class="uploader__file-list__size hidden-xs">${(list[i].size) / 1000} KB</span>
                                    <span class="uploader__file-list__button"></span>
                                    <span class="uploader__file-list__button" id="delete" ><a id="close" onclick="closebtn(${list[i].index},${value})" class="uploader__icon-button fa fa-times" >
                                    </a></span></li>`;
                            }
                            output.innerHTML += '</ul>';
    }

</script><!--End UI-->
<!--********************UI*************************-->
<script type="text/javascript">
    $(function(){
        var form = $("#horizontal-pill-steps").show();
    form.steps({
      headerTag: "h3",
      bodyTag: "fieldset",
      transitionEffect: "slideLeft",
      onStepChanging:function test(event, currentIndex, newIndex){
        console.log(newIndex)
        if(newIndex == 2){
        }
         if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    if (currentIndex < newIndex)
                    {
                        form.find(".body:eq(" + newIndex + ") span.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
      },

       onFinishing:function test3(e){
         // base64 string concatinated with "-"
        var englishList = '';
        var arabicList  = '';

        // get English images
        for(i=0; i<listEn.length; i++) {
          englishList += '-' + listEn[i].image;
        }

        // get Arabic images
        for(i=0; i<listAr.length; i++) {
          arabicList += '-' + listAr[i].image;
        }

        // assign concatinated base64 images to a hidden field
        // append image list to hidden inputs
        $("#images_en").val(englishList);
        $("#images_ar").val(arabicList);

        if((! checkImageSize(listAr,listEn)) && (!checkAllYoutubeLinks()) ){
           $("#horizontal-pill-steps").submit();
         }
         else{
          alert_msg("ERROR","Check Uploaded Images or Youtube Links")
         }
       },

    }).validate({
                errorPlacement: function errorPlacement(error, element) { element.after(error); },
            });
            dateRange('start_date','end_date','2018','7','30','2018','8','30','22/11/2018')

    })

</script><!--End UI-->
<script type="text/javascript">
   var errors = [0, 0, 0, 0];
    $(function(){
       /** check youtube links **/

      $("#YouTube_video_en1").focusout(function() {
        var value = $(this).val();
        if(value){
          checkYoutubeLink(this, value, "#yl_2") ? errors[0] = 0 : errors[0] = 1;
        }
        else{
          errors[0] = 0;
          $("#yl_2").empty()

        }
      });

      $("#YouTube_video_en2").focusout(function() {
        var value = $(this).val();
        if(value){
          checkYoutubeLink(this, value, "#yl_4") ? errors[1] = 0 : errors[1] = 1;
        }
        else{
          errors[1] = 0;
          $("#yl_4").empty()

        }
      });

      $("#YouTube_video_ar1").focusout(function() {
        var value = $(this).val();
        if(value){
          checkYoutubeLink(this, value, "#yl_1") ? errors[2] = 0 : errors[2] = 1;
        }
        else{

          errors[2] = 0;
          $("#yl_1").empty()
        }
      });

      $("#YouTube_video_ar2").focusout(function() {
        var value = $(this).val();
        if(value){
          checkYoutubeLink(this, value, "#yl_3") ? errors[3] = 0 : errors[3] = 1;
        }
        else{
          errors[3] = 0;
          $("#yl_3").empty()

        }
      });

      function checkAllYoutubeLinks() {
        return errors.includes(1);
      }

      function checkYoutubeLink(id, value, error_msg) {
        var con = value.search("https://www.youtube.com/watch?");

        if ( !con ) {
          $(error_msg).text('Valid youtube link..')
          .attr('style', 'color: blue !important; text-transform: lowercase !important;');

          return true;
        } else {
          $(error_msg).text('Invalid youtube link, ex: https://www.youtube.com/watch?2bdsfds1')
          .attr('style', 'color: #8a1f11!important; text-transform: lowercase !important;');
          return false;
        }
      }
/** end **/
  })
    function checkAllYoutubeLinks() {
      return errors.includes(1);
    }
</script><!--End UI-->

<!--check YoutubeLinks-->
<script type="text/javascript">
    function checkYoutubeLink(id, value, error_msg) {
      var con = value.search("https://www.youtube.com/watch?");

      if ( !con ) {
        $(error_msg).text('Valid youtube link..')
        .attr('style', 'color: blue !important; text-transform: lowercase !important;');

        return true;
      } else {
        $(error_msg).text('Invalid youtube link, ex: https://www.youtube.com/watch?2bdsfds1')
        .attr('style', 'color: #8a1f11!important; text-transform: lowercase !important;');

        return false;
      }
    }
</script>
<!--*****************************UI**********************-->
<script type="text/javascript">
    $(function(){
        get_images();
    })
</script><!--End UI-->


<script type="text/javascript">
  $(document).ready(function(){

    // var test_test =0;
    // var form = $("#horizontal-pill-steps").show();
    // form.steps({
    //   headerTag: "h3",
    //   bodyTag: "fieldset",
    //   transitionEffect: "slideLeft",
    //   onStepChanging:function test(event, currentIndex, newIndex){
    //     if (currentIndex > newIndex) {
    //         return true;
    //     }
    //     if (currentIndex < newIndex) {
    //         form.find(".body:eq(" + newIndex + ") span.error").remove();
    //         form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
    //     }
    //     form.validate().settings.ignore = ":disabled,:hidden";
    //     return form.valid();
    //   },

    //   onFinishing:function test3(e){

    //     // TODO: check youtube links & image size
    //     if( test_test == 0 && !checkAllYoutubeLinks() && !checkTotalImageSize() ){
    //       console.log("finish")
    //       var form = $(this);
    //       form.submit();
    //     }
    //     else{
    //       e.preventDefault();

    //       $("#finish1").attr("disabled", "disabled")
    //       // alert_fun();
    //       alert("Attention, some fields are not valid, please check them.");
    //     }
    //   },

    //   }).validate({
    //     errorPlacement: function errorPlacement(error, element) { element.after(error); },
    //   });

    // // constrain start and end date
    // dateRange('start_date', 'end_date');


    /** check youtube links **/
    // var errors = [0, 0, 0, 0];

    // $("#YouTube_video_en1").focusout(function() {
    //   var value = $(this).val();

    //   checkYoutubeLink(this, value, "#yl_2") ? errors[0] = 0 : errors[0] = 1;
    // });

    // $("#YouTube_video_en2").focusout(function() {
    //   var value = $(this).val();

    //   checkYoutubeLink(this, value, "#yl_4") ? errors[1] = 0 : errors[1] = 1;
    // });

    // $("#YouTube_video_ar1").focusout(function() {
    //   var value = $(this).val();

    //   checkYoutubeLink(this, value, "#yl_1") ? errors[2] = 0 : errors[2] = 1;
    // });

    // $("#YouTube_video_ar2").focusout(function() {
    //   var value = $(this).val();

    //   checkYoutubeLink(this, value, "#yl_3") ? errors[3] = 0 : errors[3] = 1;
    // });

    // function checkAllYoutubeLinks() {
    //   return errors.includes(1);

    // }

    // function checkYoutubeLink(id, value, error_msg) {
    //   var con = value.search("https://www.youtube.com/watch?");

    //   if ( !con ) {
    //     $(error_msg).text('Valid youtube link..')
    //     .attr('style', 'color: blue !important; text-transform: lowercase !important;');

    //     return true;
    //   } else {
    //     $(error_msg).text('Invalid youtube link, ex: https://www.youtube.com/watch?2bdsfds1')
    //     .attr('style', 'color: red !important; text-transform: lowercase !important;');

    //     return false;
    //   }
    // }
    /** end **/

    /** check image size **/
    // let checkPoint = [0, 0];

    // function checkTotalImageSize() {

    //   let imgMaxSize = 1024;
    //   let imagesAr = document.getElementById('file-1').files;   // arabic images
    //   let imagesEn = document.getElementById('file-2').files;   // english images

    //   // check arabic images
    //   // for ( i=0; i < imagesAr.length; i++ ) {
    //   //   imgSize = imagesAr[i].size / 1000;

    //   //   if ( imgSize > imgMaxSize ) {
    //   //     checkPoint[0] = 1;
    //   //   }
    //   // }

    //   // check english images
    //   // for ( i=0; i < imagesEn.length; i++ ) {
    //   //   imgSize = imagesEn[i].size / 1000;

    //   //   if ( imgSize > imgMaxSize ) {
    //   //     checkPoint[1] = 1;
    //   //   }
    //   }

      // return checkPoint.includes(1);
    });

  $(function () {
    $(".select2").select2();
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
    $(".timepicker").timepicker({showInputs: false});
  });

  (function(){
    var options = {};
    $('.js-uploader__box').uploader(options);
  }());

  $(function () {
    $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
  });


</script>

<script>
  $( document ).ready(function() {


      $('.paid-details').fadeOut();

      $('label[for="radbtn_3_paid"]').on('click' , function(){
        $('.paid-details').fadeIn(100);
      });

      $('label[for="radbtn_2_free"]').on('click' , function(){
        $('.paid-details').fadeOut();
      });

    });
</script>

{{-- Prevent Enter key from submitting form --}}
<script>
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
</script>


{{-- Click on finish button triggers a hidden submit button --}}
<script>

  // $(document).ready(function() {
  //   $("#finish1").click(function(){
  //     $("#submitButton").trigger('click');
  //   });
  // });
</script>



{{-- Check Image before uploading --}}
<script>
  // $(document).ready(function(){
  //   $('#user_img').on('change', function() {
  //     checkImageSize('#user_img', 5120, '#add_user_submit', '#add_error_msg');
  //   });
  // });

  // function checkImageSize(input, maxSize, submitBtnId, error_msg_id) {
  //   // size of the image
  //   var imageSizeInMB = ($(input)[0].files[0].size) / 1024;

  //   if (imageSizeInMB <= maxSize) {
  //     $(submitBtnId).prop('disabled', false);
  //     $(error_msg_id).text("Image size is perfect!").css('color', 'blue');
  //   } else {
  //     $(submitBtnId).prop('disabled', true);
  //     $(error_msg_id).text("Image max size is 5MB (5120KB).").css('color', 'red');
  //   }
  // }
</script>



@endsection