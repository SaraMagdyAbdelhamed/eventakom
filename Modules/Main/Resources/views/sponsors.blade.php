@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '{{ asset('img/covers/dummy2.jpg')}}' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title">@lang('keywords.mainData') </h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.sponsors')</h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="#popupModal_1">@lang('keywords.addNew')</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="full-table">
          <div id="deleteSelected" class="bottomActions__btns"><a class="master-btn" href="#">delete selected</a>
          </div>
          <form id="dataTableTriggerId_001_form">
            <table class="data-table-trigger table-master" id="dataTableTriggerId_001">
              <thead>
                <tr class="bgcolor--gray_mm color--gray_d">
                  <th><span class="cellcontent">&lt;input type=&quot;checkbox&quot; data-click-state=&quot;0&quot; name=&quot;select-all&quot; id=&quot;select-all&quot; /&gt;</span></th>
                  <th><span class="cellcontent">serial No</span></th>
                  <th><span class="cellcontent">Sponsors logo</span></th>
                  <th><span class="cellcontent">Sponsors name</span></th>
                  <th><span class="cellcontent">Actions</span></th>
                </tr>
              </thead>
              <tbody>


                @if ( isset($sponsors) && !empty($sponsors) )
                    @foreach ($sponsors as $sponsor)
                        <tr data-id="{{ $sponsor->id }}">
                            <td><span class="cellcontent" data-id="{{ $sponsor->id }}"></span></td>
                            <td><span class="cellcontent">{{ $sponsor->id }}</span></td>
                            <td><span class="cellcontent"><img src="{{ Session::get('locale') == 'ar' ?  asset($sponsor->logo_ar ? $sponsor->logo_ar : '') : asset($sponsor->logo_en ? $sponsor->logo_en : '') }}" class = " img-in-table" alt="@lang('keywords.noImage')"></span></td>
                            <td><span class="cellcontent">{{ App::isLocale('en') ? $sponsor->name : Helper::localization('sponsors', 'sponsors', $sponsor->id, 2) }}</span></td>
                            <td>
                                <span class="cellcontent">
                                    <a href="#popupModal_2" data-id="{{ $sponsor->id }}" data-english-sponsor="{{ $sponsor->name }}" data-arabic-sponsor="{{  Helper::localization('sponsors', 'sponsors', $sponsor->id, 2) }}" class= "action-btn bgcolor--fadegreen color--white editRow"><i class = "fa  fa-pencil"></i></a>
                                    <a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white deleteRecord" data-id="{{ $sponsor->id }}"><i class = "fa  fa-trash-o"></i></a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endif


              </tbody>
            </table>
          </form>
          <div class="remodal log-custom" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
            <div>
              <h2 class="title">title of the changing log in</h2>
              <div class="log-content">
                <div class="log-container">
                  <table class="log-table">
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <th>log title</th>
                      <th>user</th>
                      <th>time</th>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>January</td>
                      <td>$100</td>
                      <td>$100</td>
                    </tr>
                    <tr class="log-row" data-link="https://www.google.com.eg/">
                      <td>February</td>
                      <td>$80</td>
                      <td>$80</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br>
  </div>

