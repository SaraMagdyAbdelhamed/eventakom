@extends('layouts.app')
@section('content')
              <!-- =============== Custom Content ===========-==========-->
              <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  {{asset( 'img/covers/dummy2.jpg ' )}}  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h3 class="cover-inside-title  ">Shop and dine</h3>
                          </div>
                        </div>
                      </div>
                      <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="{{route('add_shop')}}">Add new Shop and dine</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           

@endsection


@section('js')
<script type="text/javascript">
      $(document).ready(function(){
        "use strict";
        $('.btn-warning-confirm').click(function(){
           var shop_id = $(this).closest('tr').attr('data-shop-id');
          var _token = '{{csrf_token()}}';
          swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
          },
           function(isConfirm){
        if (isConfirm){
         $.ajax({
           type:'GET',
           url:'{{url('shop_destroy')}}'+'/'+shop_id,
           data:{_token:_token},
           success:function(data){
            // alert('h');
            $('tr[data-shop-id='+shop_id+']').fadeOut();
          }
        });
         swal("تم الحذف!", "تم الحذف بنجاح", "success");
       } else {
        swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
      }
    });
          // function(){
          //   swal("Deleted!", "Your imaginary file has been deleted!", "success");
          // });
        });

        $('.btn-warning-cancel-all').click(function(){
      var selectedIds = $("input:checkbox:checked").map(function(){
        return $(this).closest('tr').attr('data-shop-id');
      }).get();
      if(selectedIds.length == 0 )
      {
        swal("خطأ", "من فضلك اختر  متجر :)", "error");
      }
      else
      {
        // alert(selectedIds);
      var _token = '{{csrf_token()}}';
      swal({
        title: "هل أنت متأكد؟",
        text: "لن تستطيع إسترجاع هذه المعلومة لاحقا",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'نعم متأكد!',
        cancelButtonText: "إلغاء",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm){
         $.ajax({
           type:'POST',
           url:'{{url('shop_destroy_all')}}',
           data:{ids:selectedIds,_token:_token},
           success:function(data){
            $.each( selectedIds, function( key, value ) {
              $('tr[data-shop-id='+value+']').fadeOut();
            });
          }
        });
         swal("تم الحذف!", "تم الحذف بنجاح", "success");
       } else {
        swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
      }
    });
    }
    });
      });
      
      
    </script>
<script type="text/javascript">
  var swiper = new Swiper('.slideperview .swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 3,
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
