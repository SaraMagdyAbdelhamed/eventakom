@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )   ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">
              <div class="text-wraper">
                <h4 class="cover-inside-title">@lang('keywords.events')</h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.bigevents')</h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><span></span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-12">
      <h5 style="text-align:center;">@lang('keywords.bigevents_description')</h5>
    </div><br>
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="two-divs-select">
          <div class="row">
            <div class="col-xs-12">
              <div class="master_field">
                <div class="form-message"></div>
                <label class="master_label mandatory" for="sort_list">@lang('keywords.sort_list')</label>
                <select class="master_input" id="sort_list">
                  <option value="1">@lang('keywords.All Events')</option>
                  <option value="2">@lang('keywords.Suggested Events')</option>
                </select>
              </div>
            </div>

            {{-- All events which aren't big events --}}
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
              <select class="select_big_event" id="multiselect" name="from[]" size="8" multiple="multiple">
                @foreach($events as $event)
                  <option value="{{$event->id}}">{{$event->nameMultilang}}</option>
                @endforeach
              </select>
            </div>
            {{-- End --}}


            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <button class="btn btn-block" id="multiselect_rightSelected" type="button"><i class="{{\App::isLocale('en') ?'fa fa-chevron-right':'fa fa-chevron-left'}}"></i></button>
              <button class="btn btn-block" id="multiselect_leftSelected" type="button"><i class="{{\App::isLocale('en') ?'fa fa-chevron-left':'fa fa-chevron-right'}}"></i></button>
            </div>

            {{-- Big Events --}}
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
              <select class="select_big_event" id="multiselect_to" name="to[]" size="8" multiple="multiple">
                @if ( !empty($big_events) )
                  @foreach($big_events as $bevent)
                    @if ( isset( $bevent) && !empty($bevent) && !empty($bevent->event))
                      <option value="{{$bevent->event_id}}">{{$bevent->event->nameMultilang}}</option>
                    @endif
                  @endforeach
                @endif
              </select>
              <div class="row">
                <div class="col-sm-6">
                  <button class="btn btn-block" id="multiselect_move_up" type="button"><i class="fa fa-arrow-up"></i></button>
                </div>
                <div class="col-sm-6">
                  <button class="btn btn-block col-sm-6" id="multiselect_move_down" type="button"><i class="fa fa-arrow-down"></i></button>
                </div>
              </div>
            </div>
            {{-- End --}}

          </div>
        </div>
        <button class="remodal-confirm col-sm-4" id="submitOrder" type="submit">@lang('keywords.save')</button>
        <div class="clearfix"></div>

      </div>
    </div>
  </div>

  @section('js')
  <script>
    $('#sort_list').on('change', function (e) {
      var optionSelected = $("option:selected", this);
      var valueSelected = this.value;
      // if(valueSelected == 2){
      $('#multiselect option').remove();
      // $('#multiselect_to option').remove();
      var _token = '{{csrf_token()}}';
      $.ajax({
        type: 'POST',
        url: '{{url('bigevents_select')}}' + '/' + valueSelected,
        data: {
          _token: _token
        },
        success: function (data) {

          // .each loops through the array
          $.each(data, function (i) {
            $("#multiselect").append(data[i]);
          });
        }
      });
      // }
    });
  </script>

  <script type="text/javascript">
    $('#multiselect').multiselect({
      search: {
        left: '<input type="text" name="q" class="master_input" placeholder="Search..." />',
        right: '<input type="text" name="q" class="master_input" placeholder="Search..." />',
      },
      fireSearch: function (value) {
        return value.length > 3;
      },
      keepRenderingSort: true
    });
  </script>

  <script>
    var values_post = new Array();

    function validate(e) {

      var values = new Array();
      $('#multiselect_to option').each(function () {
        if ($.inArray(this.value, values) > -1) {
          $(this).remove()
          alert("@lang('keywords.duplicatedBevents')");
        } else {
          if (values.length >= 5) {
            $(this).remove()
            alert("@lang('keywords.limit5Bevents')");
          } else {
            values.push(this.value);
          }

        }
      });
      values_post = values;
    }


function saveSort(e) {


    if ( !($('#multiselect_to').has('option').length > 0)) {
           var title = "{{ \App::isLocale('en') ? 'Are you sure you?' : 'هل أنت متأكد؟' }}";
    //  var text  = "{{ \App::isLocale('en') ? 'You wont be able to fetch this information later!' : 'لن تستطيع إسترجاع هذه المعلومة لاحقا' }}";
  var text  = "@lang('keywords.confirmRemove')";
      swal({
      title: title,
      text: text,
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#281160',
      confirmButtonText: "{{ \App::isLocale('en') ? 'Yes!' : 'نعم ' }}",
      cancelButtonText: "{{ \App::isLocale('en') ? 'Cancel' : 'إالغاء' }}",
      closeOnConfirm: true
      },
      function(isConfirm){
          if (isConfirm){

           var _token = '{{csrf_token()}}';
    $.ajax({
      type: 'POST',
      url: '{{url('bigevents_remove')}}',
      data: { _token: _token},
      success: function (data) {
        $( "#form_message" ).remove();
        $(".form-message").append(data);
        $( "#form_message" ).delay(1000).fadeToggle( "slow", "linear" );
        $('#multiselect_to option').remove();
        //values_post = new Array();

      }
    });
          } else {
              swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
          }
      });

    } else{
  if (typeof values_post !== 'undefined' && values_post.length > 0) {


var _token = '{{csrf_token()}}';
    $.ajax({
      type: 'POST',
      url: '{{url('bigevents_post')}}',
      data: { _token: _token  , big_events: values_post },
      success: function (data) {
        $( "#form_message" ).remove();
        $(".form-message").append(data);
        $( "#form_message" ).delay(1000).fadeToggle( "slow", "linear" );
        //values_post = new Array();

      }
    });
  }
 else{
 alert("@lang('keywords.sortThenSave')");
  //validate();
     }

   } //end else multiselect_to not empty
}

$('#multiselect_rightSelected').click(validate);
$('#multiselect_move_up').click(validate);
$('#multiselect_move_down').click(validate);
$('#multiselect_leftSelected').click(validate);
document.getElementById('multiselect').ondblclick = function(){
    validate();

};
document.getElementById('multiselect_to').ondblclick = function(){
    validate();

};
$('#submitOrder').click(saveSort);


function bigEventsRemove(e) {



var _token = '{{csrf_token()}}';
    $.ajax({
      type: 'POST',
      url: '{{url('bigevents_remove')}}',
      data: { _token: _token},
      success: function (data) {
        $( "#form_message" ).remove();
        $(".form-message").append(data);
        $( "#form_message" ).delay(1000).fadeToggle( "slow", "linear" );
        $('#multiselect_to option').remove();
        //values_post = new Array();

      }
    });
  }



$('#bigEventsRemove').click(bigEventsRemove);
   </script>
@endsection @endsection
