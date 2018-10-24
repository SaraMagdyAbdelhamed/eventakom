@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  {{asset( 'img/covers/dummy2.jpg ' )}}  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h3 class="cover-inside-title  ">@lang('keywords.notifications')</h3>
              </div>
            </div>
          </div>
          <div class="cover--actions"><span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="row">
          <div class="col-xs-12">
            <div class="master_field">
              <label class="master_label mandatory">@lang('keywords.sending_noti')</label>
              <input class="icon" type="radio" name="icon" id="radbtn_2_free" checked="true">
              <label for="radbtn_2_free">@lang('keywords.all_users')</label>
              <input class="icon" type="radio" name="icon" id="radbtn_3_paid">
              <label for="radbtn_3_paid">@lang('keywords.custom_users')</label>
            </div>
          </div>
        </div>
        <div class="paid-details">
          <form action="{{ route('add_notification') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-3 col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory">@lang('keywords.gender')</label>
                <div class="funkyradio">
                  <input type="checkbox" name="gender" id="radbtn_2" value="1" checked>
                  <label for="radbtn_2">@lang('keywords.male')</label>
                </div>
                <div class="funkyradio">
                  <input type="checkbox" name="gender" id="radbtn_3" value="0">
                  <label for="radbtn_3">@lang('keywords.female')</label>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="master_field">
                <label class="master_label" for="filter_age">@lang('keywords.age')</label>

                <select class="master_input select2" id="filter_age" multiple="multiple" data-placeholder="Age " style="width:100%;" name="age[]">
                  @foreach($ages as $age)
                    <option value="{{$age['id']}}">{{$age['name']}}</option>
                  @endforeach
                </select>

              </div>
            </div>
            <div class="col-sm-5 col-xs-12">
              <div class="master_field">
                <label class="master_label mandatory" for="category">@lang('keywords.category')</label>

                <select class="master_input select2" id="category" multiple="multiple" data-placeholder="placeholder" style="width:100%;" name="category[]" required>
                  {{-- <option disabled selected > -- please select a category --</option> --}}
                  @foreach($interests as $cat)
                    <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                  @endforeach
                </select>

              </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="master_field">
                <label class="master_label" for="ID_No-12">@lang('keywords.noti_en')</label>
                <textarea class="master_input" name="msg" id="ID_No-12" placeholder="notification content in English" Required></textarea>

                @if ($errors->has('msg'))
                    <span class="master_message inherit">{{ $errors->first('msg') }}</span>
                @endif

              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="master_field">
                <label class="master_label" for="ID_No-13">@lang('keywords.noti_ar')</label>
                <textarea class="master_input" name="msg_ar" id="ID_No-13" placeholder="notification content in Arabic" Required></textarea>
                
                @if ($errors->has('msg_ar'))
                    <span class="master_message inherit">{{ $errors->first('msg_ar') }}</span>
                @endif
                
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
      
        
      </div>
    </div><br><br>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="col-lg-3 col-lg-offset-3 col-md-3 col-sm-6 col-xs-6">
          <button class="master-btn  btn-block color--white  bradius--noborder bshadow--0" type="submit"><span>@lang('keywords.send')</span>
          </button>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
          <button class="master-btn  btn-block color--white bgcolor--fadeblue bradius--noborder bshadow--0" type="button"><span>@lang('keywords.cancel')</span>
          </button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  </form>

@endsection

@section('js')
<script type="text/javascript">
      $( document ).ready(function() {
        $('.paid-details').fadeOut();
        $('label[for="radbtn_3_paid"]').on('click' , function(){
          $('.paid-details').fadeIn(100);
        });
        $('label[for="radbtn_2_free"]').on('click' , function(){
        	$("#filter_age").val("");
        	$("#category").val("");
        	$("#radbtn_2").prop('checked', false);
        	$("#radbtn_3").prop('checked', false);
          $('.paid-details').fadeOut();
        });
      });
    </script>
@endsection