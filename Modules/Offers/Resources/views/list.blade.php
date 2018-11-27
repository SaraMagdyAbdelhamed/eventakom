@extends('layouts.app')

@section('content')

<div class="row">

    {{-- Start Cover --}}
    <div class="col-xs-12">
        <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
            <div class="col-xs-12">
            <div class="text-xs-center">
                <div class="text-wraper">
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.offers')</h4>
                </div>
            </div>
            </div>
            <div class="cover--actions">
                <a class="bradius--no border-btn master-btn" type="button" href="#popupModal_1"> @lang('keywords.addNew')</a>
            </div>
        </div>
        </div>
    </div>
    {{-- End Cover --}}

    {{-- Start Main Content --}}
    <div class="col-xs-12">
        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="full-table">
            <div class="bottomActions__btns">
                <a class="master-btn" href="#" id="deleteSelected">@lang('keywords.deleteSelected')</a>
            </div>
            <form id="dataTableTriggerId_001_form">
            <table class="data-table-trigger table-master" id="dataTableTriggerId_001">
                <thead>
                <tr class="bgcolor--gray_mm color--gray_d">
                    <th><span class="cellcontent">&lt;input type=&quot;checkbox&quot; data-click-state=&quot;0&quot; name=&quot;select-all&quot; id=&quot;select-all&quot; /&gt;</span></th>
                    <th><span class="cellcontent">@lang('keywords.serialNo')</span></th>
                    <th><span class="cellcontent">@lang('keywords.image')</span></th>
                    <th><span class="cellcontent">@lang('keywords.title')</span></th>
                    <th><span class="cellcontent">@lang('keywords.description')</span></th>
                    <th><span class="cellcontent">@lang('keywords.status')</span></th>
                    <th><span class="cellcontent">@lang('keywords.actions')</span></th>
                </tr>
                </thead>
                <tbody>
                    @if ( isset($attractions) && !empty($attractions) )
                        @foreach ($attractions as $attraction)
                            <tr data-id="{{ $attraction->id }}">
                                <td><span class="cellcontent" data-id="{{ $attraction->id }}"></span></td>
                                <td><span class="cellcontent">{{ $loop->index + 1 }}</span></td>
                                <td><span class="cellcontent"><img src = "{{ \App::isLocale('en') ? asset($attraction->image_en) : asset($attraction->image_ar) }}" , class = " img-in-table"></span></td>
                                <td><span class="cellcontent">{{ \App::isLocale('en') ? $attraction->name : Helper::localization('offers', 'name', $attraction->id, 2) }}</span></td>
                                <td><span class="cellcontent">{{ \App::isLocale('en') ? $attraction->description  : Helper::localization('offers', 'description', $attraction->id, 2) }}</span></td>
                                <td><span class="cellcontent"><i class = "fa {{ $attraction->is_active ? 'icon-in-table-true fa-check' : ' icon-in-table-false fa-times' }}"></i></span></td>
                                <td>
                                    <span class="cellcontent">
                                        <a href="#Edit" data-id="{{ $attraction->id }}" class= "action-btn bgcolor--fadegreen color--white editRow"><i class = "fa  fa-pencil"></i></a>
                                        <a href="#" data-id="{{ $attraction->id }}" class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white deleteRecord"><i class = "fa  fa-trash-o"></i></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            </form>

        </div>
        </div>
    </div><br>
    {{-- End Main Content --}}

</div>

