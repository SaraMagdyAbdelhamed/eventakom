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

        <form action="{{ route('fa.store') }}" method="POST" enctype="multipart/form-data" id="horizontal-pill-steps">
            {{ csrf_field() }}

            <h3>@lang('keywords.infoEn')</h3>
            <fieldset>
            <div class="row">

                {{-- Place Name --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label required" for="Place_name">@lang('keywords.placeName')</label>
                    <input class="master_input " maxlength="100" type="text" placeholder="ex:city stars"  id="Place_name" name="place_name" value="{{ old('place_name') }}" required>
                    @if ($errors->has('place_name'))
                        <span class="master_message color--fadegreen">{{ $errors->first('place_name') }}</span>
                    @endif
                </div>
                </div>

                {{-- Place Category --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label required" for="Place_Category">@lang('keywords.placeCategories')</label>
                    <select class="master_input select2" name="place_categories[]" required
                            id="Place_Category" multiple="multiple" data-placeholder="choose an option.." style="width:100%;" >
                        @if ( isset($categories) && !empty($categories) )
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ \App::isLocale('en') ? $category->name : Helper::localization('fa_categories', 'name', $category->id, 2, $category->name) }}</option>
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
                    <input class="master_input" type="text" placeholder="ex:CFC" required id="searchInput" name="address" value="" />
                </div>
                </div>

                {{-- Phone Number --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label required" for="Phone_number">@lang('keywords.Phone')</label>
                    <input class="master_input " type="number" placeholder="0020123456789"  id="Phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    @if ($errors->has('phone_number'))
                        <span class="master_message color--fadegreen">{{ $errors->first('phone_number') }}</span>
                    @endif
                </div>
                </div>

                {{-- Website --}}
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Website">@lang('keywords.Website')</label>
                    <input class="master_input" type="url" placeholder="www.domain.com"  id="Website" name="website" value="{{ old('website') }}">
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
                <h4>@lang('keywords.openday')</h5>
                <h6>@lang('keywords.famousHint')</h6>
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
                        <input class="timepicker master_input" type="text" name="sat_start" placeholder="start time"  id="start_time" disabled value="">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="sat_end" placeholder="end time" id="end_time" disabled value="">
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="sun" value="2" id="Opening_days_2">
                    <label for="Opening_days_2">@lang('keywords.sunday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="sun_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="sun_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="mon" value="3" id="Opening_days_3">
                    <label for="Opening_days_3">@lang('keywords.monday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="mon_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="mon_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="tue" value="4" id="Opening_days_4">
                    <label for="Opening_days_4">@lang('keywords.tuesday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="tue_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="tue_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="wed" value="5" id="Opening_days_5">
                    <label for="Opening_days_5">@lang('keywords.wednesday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="wed_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="wed_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="thu" value="6" id="Opening_days_6">
                    <label for="Opening_days_6">@lang('keywords.thursday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="thu_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="thu_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-2 col-xs-12">
                <div class="master_field">
                    <label class="master_label">@lang('keywords.openday')</label>
                    <div class="funkyradio">
                    <input type="checkbox" name="fri" value="7" id="Opening_days_7">
                    <label for="Opening_days_7">@lang('keywords.friday')</label>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="start_time">@lang('keywords.start date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="fri_start" placeholder="start time"  id="start_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-sm-5 col-xs-6">
                <div class="master_field">
                    <div class="master_field">
                    <label class="master_label" for="end_time">@lang('keywords.end date time')</label>
                    <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" name="fri_end" placeholder="end time"  id="end_time" disabled>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="Other_info">@lang('keywords.otherInfo')</label>
                    <textarea class="master_input" name="other_info" id="Other_info" placeholder="Other info" >{{ old('other_info') }}</textarea>
                    @if ($errors->has('other_info'))
                        <span class="master_message color--fadegreen">{{ $errors->first('other_info') }}</span>
                    @endif
                </div>
                </div>
            </div>
            </fieldset>


            <h3>@lang('keywords.infoAr')</h3>
            <fieldset>
            <div class="row">
                <div class="col-xs-6">
                <div class="master_field ">
                    <label class="master_label required" for="Place_name">@lang('keywords.placeName')</label>
                    <input class="master_input" type="text" maxlength="100" placeholder="ex:city stars"  id="Place_name" name="place_name_ar" require />
                    @if ($errors->has('place_name_ar'))
                        <span class="master_message color--fadegreen">{{ $errors->first('place_name_ar') }}</span>
                    @endif
                </div>
                </div>
                <div class="col-xs-6">
                <div class="master_field">
                    <label class="master_label" for="Address_name">@lang('keywords.placeAddress')</label>
                    <input class="master_input" type="text" placeholder="ex:52 Ahmed Salh st .city stars"  id="Address_name" name="place_address_ar" />
                    @if ($errors->has('place_address_ar'))
                        <span class="master_message color--fadegreen">{{ $errors->first('place_address_ar') }}</span>
                    @endif
                </div>
                </div>
                <div class="col-xs-12">
                <div class="master_field">
                    <label class="master_label" for="Other_info_ar">@lang('keywords.otherInfo')</label>
                    <textarea class="master_input" name="other_info_ar" id="Other_info_ar" placeholder="Other info" >{{ old('other_info_ar') }}</textarea>
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
                    <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en1" 
                    name="youtube_en_1" value="{{ isset($youtube_links[1]) ? $youtube_links[1]->link : '' }}">
                  <span class="master_message inherit" id="yl_2"></span>
                </div>
                </div>

               
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en2">@lang('keywords.YouTube-en-2')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en2" 
                    name="youtube_en_2" value="{{ isset($youtube_links[3]) ? $youtube_links[3]->link : '' }}">
                  <span class="master_message inherit" id="yl_4"></span>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar1">@lang('keywords.YouTube-ar-1')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar1" 
                    name="youtube_ar_1" value="{{ isset($youtube_links[0]) ? $youtube_links[0]->link : '' }}">
                  <span class="master_message inherit" id="yl_1"></span>
              </div>
            </div>

                  <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar2">@lang('keywords.YouTube-ar-2')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar2" 
                    name="youtube_ar_2" value="{{ isset($youtube_links[2]) ? $youtube_links[2]->link : '' }}">
                  <span class="master_message inherit" id="yl_3"></span>
              </div>
            </div>

                {{-- Arabic images --}}
            <div class="col-sm-6 col-xs-12 text-center">
                <h4 class="text-center">upload event images (in Arabic ) (max no. 5 images)</h4>
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
    
              {{-- English images --}}
            <div class="col-sm-6 col-xs-12 text-center">
                <h4 class="text-center">upload event images (in English ) (max no. 5 images)</h4>
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

            </div>
            <button type="submit" id="submitButton" hidden>submit</button>
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
</script><!--End UI-->

<!--***************************UI*******************************-->
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

<script type="text/javascript">

    $(document).ready(function(){
        $(function () {
            $(".select2").select2();
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

<script type="text/javascript">
    
</script>

{{-- Submit form onClick on finish --}}
<!-- <script>
  $(document).ready(function() {
    $("#finish1").click(function(){
      $("#submitButton").trigger('click');
    });
  });
</script> -->

{{-- disable checkbox fields --}}
<script>
    $(document).ready(function(){

        // Toggle disable for start & end timepicker onclick on the next checkbox
        function toggleDisable(check, start, end) {
            $("input[name="+check+"]").click(function(){
                if($(this).is(":checked")){
                    // $("input[name="+start+"]").val('');
                    $("input[name="+start+"]").prop('disabled', false);

                    // $("input[name='sat_end']").val('');
                    $("input[name="+end+"]").prop('disabled', false);
                } else {
                    // $("input[name="+start+"]").val('');
                    $("input[name="+start+"]").prop('disabled', true);

                    // $("input[name='sat_end']").val('');
                    $("input[name="+end+"]").prop('disabled', true);
                }
            });
        }

        toggleDisable('sat', 'sat_start', 'sat_end');
        toggleDisable('sun', 'sun_start', 'sun_end');
        toggleDisable('mon', 'mon_start', 'mon_end');
        toggleDisable('tue', 'tue_start', 'tue_end');
        toggleDisable('wed', 'wed_start', 'wed_end');
        toggleDisable('thu', 'thu_start', 'thu_end');
        toggleDisable('fri', 'fri_start', 'fri_end');

        
    });
</script>
@endsection