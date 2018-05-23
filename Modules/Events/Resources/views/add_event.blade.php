@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
            <div class="add-mode">Adding mode</div>
            <div class="row">
              <div class="col-xs-12">
                <div class="text-xs-center">         
                  <div class="text-wraper">
                    <h4 class="cover-inside-title">Events</h4><i class="fa fa-chevron-circle-right"></i>
                    <h4 class="cover-inside-title sub-lvl-2">Added from backend</h4>
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
            <form id="horizontal-pill-steps">
              <h3>Info in En</h3>
              <fieldset>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="Event_name">Event name</label>
                      <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required id="Event_name"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="description">Description</label>
                      <textarea class="master_input" name="textarea" id="description" placeholder="Description" Required></textarea><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="mapouter">
                      <div class="gmap_canvas">
                        <iframe id="gmap_canvas" width="600" height="500" src="https://maps.google.com/maps?q=cairo festival&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.embedgooglemap.net"></a></iframe>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="venue">Venue</label>
                      <input class="master_input" type="text" placeholder="ex:CFC" Required id="venue"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label mandatory">Hashtags</label>
                      <input type="text" value="Amsterdam,KSA" data-role="tagsinput">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label mandatory" for="gender">gender</label>
                      <select class="master_input select2" id="gender" style="width:100%;">
                        <option>Male</option>
                        <option>Female</option>
                        <option>both</option>
                      </select><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label mandatory" for="age">select2</label>
                      <select class="master_input select2" id="age" style="width:100%;">
                        <option>Kids</option>
                        <option>15-18 years</option>
                        <option>18-25 years</option>
                        <option>More than 25 years</option>
                      </select><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="start_date">start date</label>
                      <div class="bootstrap-timepicker">
                        <input class="datepicker master_input" type="text" placeholder="start date" Required id="start_date">
                      </div><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="start_time">start date time</label>
                      <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="start time" Required id="start_time">
                      </div><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="end_date">end date</label>
                      <div class="bootstrap-timepicker">
                        <input class="datepicker master_input" type="text" placeholder="end date" Required id="end_date">
                      </div><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="end_time">end date time</label>
                      <div class="bootstrap-timepicker">
                        <input class="timepicker master_input" type="text" placeholder="end time" Required id="end_time">
                      </div><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12">
                    <div class="master_field">
                      <label class="master_label mandatory" for="category">category</label>
                      <select class="master_input select2" id="category" multiple="multiple" data-placeholder="placeholder" style="width:100%;" ,>
                        <option>Category 1</option>
                        <option>Category 2</option>
                        <option>Category 3</option>
                        <option>Category 4</option>
                      </select><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="big_event">Suggest as big event</label>
                      <input class="make-switch" type="checkbox" checked data-on-text="yes" data-off-text="no">
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="active_event">is your event active or in active</label>
                      <input class="make-switch" type="checkbox" checked data-on-text="active" data-off-text="inactive">
                    </div>
                  </div>
                </div>
              </fieldset>
              <h3>Info in Ar</h3>
              <fieldset>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="Event_name">Event name</label>
                      <input class="master_input" type="text" placeholder="ex:Redbull fl shar3" Required id="Event_name"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="description">Description</label>
                      <textarea class="master_input" name="textarea" id="description" placeholder="Description" Required></textarea><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="venue">Venue</label>
                      <input class="master_input" type="text" placeholder="ex:CFC" Required id="venue"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label mandatory">Hashtags</label>
                      <input type="text" value="Amsterdam,KSA" data-role="tagsinput">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </fieldset>
              <h3>Tickets</h3>
              <fieldset>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="master_field">
                      <label class="master_label mandatory">Is it free or paid ?</label>
                      <input class="icon" type="radio" name="icon" id="radbtn_2_free" checked="true">
                      <label for="radbtn_2_free">free</label>
                      <input class="icon" type="radio" name="icon" id="radbtn_3_paid">
                      <label for="radbtn_3_paid">paid</label>
                    </div>
                  </div>
                </div>
                <div class="paid-details">
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="master_field">
                        <label class="master_label" for="Price">Price</label>
                        <input class="master_input" type="number" placeholder="50" Required id="Price"><span class="master_message color--fadegreen">validation message will be here</span>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <div class="master_field">
                        <label class="master_label mandatory" for="Currency">Currency</label>
                        <select class="master_input" id="Currency">
                          <option>SAR</option>
                          <option>USD</option>
                        </select><span class="master_message inherit">message content</span>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="master_field">
                        <label class="master_label" for="Available_tickets">Available tickets</label>
                        <input class="master_input" type="number" placeholder="5" Required id="Available_tickets"><span class="master_message color--fadegreen">validation message will be here</span>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <h3>Contact Info</h3>
              <fieldset>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="Website">Website</label>
                      <input class="master_input" type="url" placeholder="ex:www.domain.com" id="Website"><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="e_email">email</label>
                      <input class="master_input" type="email" placeholder="email" Required id="e_email"><span class="valid-label"></span><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="Code_numbe">Code number</label>
                      <input class="master_input" type="number" placeholder="ex: 2012545" Required id="Code_numbe"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="Mobile_number">mobile number</label>
                      <input class="master_input" type="number" placeholder="0123456789" Required id="Mobile_number"><span class="master_message color--fadegreen">validation message will be here</span>
                    </div>
                  </div>
                </div>
              </fieldset>
              <h3>Media</h3>
              <fieldset>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="YouTube_video_en">Add YouTube video (1) Link in Arabic</label>
                      <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en"><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="YouTube_video_ar">Add YouTube video (1) Link in English</label>
                      <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar"><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="YouTube_video_en">Add YouTube video (2) Link in Arabic</label>
                      <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_en"><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="master_field">
                      <label class="master_label" for="YouTube_video_ar">Add YouTube video (2) Link in English</label>
                      <input class="master_input" type="url" placeholder="ex:www.youtube.com/video_iD" id="YouTube_video_ar"><span class="master_message inherit">message content</span>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <hr>
                  </div>
                  <div class="col-sm-6 col-xs-12 text-center">
                    <h4 class="text-center">upload event images (in Arabic ) (max no. 5 images)</h4>
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="row">
                        <section class="l-main" role="main">
                          <div class="uploader__box js-uploader__box l-center-box">
                            <form action="your/nonjs/fallback/" method="POST">
                              <div class="uploader__contents">
                                <label class="button button--secondary" for="fileinput">Select Files</label>
                                <input class="uploader__file-input" id="fileinput" type="file" multiple value="Select Files">
                              </div>
                              <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                            </form>
                          </div>
                        </section>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-12 text-center">
                    <h4 class="text-center">upload event images (in English ) (max no. 5 images)</h4>
                    <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                      <div class="row">
                        <section class="l-main" role="main">
                          <div class="uploader__box js-uploader__box l-center-box">
                            <form action="your/nonjs/fallback/" method="POST">
                              <div class="uploader__contents">
                                <label class="button button--secondary" for="fileinput">Select Files</label>
                                <input class="uploader__file-input" id="fileinput" type="file" multiple value="Select Files">
                              </div>
                              <input class="button button--big-bottom" type="submit" value="Upload Selected Files">
                            </form>
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