{{-- Add Modal --}}
<div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
        <div class="row">
        <div class="col-xs-12">
            <h3>@lang('keywords.placeName')</h3>
        </div>
        <div class="col-xs-12">
            <h4 id="uploading"></h4>
            <form action="" method="POST" enctype="multipart/form-data" id="addForm">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <div class="row">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="tabs--wrapper">
                        <div class="clearfix"></div>
                        {{-- Tabs --}}
                        <ul class="tabs">
                            <li id="arabic">العربية</li>
                            <li id="english">English</li>
                        </ul>
                        {{-- End Tabs --}}
                        <ul class="tab__content">
                            {{-- Arabic Content Right Side --}}
                            <li class="tab__content_item active" id="arabic-content">
                                <div class="col-xs-12">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="master_field">
                                        <label class="master_label" for="upload img">اضف صورة العرض</label>
                                        <div class="file-upload">
                                        <div class="file-select">
                                            {{-- Input: Arabic Image --}}
                                            <div class="file-select-name" id="noFile">من فضلك اضف صورة</div>
                                            <input class="chooseFile" type="file" name="image_ar" id="image_ar" Required>

                                        </div>
                                        </div>
                                        <span class="master_message inherit" id="image_ar_error"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- Input: Arabic Image Name --}}
                                    <label class="master_label" for="Offer_title">اضف اسم الصورة</label>
                                    <input class="master_input" type="text" name="image_ar_name" max="100"
                                        placeholder="Offer title" Required id="Offer_title" value="{{ old('image_ar_name') }}">
                                    <span class="master_message inherit"></span>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- textarea: Arabic Image Description --}}
                                    <label class="master_label" for="Offer_Description">اضف وصفا للصورة</label>
                                    <textarea class="master_input" name="image_ar_description" id="Offer_Description" maxlength="255"
                                        placeholder="Offer Description" Required>{{ old('image_ar_description') }}</textarea>
                                    <span class="master_message inherit"></span>
                                </div>
                                </div>
                            </li>

                            {{-- English Content Left Side --}}
                            <li class="tab__content_item" id="english-content">
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    <label class="master_label" for="upload img">Offer image in English</label>
                                    <div class="file-upload">
                                    <div class="file-select">
                                        {{-- Input: English Image --}}
                                        <div class="file-select-name" id="noFile">please Offer image</div>
                                        <input class="chooseFile" type="file" name="image_en" id="image_en" Required>

                                    </div>
                                    </div>
                                    <span class="master_message inherit" id="image_en_error"></span>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- Input: English Image Name --}}
                                    <label class="master_label" for="Offer_title">Offer title in English</label>
                                    <input class="master_input" type="text" name="image_en_name" max="100"
                                        placeholder="Offer title" Required id="Offer_title" value="{{ old('image_en_name') }}">
                                    <span class="master_message inherit"></span>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- Input: English Image Description --}}
                                    <label class="master_label" for="Offer_Description">Offer Description in English</label>
                                    <textarea class="master_input" name="image_en_description" maxlength="255"
                                        id="Offer_Description" placeholder="Offer Description" Required>{{ old('image_en_description') }}</textarea>
                                    <span class="master_message inherit"></span>
                                </div>
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    {{-- Checkbox --}}
                    <div class="col-sm-12 col-xs-12">
                        <div class="master_field">
                            <label class="master_label" for="Offers_and_deals_status">@lang('keywords.Active')</label>
                            <input class="make-switch" type="checkbox" name="offer_status" value="1" checked data-on-text="Active" data-off-text="inActive">
                        </div>
                    </div>
                    {{-- End Checkbox --}}

                    {{-- Submit & Cancel Buttons --}}
                    <div class="col-xs-12">
                        <button class="remodal-cancel" data-remodal-action="cancel">@lang('keywords.cancel')</button>
                        <button class="remodal-confirm" type="submit" id="addSubmit">@lang('keywords.save')</button>
                    </div>
                    {{-- End Submit & Cancel Buttons --}}

                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
{{-- End Add Modal --}}

