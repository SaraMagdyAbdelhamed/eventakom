@extends('layouts.app')
@section('content')
<div class="remodal" data-remodal-id="mapModal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
      <div class="row">
        <div class="col-lg-12">
          <h3>Map</h3>
        </div>
        <div class="col-xs-12">
          <form>
            <div class="tabs--wrapper">
              <div class="mapouter">
                <div class="gmap_canvas">
                  <iframe id="gmap_canvas" width="600" height="500" src="https://maps.google.com/maps?q={{$shop['address']}}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.embedgooglemap.net"></a></iframe>
                </div>
              </div>
            </div><br>
            <div class="col-xs-12">
              <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
              <button class="remodal-confirm" data-remodal-action="confirm">OK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!-- =============== Custom Content ===========-==========-->
<div class="row">
  <div class="col-xs-12">
    <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
      <div class="add-mode">@lang('keywords.editing_mode')</div>
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
      <form id="horizontal-pill-steps" action="{{URL('edit_shop_data/'.$shop['id'])}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        {{ csrf_field() }}
        <h3>@lang('keywords.info') </h3>
        <fieldset>
          <div class="row">
              <div class="col-xs-6">
                <div class="master_field">
                  <label class="master_label" for="Place_name">@lang('keywords.shop_name')</label>
                  <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name" name="place_name" value="{{$shop['name']}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="master_field">
                  <label class="master_label" for="Place_name">@lang('keywords.shop_name_arabic')</label>
                  <input class="master_input" type="text" placeholder="ex:city stars"  id="Place_name" name="place_name_ar" value="{{Helper::localization('shops', 'name', $shop['id'], 2)}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-xs-4">
                  <div class="master_field">
                    <label class="master_label" for="Place_address">@lang('keywords.shop_address')</label>
                    <input class="master_input" type="text" placeholder="ex:city stars" Required id="shop_address" name="place_address" value="{{$shop['address']}}"><span class="master_message color--fadegreen"></span>
                  </div>
              </div>
              <div class="col-md-2 col-xs-1">
                  <br>
                  <br>
                  <a class="bradius--no border-btn master-btn" type="button" href="#mapModal">Map</a>
              </div>
              <div class="col-xs-4">
                  <div class="master_field">
                      <label class="master_label" for="Phone_number">@lang('keywords.shop_phone')</label>
                      <input class="master_input" type="tel" placeholder="0020123456789" Required id="Phone_number" name="phone" value="{{$shop['phone']}}"><span class="master_message color--fadegreen"></span>
                  </div>
              </div>
              <div class="col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="Website">@lang('keywords.website')</label>
                  <input class="master_input" type="url" placeholder="www.domain.com" Required id="Website" name="website" value="{{$shop['website']}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="Other_info">@lang('keywords.other_info')</label>
                  <textarea class="master_input" name="info" id="Other_info" placeholder="Other info" Required >{{$shop['info']}}</textarea><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="Other_info">@lang('keywords.other_info_arabic')</label>
                  <textarea class="master_input" name="info_ar" id="Other_info_ar" placeholder="Other info" >{{Helper::localization('shops', 'info', $shop['id'], 2)}}</textarea><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-xs-4" hidden>
                <div class="master_field">
                  <label class="master_label" for="shop_long">Longtiuide</label>
                  <input class="master_input" name="shop_long" id="shop_long" placeholder="shop_long" type="text"><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-xs-4" hidden>
                <div class="master_field">
                  <label class="master_label" for="shop_lat">Lat</label>
                  <input class="master_input" name="shop_lat" id="shop_lat" placeholder="shop_lat" type="text"><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-sm-12 col-xs-12">
                <div class="master_field">
                  <?php $days=[];?>
                  @foreach($shop['shop_day'] as $day)
                  <?php $days[]=$day['day_id'];?>
                  @endforeach
                  <label class="master_label">@lang('keywords.opening_days')</label>
                  <div class="funkyradio">
                    @if(in_array(1, $days))
                    <input type="checkbox" name="days[1]" id="Opening_days_1" checked>
                    @else
                    <input type="checkbox" name="days[1]" id="Opening_days_1" >
                    @endif
                    <label for="Opening_days_1">@lang('keywords.saturday')</label>
                  </div>
                  <div class="funkyradio">
                    @if(in_array(2, $days))
                    <input type="checkbox" name="days[2]" id="Opening_days_2" checked>
                    @else
                    <input type="checkbox" name="days[2]" id="Opening_days_2" >
                    @endif
                    <label for="Opening_days_2">@lang('keywords.sunday')</label>
                  </div>
                  <div class="funkyradio">
                    @if(in_array(3, $days))
                    <input type="checkbox" name="days[3]" id="Opening_days_3" checked>
                    @else
                    <input type="checkbox" name="days[3]" id="Opening_days_3" >
                    @endif
                    <label for="Opening_days_3">@lang('keywords.monday')</label>
                  </div>
                  <div class="funkyradio">
                    @if(in_array(4, $days))
                    <input type="checkbox" name="days[4]" id="Opening_days_4" checked>
                    @else
                    <input type="checkbox" name="days[4]" id="Opening_days_4" >
                    @endif
                    <label for="Opening_days_4">@lang('keywords.tuesday')</label>
                  </div>
                  <div class="funkyradio">
                    @if(in_array(5, $days))
                    <input type="checkbox" name="days[5]" id="Opening_days_5" checked>
                    @else
                    <input type="checkbox" name="days[5]" id="Opening_days_5" >
                    @endif
                    <label for="Opening_days_5">@lang('keywords.wednesday')</label>
                  </div>
                  <div class="funkyradio">
                    @if(in_array(6, $days))
                    <input type="checkbox" name="days[6]" id="Opening_days_6" checked>
                    @else
                    <input type="checkbox" name="days[6]" id="Opening_days_6" >
                    @endif
                    <label for="Opening_days_6">@lang('keywords.thursday')</label>
                  </div>
                  <div class="funkyradio">
                   @if(in_array(7, $days))
                    <input type="checkbox" name="days[7]" id="Opening_days_7" checked>
                    @else
                    <input type="checkbox" name="days[7]" id="Opening_days_7" >
                    @endif
                    <label for="Opening_days_7">@lang('keywords.friday')</label>
                  </div>
                </div>
              </div>
            <div class="branch-container">
              <?php $i=1; ?>
              @foreach($shop['shop_branch'] as $branch)

              <div class="col-sm-2 col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="branches_1">@lang('keywords.branch_name') {{$i}} </label>
                  <input class="master_input" type="text" placeholder="branch 1 name" Required id="branches_1" name="branch_name[{{$i}}]" value="{{$branch['branch']}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-sm-3 col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="branches_1">@lang('keywords.branch_name'){{$i}} @lang('keywords.in_ar')</label>
                  <input class="master_input" type="text" placeholder="branch 1 name"  id="branches_1" name="branch_name_ar[{{$i}}]" value="{{Helper::localization('shop_branches', 'branch', $branch['id'], 2)}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-sm-3 col-xs-4">
                <div class="master_field">
                  <label class="master_label" for="branches_1">@lang('keywords.branch_address') {{$i}}</label>
                  <input class="master_input" type="text" placeholder="branch 1 address" Required id="branches_1" name="branch_address[{{$i}}]" value="{{$branch['address']}}"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
              <div class="col-sm-2 col-xs-6">
                <div class="master_field">
                  <label class="master_label" for="start_time">@lang('keywords.branch_start') {{$i}}</label>
                  <div class="bootstrap-timepicker">
                    <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time"name="branch_start[{{$i}}]">
                  </div><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-sm-2 col-xs-6">
                <div class="master_field">
                  <label class="master_label" for="end_time">@lang('keywords.branch_end') {{$i}}</label>
                  <div class="bootstrap-timepicker">
                    <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time" name="branch_end[{{$i}}]">
                  </div><span class="master_message inherit"></span>
                </div>
              </div>
              <div class="col-xs-4" hidden>
              <div class="master_field">
                <label class="master_label" for="branch_long">Longtiuide</label>
                <input class="master_input" name="branch_long[{{$i}}]" id="branch_long_{{$i}}" placeholder="shop_long" type="text"><span class="master_message inherit"></span>
              </div>
            </div>
            <div class="col-xs-4" hidden>
              <div class="master_field">
                <label class="master_label" for="branch_lat">Lat</label>
                <input class="master_input" name="branch_lat[{{$i}}]" id="branch_lat_{{$i}}" placeholder="branch_lat" type="text"><span class="master_message inherit"></span>
              </div>
            </div>
              <?php $i++; ?>
              @endforeach
            </div>
            <div id="mbranch">

            </div>
            <div class="col-sm-12 col-xs-12">
              <button class="add-more-branch btn-block master-btn bgcolor--gray_mm"><i class="fa fa-plus color--main"></i><span class="color--main">@lang('keywords.add_branch')</span></button>
            </div>
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="active_place">@lang('keywords.shop_active')</label>
                @if($shop->is_active)
                <input  type="checkbox" checked  name="is_active">
                @else
                <input type="checkbox"   name="is_active">
                @endif
              </div>
            </div>
          </div>
        </fieldset>
        {{-- <h3>Info in Arabic</h3>
        <fieldset>
          <div class="row">
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Place_name">Place name</label>
                <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name"><span class="master_message color--fadegreen"></span>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="Other_info">Other info</label>
                <textarea class="master_input" name="textarea" id="Other_info" placeholder="Other info" Required></textarea><span class="master_message inherit"></span>
              </div>
            </div>
            <div class="branch-container-ar">
              <div class="col-sm-6 col-xs-12">
                <div class="master_field">
                  <label class="master_label" for="branches_1">branch 1 name</label>
                  <input class="master_input" type="text" placeholder="branch 1 name" Required id="branches_1"><span class="master_message color--fadegreen"></span>
                </div>
              </div>
            </div>
          </div>
        </fieldset> --}}
        <h3>@lang('keywords.media')</h3>
        <fieldset>
          <div class="row">
            <div class="col-xs-12">
              <h4>add youtube video link</h4>
            </div>
            <div class="col-sm-6 col-xs-12">
            <div class="master_field">
                <label class="master_label" for="YouTube_video_en">@lang('keywords.you_tube') (1) @lang('keywords.in_en')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en1"
                name="youtube_en_1" value="{{ isset($youtube_links[1]) ? $youtube_links[1]->link : '' }}">
              <span class="master_message inherit" id="yl_2"></span>
            </div>
            </div>
              <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_ar1">@lang('keywords.you_tube') (1) @lang('keywords.in_ar')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar1"
                    name="youtube_ar_1" value="{{ isset($youtube_links[0]) ? $youtube_links[0]->link : '' }}">
                  <span class="master_message inherit" id="yl_1"></span>
              </div>
            </div>
             <div class="col-xs-6">
              <div class="master_field">
                <label class="master_label" for="YouTube_video_en2">@lang('keywords.you_tube') (2) @lang('keywords.in_en')</label>
                <input class="master_input" type="text" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en2"
                    name="youtube_en_2" value="{{ isset($youtube_links[3]) ? $youtube_links[3]->link : '' }}">
                  <span class="master_message inherit" id="yl_4"></span>
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
            <div class="col-sm-6 col-xs-12 text-center">
            <h4>@lang('keywords.upload_image') (@lang('keywords.max_img')) @lang('keywords.in_en')</h4>
            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
              <div class="main-section">
                <div id="fileList2"></div>
                <div class="form-group">
                  <input class="inputfile inputfile-1" id="file-2" type="file" name="images_ar[]" data-multiple-caption="{count} files selected" multiple="" onchange="updateList('file-2','fileList2','en')" accept=".jpg,.png,.jpeg">
                  <label for="file-2"><span> Choose a file</span></label>
                </div>
              </div>
            </div>
          </div>
            <div class="col-sm-6 col-xs-12 text-center">
              <h4>@lang('keywords.upload_image') (@lang('keywords.max_img')) @lang('keywords.in_ar')</h4>
               <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                <div class="main-section">
                  <div id="fileList"></div>
                  <div class="form-group">
                    <input class="inputfile inputfile-1" id="file-2" type="file" name="images_ar[]" data-multiple-caption="{count} files selected" multiple="" onchange="updateList('file-2','fileList2','en')" accept=".jpg,.png,.jpeg">
                    <label for="file-2"><span> Choose a file</span></label>
                    <input type="hidden" name="images_ar" id="hidden_images_ar">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </fieldset>
      </form>
    </div>
  </div><br>
</div>

@endsection


@section('js')
<!--***************************UI*************************-->
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
            let test_ = document.getElementById("file-1").files;

            alert_msg('Error','Some inputs are invalid, please make sure to use valid input data!');
          }
          else{

            $("#horizontal-pill-steps").submit();
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

      @if( count(\Helper::getLinks($shop->id, 2)) > 0 )
        @foreach(\Helper::getLinks($shop->id, 2) as $image)
          listAr.push({
            'name': '{{ "Arabic image #" . ++$loop->index }}',
            'size': '',
            'image': '{{ asset($image->value) }}',
            'id': '{{ $image->id }}'
          });
        @endforeach
      @endif


      @if( count($shop->shop_media()->where('type', 1)->get()) > 0 )
        @foreach($shop->shop_media()->where('type', 1)->get() as $image)
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


<!--*******************************UI************************-->
<script type="text/javascript">
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

        var englishList = '';
        var arabicList  = '';

        for(i=0; i<listEn.length; i++) {
          englishList += '-' + listEn[i].image;
        }

        for(i=0; i<listAr.length; i++) {
          arabicList += '-' + listAr[i].image;
        }

        // append image list to hidden inputs
        $("#hidden_images_en").val(englishList);
        $("#hidden_images_ar").val(arabicList);

        // Check all images size
        checkImageSize(listAr,listEn);


       },

    }).validate({
        errorPlacement: function errorPlacement(error, element) { element.after(error); },
    });