{{-- Add modal --}}
<div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" id="modal1">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
        <div class="row">
        <div class="col-lg-12">
            <h3>@lang('keywords.addcat')</h3>
        </div>

        <form action="{{ route('sponsor.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="tabs--wrapper">
                <div class="clearfix"></div>
                <ul class="tabs">
                  <li id="arabic">Arabic</li>
                  <li id="english">English</li>
                </ul>
                <ul class="tab__content">
                  <li class="tab__content_item active" id="arabic-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="master_field">
                        <label class="master_label" for="new_cat">sponsor name in Arabic</label>
                        <input class="master_input" type="text" placeholder="sponsor name" Required id="new_cat" name="arabic">
                        @if ($errors->has('arabic'))
                          <span class="master_message color--fadegreen">{{ $errors->first('arabic') }}</span>
                        @endif
                      </div>
                      <div class="master_field">
                        <label class="master_label" for="ID_No-11">sponsor logo in Arabic </label>
                        <div class="file-upload">
                          <div class="file-select">
                            <div class="file-select-name" id="noFile">click to add sponsor logo</div>
                            <input class="chooseFile" type="file" id="ID_No-11" Required name="logoAr">
                            @if ($errors->has('logoAr'))
                              <span class="master_message color--fadegreen">{{ $errors->first('logoAr') }}</span>
                            @endif
                          </div>
                        </div><span class="master_message inherit">png,jpg and max size is 5MB</span>
                      </div>
                    </div>
                  </li>
                  <li class="tab__content_item" id="english-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="master_field">
                        <label class="master_label" for="new_cat_2">sponsor name in English</label>
                        <input class="master_input" type="text" placeholder="sponsor name" Required id="new_cat_2" name="english">
                        @if ($errors->has('englishSponsor'))
                          <span class="master_message color--fadegreen">{{ $errors->first('englishSponsor') }}</span>
                        @endif
                      </div>
                      <div class="master_field">
                        <label class="master_label" for="ID_No-11">sponsor logo in English</label>
                        <div class="file-upload">
                          <div class="file-select">
                            <div class="file-select-name" id="noFile">click to add sponsor logo</div>
                            <input class="chooseFile" type="file" id="ID_No-11" Required name="logoEn">
                            @if ($errors->has('logoEn'))
                              <span class="master_message color--fadegreen">{{ $errors->first('logoEn') }}</span>
                            @endif
                          </div>
                        </div><span class="master_message inherit">png,jpg and max size is 5MB</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
              <button class="remodal-confirm" type="submit">save</button>
              <button class="remodal-confirm" data-remodal-action="confirm" disabled>save disabled</button>
            
        </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div class="remodal" data-remodal-id="popupModal_2" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" id="modal2">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
        <div class="row">
        <div class="col-lg-12">
            <h3>@lang('keywords.addcat')</h3>
        </div>

        <form action="{{ route('sponsor.edit') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

          <input type="hidden" name="hiddenID" id="hiddenID">

            <div class="tabs--wrapper">
                <div class="clearfix"></div>
                <ul class="tabs">
                  <li id="arabic">Arabic</li>
                  <li id="english">English</li>
                </ul>
                <ul class="tab__content">
                  <li class="tab__content_item active" id="arabic-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="master_field">
                        <label class="master_label" for="new_cat">sponsor name in Arabic</label>
                        <input class="master_input" type="text" placeholder="sponsor name" Required id="arabicEdit" name="arabic">

                      </div>
                      <div class="master_field">
                        <label class="master_label" for="ID_No-11">sponsor logo in Arabic </label>
                        <div class="file-upload">
                          <div class="file-select">
                            <div class="file-select-name" id="noFile">click to add sponsor logo</div>
                            <input class="chooseFile" type="file" id="ID_No-11" name="logoAr">
                            @if ($errors->has('logoAr'))
                              <span class="master_message color--fadegreen">{{ $errors->first('logoAr') }}</span>
                            @endif
                          </div>
                        </div><span class="master_message inherit">png,jpg and max size is 5MB</span>
                      </div>
                    </div>
                  </li>
                  <li class="tab__content_item" id="english-content">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="master_field">
                        <label class="master_label" for="new_cat_2">sponsor name in English</label>
                        <input class="master_input" type="text" placeholder="sponsor name" Required id="englishEdit" name="english">
                        @if ($errors->has('englishSponsor'))
                          <span class="master_message color--fadegreen">{{ $errors->first('englishSponsor') }}</span>
                        @endif
                      </div>
                      <div class="master_field">
                        <label class="master_label" for="ID_No-11">sponsor logo in English</label>
                        <div class="file-upload">
                          <div class="file-select">
                            <div class="file-select-name" id="noFile">click to add sponsor logo</div>
                            <input class="chooseFile" type="file" id="ID_No-11" name="logoEn">
                            @if ($errors->has('logoEn'))
                              <span class="master_message color--fadegreen">{{ $errors->first('logoEn') }}</span>
                            @endif
                          </div>
                        </div><span class="master_message inherit">png,jpg and max size is 5MB</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
              <button class="remodal-confirm" type="submit">save</button>
              <button class="remodal-confirm" data-remodal-action="confirm" disabled>save disabled</button>
            
        </form>
        </div>
    </div>
</div>
        