{{-- Edit Modal --}}
<div class="remodal" data-remodal-id="Edit" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
        <div class="row">
        <div class="col-xs-12">
            <h3>@lang('keywords.edit')</h3>
        </div>
        <h4 id="uploading1"></h4>
        <div class="col-xs-12">
            <form method="POST" enctype="multipart/form-data" id="editForm">
                {{ csrf_field() }}
                <input type="hidden" name="id">

                <div class="row">
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="tabs--wrapper">
                        <div class="clearfix"></div>
                        {{-- Tabs --}}
                        <ul class="tabs">
                            <li id="arabic1">العربية</li>
                            <li id="english1">English</li>
                        </ul>
                        {{-- End Tabs --}}
                        <ul class="tab__content">
                            {{-- Arabic Content right side --}}
                            <li class="tab__content_item active" id="arabic1-content">
                                <div class="col-xs-12">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    <label class="master_label" for="upload img">اضف صورة العرض</label>
                                    <div class="file-upload">
                                    <div class="file-select">
                                        {{-- Input: Arabic Image --}}
                                        <div class="file-select-name" id="noFile">من فضلك اضف صورة</div>
                                        <input class="chooseFile" name="image_ar1" type="file" id="image_ar1" >
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- Input: Arabic Image Name --}}
                                    <label class="master_label" for="Offer_title">اضف اسم الصورة</label>
                                    <input class="master_input" name="image_ar_name1" type="text" max="100"
                                        placeholder="Offer title" Required id="Offer_title" value="">
                                        <span class="master_message inherit"></span>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- textarea: Arabic Image Description --}}
                                    <label class="master_label" for="Offer_Description">اضف وصفا للصورة</label>
                                    <textarea class="master_input" name="image_ar_description1" id="Offer_Description" maxlength="255"
                                        placeholder="Offer Description" Required></textarea>
                                        <span class="master_message inherit"></span>
                                </div>
                                </div>
                            </li>

                            {{-- English Content left side --}}
                            <li class="tab__content_item" id="english1-content">
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    <label class="master_label" for="upload img">Offer image in English</label>
                                    <div class="file-upload">
                                    <div class="file-select">
                                        {{-- Input: English Image --}}
                                        <div class="file-select-name" id="noFile">please Offer image</div>
                                        <input class="chooseFile" type="file" name="image_en1" id="image_en1" >
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- Input: English Image Name --}}
                                    <label class="master_label" for="Offer_title">Offer title in English</label>
                                    <input class="master_input" type="text" name="image_en_name1" max="100"
                                        placeholder="Offer title" Required id="Offer_title" value="">
                                        <span class="master_message inherit"></span>
                                </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                <div class="master_field">
                                    {{-- textarea: English Image Description --}}
                                    <label class="master_label" for="Offer_Description">Offer Description in English</label>
                                    <textarea class="master_input" id="Offer_Description" name="image_en_description1" maxlength="255"
                                        placeholder="Offer Description" Required></textarea>
                                        <span class="master_message inherit"></span>
                                </div>
                                </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    {{-- Checkbox --}}
                    <div class="col-sm-12 col-xs-12">
                        <div class="master_field">
                            <label class="master_label" for="Offers_and_deals_status">@lang('keywords.Active')</label>
                            <input class="make-switch" type="checkbox" name="offer_status_1" checked data-on-text="Active" data-off-text="inActive">
                        </div>
                    </div>
                    {{-- End Checkbox --}}

                    {{-- Submit & Cancel Buttons --}}
                    <div class="col-xs-12">
                        <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
                        <button class="remodal-confirm" type="submit">Save</button>
                    </div>
                    {{-- End Submit & Cancel Buttons --}}

                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
{{-- End Edit --}}


