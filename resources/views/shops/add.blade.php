@extends('layouts.app')

@section('content')

              <!-- =============== Custom Content ===========-==========-->
              <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="add-mode">Adding mode</div>
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h3 class="cover-inside-title  ">Shop and dine</h3>
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
                    <form id="horizontal-pill-steps" action="{{route('add_shop_data')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                      {{ csrf_field() }}
                      <h3>Info in English</h3>
                      <fieldset>
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Place_name">Place name</label>
                              <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name" name="place_name"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Place_name">Place name in arabic</label>
                              <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name" name="place_name_ar"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>
                           <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Place_address">Place Address</label>
                              <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_address" name="place_address"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>

                          <div class="col-xs-4">
                              <div class="master_field">
                                <label class="master_label" for="start_time">start date time</label>
                                <div class="bootstrap-timepicker">
                                  <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time"name="shop_start">
                                </div><span class="master_message inherit">message content</span>
                              </div>
                            </div>
                            <div class=" col-xs-4">
                              <div class="master_field">
                                <label class="master_label" for="end_time">end date time</label>
                                <div class="bootstrap-timepicker">
                                  <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time" name="shop_end">
                                </div><span class="master_message inherit">message content</span>
                              </div>
                            </div>
                          
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Phone_number">Phone number</label>
                              <input class="master_input" type="tel" placeholder="0020123456789" Required id="Phone_number" name="phone"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Website">Website</label>
                              <input class="master_input" type="url" placeholder="www.domain.com" Required id="Website" name="website"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Other_info">Other info</label>
                              <textarea class="master_input" name="info" id="Other_info" placeholder="Other info" Required></textarea><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="master_field">
                              <label class="master_label" for="Other_info">Other info in arabic</label>
                              <textarea class="master_input" name="info_ar" id="Other_info_ar" placeholder="Other info" ></textarea><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-sm-12 col-xs-12">
                            <div class="master_field">
                              <label class="master_label">Opening days</label>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[1]" id="Opening_days_1">
                                <label for="Opening_days_1">saturday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[2]" id="Opening_days_2">
                                <label for="Opening_days_2">sunday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[3]" id="Opening_days_3">
                                <label for="Opening_days_3">monday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[4]" id="Opening_days_4">
                                <label for="Opening_days_4">tuesday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[5]" id="Opening_days_5">
                                <label for="Opening_days_5">wednesday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[6]" id="Opening_days_6">
                                <label for="Opening_days_6">thursday</label>
                              </div>
                              <div class="funkyradio">
                                <input type="checkbox" name="days[7]" id="Opening_days_7">
                                <label for="Opening_days_7">friday</label>
                              </div>
                            </div>
                          </div>
                          <div class="branch-container">
                            {{-- <div class="col-sm-2 col-xs-4">
                              <div class="master_field">
                                <label class="master_label" for="branches_1">branch 1 name</label>
                                <input class="master_input" type="text" placeholder="branch 1 name" Required id="branches_1" name="branch_name[1]"><span class="master_message color--fadegreen">message</span>
                              </div>
                            </div>
                            <div class="col-sm-3 col-xs-4">
                              <div class="master_field">
                                <label class="master_label" for="branches_1">branch 1 name in arabic</label>
                                <input class="master_input" type="text" placeholder="branch 1 name" Required id="branches_1" name="branch_name_ar[1]"><span class="master_message color--fadegreen">message</span>
                              </div>
                            </div>
                            <div class="col-sm-3 col-xs-4">
                              <div class="master_field">
                                <label class="master_label" for="branches_1">branch 1 address</label>
                                <input class="master_input" type="text" placeholder="branch 1 address" Required id="branches_1" name="branch_address[1]"><span class="master_message color--fadegreen">message</span>
                              </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                              <div class="master_field">
                                <label class="master_label" for="start_time">start date time</label>
                                <div class="bootstrap-timepicker">
                                  <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time"name="branch_start[1]">
                                </div><span class="master_message inherit">message content</span>
                              </div>
                            </div>
                            <div class="col-sm-2 col-xs-6">
                              <div class="master_field">
                                <label class="master_label" for="end_time">end date time</label>
                                <div class="bootstrap-timepicker">
                                  <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time" name="branch_end[1]">
                                </div><span class="master_message inherit">message content</span>
                              </div>
                            </div> --}}
                          </div>
                          <div class="col-sm-12 col-xs-12">
                            <button class="add-more-branch btn-block master-btn bgcolor--gray_mm"><i class="fa fa-plus color--main"></i><span class="color--main">Add more branch</span></button>
                          </div>
                          <div class="col-xs-6">
                            <div class="master_field">
                              <label class="master_label" for="active_place">is place active or in active</label>
                              <input class="make-switch" type="checkbox" checked data-on-text="active" data-off-text="inactive" name="is_active">
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
                              <input class="master_input" type="text" placeholder="ex:city stars" Required id="Place_name"><span class="master_message color--fadegreen">validation message will be here</span>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <div class="master_field">
                              <label class="master_label" for="Other_info">Other info</label>
                              <textarea class="master_input" name="textarea" id="Other_info" placeholder="Other info" Required></textarea><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="branch-container-ar">
                            <div class="col-sm-6 col-xs-12">
                              <div class="master_field">
                                <label class="master_label" for="branches_1">branch 1 name</label>
                                <input class="master_input" type="text" placeholder="branch 1 name" Required id="branches_1"><span class="master_message color--fadegreen">validation message will be here</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset> --}}
                      <h3>Media</h3>
                      <fieldset>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>add youtube video link</h4>
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="master_field">
                              <label class="master_label" for="YouTube_video_1_en">YouTube video (1) in English</label>
                              <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="video_1" name="video[1]"><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xs-12"> 
                            <div class="master_field">
                              <label class="master_label" for="YouTube_video_1_ar">YouTube video (1) in Arabic</label>
                              <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="video_1_ar" name="video_ar[1]"><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xs-12">
                            <div class="master_field">
                              <label class="master_label" for="video_2">YouTube video (2) in English</label>
                              <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="video_2" name="video[2]"><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xs-12"> 
                            <div class="master_field">
                              <label class="master_label" for="video_2_ar">YouTube video (2) in Arabic</label>
                              <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="video_2_ar" name="video_ar[2]"><span class="master_message inherit">message content</span>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xs-12"> 
                            <h4>upload event images (max no. 5 images) in English</h4>
                            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                              <div class="row">
                                <section class="l-main" role="main">
                                  <div >
                                    
                                      
                                        
                                        <input id="fileinput" type="file" multiple value="Select Files" name="images">
                                     
                                      
                                    
                                  </div>
                                </section>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-xs-12"> 
                            <h4>upload event images (max no. 5 images) in Arabic</h4>
                            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                              <div class="row">
                                <section class="l-main" role="main">
                                  <div>
                                        <input  id="fileinput_ar" type="file" multiple value="Select Files" name="images_ar">

                                      </div>
                                </section>
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
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
        "use strict";
        $('.btn-warning-confirm').click(function(){
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
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
          });
        });
      });
      
    </script>
    <script type="text/javascript">
      var form = $("#horizontal-pill-steps").show();
      form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") span.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
     onStepChanged: function (event, currentIndex, priorIndex)
    {
        // // Used to skip the "Warning" step if the user is old enough.
        // if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
        // {
        //     form.steps("next");
        // }
        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3)
        {
            form.steps("previous");
        }
    },
        onFinishing: function (event, currentIndex)
        {
           // alert("Submitted!");
            
  
        
      

           
            var form = $(this);

             form.submit();
        }
      });
      
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
      (function(){
        var options = {};
        $('.js-uploader__box').uploader(options);
      }());
      
    </script>
    <script type="text/javascript">
      $(function () {
        $().bootstrapSwitch && $(".make-switch").bootstrapSwitch();
      });
    </script>
    <script type="text/javascript">
      $('.add-more-branch').on('click' , function(){
       var currentCount =$('.branch-container').length;
       var nextCount = currentCount + 1 ;
       $('.branch-container:last').after(" <div class='branch-container'>	<div class='col-sm-2 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch"+nextCount+" name</label><input class='master_input' type='text' placeholder='branch "+nextCount+" name' Required id='branch_"+nextCount+"' name='branch_name["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-3 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch"+nextCount+" name in arabic</label><input class='master_input' type='text' placeholder='branch "+nextCount+" name' Required id='branch_"+nextCount+"' name='branch_name_ar["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-3 col-xs-4'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch"+nextCount+" address</label><input class='master_input' type='text' placeholder='branch "+nextCount+" address' Required id='branch_"+nextCount+"' name='branch_address["+nextCount+"]'><span class='master_message color--fadegreen'> message</span></div></div><div class='col-sm-2 col-xs-6'><div class='master_field'><label class='master_label' for='start_time_"+nextCount+"'>start date time for "+nextCount+"</label><div class='bootstrap-timepicker'><input class='timepicker master_input' type='text' placeholder='start time for "+nextCount+"' Required id='start_time_"+nextCount+"' name='branch_start["+nextCount+"]'></div><span class='master_message inherit'>message content</span></div></div><div class='col-sm-2 col-xs-6'><div class='master_field'><label class='master_label' for='end_time_"+nextCount+"'>end date time for "+nextCount+"</label><div class='bootstrap-timepicker'><input class='timepicker master_input' type='text' placeholder='end time for "+nextCount+"' Required id='end_time_"+nextCount+"' name='branch_end["+nextCount+"]'></div><span class='master_message inherit'>message content</span></div></div></div> ");
      
       var currentCountAr =$('.branch-container-ar').length;
       var nextCount = currentCountAr + 1 ;
       $('.branch-container-ar:last').after(" <div class='branch-container-ar'>	<div class='col-sm-6 col-xs-12'><div class='master_field'><label class='master_label' for='branch_"+nextCount+"'>branch "+nextCount+" name</label><input class='master_input' type='text' placeholder='branch " + nextCount + " name' Required id='branches_"+nextCount+"'><span class='master_message color--fadegreen'>validation message will be here</span></div></div></div> ");
      
      
      
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
@endsection