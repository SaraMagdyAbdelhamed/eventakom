<div class="col-lg-12 text-center">
    @if (Session::has('success'))

      <script>
          $(document).ready(function(){
            swal({
              title: 'Success',
              text: '{{ Session::get('success') }}',
              type: 'success',
              showCancelButton: false,
              confirmButtonColor: '#281160',
              confirmButtonText: 'Ok',
              closeOnConfirm: false
            });
          });
      </script>
    @endif

    @if (Session::has('warning'))
    <script>
        $(document).ready(function(){
          swal({
            title: 'Warning',
            text: '{{ Session::get('warning') }}',
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Ok',
            closeOnConfirm: false
          });
        });
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        $(document).ready(function(){
          swal({
            title: 'Error',
            text: '{{ Session::get('error') }}',
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Ok',
            closeOnConfirm: false
          });
        });
    </script>
    @endif

    @if (count($errors->all()))

    <script>
        $(document).ready(function(){

          var errors = `
          @foreach ($errors->all() as $error)
                {{ $error.' ' }}
          @endforeach`;

          swal({
            title: 'Error',
            text: errors,
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#281160',
            confirmButtonText: 'Ok',
            closeOnConfirm: false
          });
        });
    </script>

    @endif



  </div>