</script><!--End UI-->
<!--********************************UI**************************-->
<script type="text/javascript">
    $(function(){
      get_images();
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


    </script>
     <script type="text/javascript">
      $(function () {
        $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
      });
    </script>
    <script type="text/javascript">
      (function(){
        var options = {};
        $('.js-uploader__box').uploader(options);
      }());

    </script>

    <script type="text/javascript">
      // var currentCount =0;
      //  var nextCount = 0 ;

      $('.add-more-branch').on('click' , function(){
       var currentCount =$('.branch-container').length;
       // for (var i = 1 ; i<= currentCount ; i++) {
       //   assignAutoCompl("branch_address_"+i,"#branch_long_"+i,"#branch_lat_"+i);
       // }
      var nextCount = currentCount +1;
       $('#mbranch').append("<div class='branch-container'>  <div class='col-sm-2 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>@lang('keywords.branch_name')"+nextCount+" </label><input class='master_input' type='text' placeholder='branch "+nextCount+" name' Required id='branch_"+nextCount+"' name='branch_name["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-3 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>@lang('keywords.branch_name')"+nextCount+"@lang('keywords.in_ar')</label><input class='master_input' type='text' placeholder='branch "+nextCount+" name'  id='branch_"+nextCount+"' name='branch_name_ar["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-3 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>@lang('keywords.branch_address')"+nextCount+" </label><input class='master_input' type='text' placeholder='branch "+nextCount+" address' Required id='branch_address_"+nextCount+"' name='branch_address["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-2 col-xs-6'><div class='master_field'><label class='master_label' for='start_time_"+nextCount+"'>@lang('keywords.branch_start') "+nextCount+"</label><div class='bootstrap-timepicker'><input  class='timepicker master_input' type='text' placeholder='start time for "+nextCount+"' Required id='start_time_"+nextCount+"' name='branch_start["+nextCount+"]'></div><span class='master_message inherit'></span></div></div><div class='col-sm-2 col-xs-6'><div class='master_field'><label class='master_label' for='end_time_"+nextCount+"'>@lang('keywords.branch_end') "+nextCount+"</label><div class='bootstrap-timepicker'><input  class='timepicker master_input' type='text' placeholder='end time for "+nextCount+"' Required id='end_time_"+nextCount+"' name='branch_end["+nextCount+"]'></div><span class='master_message inherit'></span></div></div><div class='col-sm-3 col-xs-4' hidden><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch"+nextCount+" long</label><input class='master_input' type='text' placeholder='branch "+nextCount+" long'  id='branch_long_"+nextCount+"' name='branch_long["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-3 col-xs-4' hidden><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch"+nextCount+" lat</label><input class='master_input' type='text' placeholder='branch "+nextCount+" lat'  id='branch_lat_"+nextCount+"' name='branch_lat["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div></div> ");


      assignAutoCompl("branch_address_"+nextCount,"#branch_long_"+nextCount,"#branch_lat_"+nextCount);
       // var currentCountAr =$('.branch-container-ar').length;
       // var nextCount = currentCountAr + 1 ;
       // $('.branch-container-ar:last').after(" <div class='branch-container-ar'> <div class='col-sm-6 col-xs-12'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch "+nextCount+" name</label><input class='master_input' type='text' placeholder='branch " + nextCount + " name' Required id='branches_"+nextCount+"'><span class='master_message color--fadegreen'></span></div></div></div> ");



       $(function () {
         $('.datepicker').datepicker({autoclose: true});
         $(".timepicker").timepicker({showInputs: false});
       });
            });




    </script>
    <script type="text/javascript">
      $(function () {
        $('.datepicker-popup').pickadate();
        $('.timepicker-popup').pickatime();
      });

      $(function () {
        $('.datepicker').datepicker({autoclose: true});
        $(".timepicker").timepicker({showInputs: false});
      });
    </script>
     <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">





var shop_lat;
var shop_long;
      function initMap() {

        var input = document.getElementById('shop_address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {

          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

           shop_lat = place.geometry.location.lat();
         shop_long= place.geometry.location.lng();
         $('#shop_lat').val(shop_lat);
         $('#shop_long').val(shop_long);
        });



      }
        function assignAutoCompl(_id , long , lat)
      {
          // document.getElementById(_id).hidden = false;
          var _autocomplete = new google.maps.places.Autocomplete(document.getElementById(_id));
          _autocomplete.setTypes(['geocode']);
          google.maps.event.addListener(_autocomplete, 'place_changed', function()
          {
              //processing code
               var place = _autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

           branch_lat = place.geometry.location.lat();
         branch_long= place.geometry.location.lng();
         $(lat).val(branch_lat);
         $(long).val(branch_long);
          });
      }
    </script>
@endsection