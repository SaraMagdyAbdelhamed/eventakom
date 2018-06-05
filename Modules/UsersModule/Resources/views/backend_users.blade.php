@extends('layouts.app')
@section('content')            

@section('js')
<script type="text/javascript">
    function RestrictSpace() {
        if (event.keyCode == 32) {
            return false;
        }
    }
    $(document).ready(function(){
      // "use strict";
      //diable space in enter




      $('.btn-warning-confirm').click(function(){
        var user_id = $(this).closest('tr').attr('data-user-id');
        var _token = '{{csrf_token()}}';
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this user!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#281160',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false
        },
        function(){
         $.ajax({
           type:'POST',
           url:'{{url('mobile_destroy')}}'+'/'+user_id,
           data:{_token:_token},
           success:function(data){
            $('tr[data-user-id='+user_id+']').fadeOut();
          }
        });
          swal("Deleted!", "Your user  has been deleted!", "success");
        });
      });

      $('.btn-warning-confirm-all').click(function(){
        var selectedIds = $("input:checkbox:checked").map(function(){
          return $(this).closest('tr').attr('data-user-id');
        }).get();
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
        function(){
         $.ajax({
           type:'POST',
           url:'{{url('mobile_destroy_all')}}',
           data:{ids:selectedIds,_token:_token},
           success:function(data){
            $.each( selectedIds, function( key, value ) {
              $('tr[data-user-id='+value+']').fadeOut();
            });
          }
        });
         swal("Deleted!", "Your imaginary file has been deleted!", "success");
       });
      });

    });
</script>
    
{{-- add active class to sidebar menu --}}
    <script>
        $(document).ready(function(){
            $('#menu_2').addClass('openedmenu');
            $('#sub_2_2').addClass('pure-active');
        });
    </script>
    @endsection
@endsection