{{-- Start Scripts --}}
<script>
    $(document).ready(function(){
        // Sidebar Active Class
        $('#menu_6').addClass('openedmenu');
        $('#sub_6_1').addClass('pure-active');

        // AJAX Add New Offer
        $('#addForm').submit(function(e){
            // prevent form from actual submit
            e.preventDefault();
            $("#addSubmit").attr('disabled', true);

            var image_ar = document.getElementById("image_ar");
            var image_en = document.getElementById("image_en");

            var file_ar = image_ar.files[0];
            var file_en = image_en.files[0];
            var data = new FormData();

            data.append('image_ar', file_ar);
            data.append('image_en', file_en);
            data.append('image_ar_name', $("input[name=image_ar_name]").val());
            data.append('image_ar_desc', $("textarea[name=image_ar_description]").val());
            data.append('image_en_name', $("input[name=image_en_name]").val());
            data.append('image_en_desc', $("textarea[name=image_en_description]").val());
            if ( $("input[name=offer_status]").is(':checked') ) {
                data.append('offer_status' , $("input[name=offer_status]").val());
            }

            // view loading
            $("#uploading").text('Uploading...').css('color', 'blue');

            var token = '{{ csrf_token() }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('offers.store') }}",
                type: 'POST',
                data: data,
                enctype: 'multipart/form-data',

                contentType: false,
                processData: false,

                success: function (data)
                {
                    window.location.replace('{{ route('offers.list') }}');
                },
                    error: function(response) {
                    console.log( response.responseJSON );
                }
            });
        });

        // delete multi
        $('#deleteSelected').click(function(){
            var allVals = [];                   // selected IDs
            var token = '{{ csrf_token() }}';

            // push IDs selected by user
            $('input.input-in-table:checked').each(function() {
                allVals.push( $(this).closest('tr').data("id") );
            });

            // check if user selected nothing
            if(allVals.length <= 0) {
            confirm('إختر عميل علي الاقل لتستطيع حذفه');
            } else {
            var ids = allVals;    // join array of IDs into a single variable to explode in controller

            var title = "{{ \App::isLocale('en') ? 'Are you sure?' : 'هل أنت متأكد؟' }}";
            var text  = "{{ \App::isLocale('en') ? 'You wont be able to fetch this information later!' : 'لن تستطيع إسترجاع هذه المعلومة لاحقا' }}";

            swal({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#281160',
            confirmButtonText: "{{ \App::isLocale('en') ? 'Yes, delete it!' : 'نعم احذفه' }}",
            cancelButtonText: "{{ \App::isLocale('en') ? 'Cancel' : 'إالغاء' }}",
            closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){

                $.ajax(
                {
                    url: "{{ route('offers.deleteSelected') }}",
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

            var title = "{{ \App::isLocale('en') ? 'Are you sure?' : 'هل أنت متأكد؟' }}";
            var text  = "{{ \App::isLocale('en') ? 'You wont be able to fetch this information later!' : 'لن تستطيع إسترجاع هذه المعلومة لاحقا' }}";

            swal({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#281160',
            confirmButtonText: "{{ \App::isLocale('en') ? 'Yes, delete it!' : 'نعم احذفه' }}",
            cancelButtonText: "{{ \App::isLocale('en') ? 'Cancel' : 'إالغاء' }}",
            closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){

                $.ajax(
                {
                    url: "{{ route('offers.delete') }}",
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

        // AJAX: get record info & set it to the fields
        $('.editRow').click(function(){
            // Get ID of that record
            var id = $(this).data("id");

            // AJAX call to get record data
            $.ajax({
                url: "{{ route('offers.edit') }}",
                type: 'GET',
                data: {id: id},

                // On success, set retrieved data to edit input fields
                success: function (data)
                {
                    $("input[name=id]").val(id);
                    $("input[name=image_ar_name1]").val(data.name_ar);
                    $("textarea[name=image_ar_description1]").val(data.desc_ar);
                    $("input[name=image_en_name1]").val(data.name_en);
                    $("textarea[name=image_en_description1]").val(data.desc_en);
                    if(data.is_active) {
                        $("input[name=offer_status_1]").prop('checked', true);
                    } else {
                        $("input[name=offer_status_1]").prop('checked', false);
                    }
                },
                    error: function(response) {
                    console.log( response.responseJSON );
                }
            });


        });

        // AJAX Edit Offer
        $('#editForm').submit(function(e){
            // prevent form from actual submit
            e.preventDefault();
            var data = new FormData();

            var image_ar1 = document.getElementById("image_ar1");
            var image_en1 = document.getElementById("image_en1");

            if(image_ar1.files[0]) {
                var file_ar1 = image_ar1.files[0];
                data.append('image_ar', file_ar1);
            }
            if(image_en1.files[0]) {
                var file_en1 = image_en1.files[0];
                data.append('image_en', file_en1);
            }

            data.append('id', $("input[name=id]").val());
            data.append('image_ar_name', $("input[name=image_ar_name1]").val());
            data.append('image_ar_desc', $("textarea[name=image_ar_description1]").val());
            data.append('image_en_name', $("input[name=image_en_name1]").val());
            data.append('image_en_desc', $("textarea[name=image_en_description1]").val());
            if ( $("input[name=offer_status_1]").is(':checked') ) {
                data.append('offer_status' , 1);
            } else {
                data.append('offer_status' , 0);
            }

            // view loading
            $("#uploading1").text('Uploading...').css('color', 'blue');

            var token = '{{ csrf_token() }}';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('offers.update') }}",
                type: 'POST',
                data: data,
                enctype: 'multipart/form-data',

                contentType: false,
                processData: false,

                success: function (response)
                {
                    window.location.replace('{{ route('offers.list') }}');
                },
                    error: function(response) {
                    console.log( response.responseJSON );
                }
            });
        });
    });
</script>

{{-- Check Image before uploading --}}
<script>
var image_size1 = 0;    // arabic image size
var image_size2 = 0;    // english image size

$(document).ready(function(){
    $('#image_ar').on('change', function() {
        image_size1 = this.files[0].size / 1024;
        checkImageSize('#image_ar', 1024, '#addSubmit', '#image_ar_error');
    });

    $('#image_en').on('change', function() {
        image_size2 = this.files[0].size / 1024;
        checkImageSize('#image_en', 1024, '#addSubmit', '#image_en_error');
    });
});

function checkImageSize(input, maxSize, submitBtnId, error_msg_id) {
    // size of the image
    var imageSizeInMB = ($(input)[0].files[0].size) / 1024;

    if (imageSizeInMB <= maxSize && image_size1 <= maxSize && image_size2 <= maxSize) {
        $(submitBtnId).prop('disabled', false);
    } else {
        $(submitBtnId).prop('disabled', true);
    }

    if (imageSizeInMB <= maxSize) {
        $(error_msg_id).text("Image size is perfect!").css('color', 'blue');
    } else {
        $(error_msg_id).text("Image max size is 5MB (5120KB).").css('color', 'red');
    }
}
</script>

{{-- End Scripts --}}

@endsection