<script>
    $(document).ready(function() {

        // delete multi
        $('#deleteSelected').click(function(){
            var allVals = [];                   // selected IDs
            var token = '{{ csrf_token() }}';

            // push cities IDs selected by user
            $('input.input-in-table:checked').each(function() {
                allVals.push( $(this).data("id") );
            });

            // check if user selected nothing
            if(allVals.length <= 0) {
            confirm('إختر عميل علي الاقل لتستطيع حذفه');
            } else {
            var ids = allVals;    // join array of IDs into a single variable to explode in controller

            swal({
            title: "هل أنت متأكد؟",
            text: "لن تستطيع إسترجاع هذه المعلومة لاحقا",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){
                    
                $.ajax(
                {
                    url: "{{ route('sponsor.deleteSelected') }}",
                    type: 'POST',
                    dataType: "JSON",
                    data: {
                        "ids": ids,
                        "_method": 'POST',
                        "_token": token,
                    },
                    success: function ()
                    {
                        swal("تم الحذف!", "تم الحذف بنجاح", "success");

                        // fade out selected checkboxes after deletion
                        $.each(allVals, function( index, value ) {
                            $('tr[data-id='+value+']').fadeOut();
                        });
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
                } else {
                swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
                }
            });
            }
        });

        // delete a row
        $('.deleteRecord').click(function(){
            
            var id = $(this).data("id");
            var token = '{{ csrf_token() }}';

            swal({
            title: "هل أنت متأكد؟",
            text: "لن تستطيع إسترجاع هذه المعلومة لاحقا",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){
                        
                $.ajax(
                {
                    url: "{{ route('sponsor.delete') }}",
                    type: 'POST',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'POST',
                        "_token": token,
                    },
                    success: function ()
                    {
                        swal("تم الحذف!", "تم الحذف بنجاح", "success");
                        $('tr[data-id='+id+']').fadeOut();
                    },
                        error: function(response) {
                        console.log(response);
                    }
                });
                    
                } else {
                    swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
                }
            });
        });


        $('.editRow').click(function(){

            $('#modal1').remove();

            var id      = $(this).data("id");
            var english = $(this).data("english-sponsor");
            var arabic  = $(this).data("arabic-sponsor");

            $('#hiddenID').val(id);
            $('#arabicEdit').val(arabic);
            $('#englishEdit').val(english);
            
        });

        $('#addNewCat').click(function(){
            // $('modal1').append("\
            // <div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc" id="modal1">\
            //     <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>\
            //     <div>\
            //       <div class="row">\
            //         <div class="col-lg-12">\
            //           <h3>@lang('keywords.addcat')</h3>\
            //         </div>\
            //         <form action="{{ route('event.add') }}" method="POST">\
            //             {{ csrf_field() }}\
            //             <div class="col-xs-12">\
            //                 <div class="tabs--wrapper">\
            //                 <div class="clearfix"></div>\
            //                 <ul class="tabs">\
            //                     <li id="arabic">العربية</li>\
            //                     <li id="english">English</li>\
            //                 </ul>\
            //                 <ul class="tab__content">\
            //                     <li class="tab__content_item active" id="arabic-content">\
            //                     <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">\
            //                         <div class="master_field">\
            //                         <label class="master_label" for="cat_id_ar">اضف الحدث باللغة العربية</label>\
            //                         <input name="arabicContent" class="master_input" type="text" placeholder="new categories in arabic"  id="cat_id_ar" >\
            //                         </div>\
            //                     </div>\
            //                     </li>\
            //                     <li class="tab__content_item" id="english-content">\
            //                     <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">\
            //                         <div class="master_field">\
            //                         <label class="master_label" for="cat_id_en">Add event name in English</label>\
            //                         <input name="englishContent" class="master_input" type="text" placeholder="new categories in English" id="cat_id_en" >\
            //                         </div>\
            //                     </div>\
            //                     </li>\
            //                 </ul>\
            //                 </div>\
            //                 <div class="col-xs-12">\
            //                 <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>\
            //                 <button type="submit" class="remodal-confirm">save</button>\
            //                 <button class="remodal-confirm" data-remodal-action="confirm" disabled>save disabled</button>\
            //                 </div>\
            //             </div>\
            //         </form>\
            //       </div>\
            //     </div>\
            //   </div>\
            // ");
        });


    });
</script>
        
@endsection