@extends('layouts.app')

@section('content')
           <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h4 class="cover-inside-title">Events </h4><i class="fa fa-chevron-circle-right"></i>
                            <h4 class="cover-inside-title sub-lvl-2">Added from mobile application </h4>
                          </div>
                        </div>
                      </div>
                      <div class="cover--actions"><span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="tabs--wrapper">
                    <div class="clearfix"></div>
                    <ul class="tabs">
                      <li id="current">Current</li>
                      <li id="pending">Pendding</li>
                    </ul>
                    <ul class="tab__content">
                      <li class="tab__content_item active" id="current-content">
                        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                          <div class="full-table">
                            <div class="filter__btns"><a class="filter-btn master-btn" href="#filter-users"><i class="fa fa-filter"></i>filters</a></div>
                            <div class="bottomActions__btns"><a class="master-btn" href="#">Delete selected</a><a class="master-btn" href="#">Add New Event</a>
                            </div>
                            <div class="remodal" data-remodal-id="filter-users" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                               <form role="form" action="{{ route('event_filter') }}" method="POST" accept-charset="utf-8">
                               {{csrf_field()}}
                              <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
                              <div>
                                <div class="row">
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label" for="filter_cat">Event categories </label>
                                      <select class="master_input select2" id="filter_cat" multiple="multiple" data-placeholder="Event categories" name="categories[]" style="width:100%;" ,>
                                      @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label">Events status</label>
                                      <div class="funkyradio">
                                        <input type="checkbox" name="status[]" value="1" id="event_status_2">
                                        <label for="event_status_2">Active</label>
                                      </div>
                                      <div class="funkyradio">
                                        <input type="checkbox" name="status[]"  value="0" id="event_status_3">
                                        <label for="event_status_3">inActive</label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label" for="bootstrap_date_start_from">start date from</label>
                                      <div class="bootstrap-timepicker">
                                        <input class="datepicker master_input" type="text" placeholder="start date from" id="bootstrap_date_start_from" name="startdate_from">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label" for="bootstrap_date_start_to">start date to</label>
                                      <div class="bootstrap-timepicker">
                                        <input class="datepicker master_input" type="text" placeholder="start date to" id="bootstrap_date_start_to"  name="startdate_to">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label" for="bootstrap_date_End_from">End date from</label>
                                      <div class="bootstrap-timepicker">
                                        <input class="datepicker master_input" type="text" placeholder="End date from" id="bootstrap_date_End_from" name="enddate_from">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6 col-xs-12">
                                    <div class="master_field">
                                      <label class="master_label" for="bootstrap_date_End_to">End date to</label>
                                      <div class="bootstrap-timepicker">
                                        <input class="datepicker master_input" type="text" placeholder="End date to" id="bootstrap_date_End_to" name="enddate_to">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><br>
                              <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
                              <button class="remodal-confirm" type="submit">Apply Filters</button>
                               </form>
                            </div>
                            <form id="dataTableTriggerId_001_form">
                              <table class="data-table-trigger table-master" id="dataTableTriggerId_001">
                                <thead>
                                  <tr class="bgcolor--gray_mm color--gray_d">
                                    <th><span class="cellcontent">&lt;input type=&quot;checkbox&quot; data-click-state=&quot;0&quot; name=&quot;select-all&quot; id=&quot;select-all&quot; /&gt;</span></th>
                                    <th><span class="cellcontent">serial No</span></th>
                                    <th><span class="cellcontent">Event name</span></th>
                                    <th><span class="cellcontent">Venue</span></th>
                                    <th><span class="cellcontent">Start date/time</span></th>
                                    <th><span class="cellcontent">End date/time/time</span></th>
                                    <th><span class="cellcontent">Added date</span></th>
                                    <th><span class="cellcontent">Added by</span></th>
                                    <th><span class="cellcontent">Event status</span></th>
                                    <th><span class="cellcontent">actions</span></th>
                                  </tr>
                                </thead>
                                <tbody>
                                	@foreach($current_events as $event)
                                  <tr>
                                    <td><span class="cellcontent"></span></td>
                                    <td><span class="cellcontent">{{$event->id}}</span></td>
                                    <td><span class="cellcontent">{{$event->name}}</span></td>
                                    <td><span class="cellcontent">{{$event->venue}}</span></td>
                                    <td><span class="cellcontent">{{$event->start_datetime}}</span></td>
                                    <td><span class="cellcontent">{{$event->end_datetime}}</span></td>
                                    <td><span class="cellcontent">{{$event->created_at}}</span></td>
                                    <td><span class="cellcontent">{{$event->created_by}}</span></td>
                                    <td><span class="cellcontent">@if($event->is_active==1)<i class = "fa icon-in-table-true fa-check"></i>@elseif($event->is_active==0)<i class = "fa icon-in-table-false fa-times"></i>@endif</span></td>
                                    <td><span class="cellcontent"><a href= events_mobile_view.html ,  class= "action-btn bgcolor--main color--white "><i class = "fa  fa-eye"></i></a><a href= events_mobile_edit.html ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                                  </tr>
                                  @endforeach
                                  
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
                            <button id="delete-test">Delete Tests</button>
                          </div>
                        </div><br>
                      </li>
                      <li class="tab__content_item" id="pending-content">
                        <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                          <div class="full-table">
                            <div class="bottomActions__btns"><a class="master-btn" href="#">Accept Selected</a>
                            </div>
                            <form id="dataTableTriggerId_002_form">
                              <table class="data-table-trigger table-master" id="dataTableTriggerId_002">
                                <thead>
                                  <tr class="bgcolor--gray_mm color--gray_d">
                                    <th><span class="cellcontent">&lt;input type=&quot;checkbox&quot; data-click-state=&quot;0&quot; name=&quot;select-all&quot; id=&quot;select-all&quot; /&gt;</span></th>
                                    <th><span class="cellcontent">serial No</span></th>
                                    <th><span class="cellcontent">Event name</span></th>
                                    <th><span class="cellcontent">Venue</span></th>
                                    <th><span class="cellcontent">Start date/time</span></th>
                                    <th><span class="cellcontent">End date/time/time</span></th>
                                    <th><span class="cellcontent">Added date</span></th>
                                    <th><span class="cellcontent">Added by</span></th>
                                    <th><span class="cellcontent">actions</span></th>
                                  </tr>
                                </thead>
                                <tbody>

                              
                                 
                                  @foreach($pending_events as $event)
                                  <tr>
                                    <td><span class="cellcontent"></span></td>
                                    <td><span class="cellcontent">{{$event->id}}</span></td>
                                    <td><span class="cellcontent">{{$event->name}}</span></td>
                                    <td><span class="cellcontent">{{$event->venue}}</span></td>
                                    <td><span class="cellcontent">{{$event->start_datetime}}</span></td>
                                    <td><span class="cellcontent">{{$event->end_datetime}}</span></td>
                                    <td><span class="cellcontent">{{$event->created_at}}</span></td>
                                    <td><span class="cellcontent">{{$event->created_by}}</span></td>
                                    <td><span class="cellcontent"><button class= " accepted-btn master-btn btn-warning-accept action-btn bgcolor--fadepurple  color--white ">accept</button><a href= #popupModal_r ,  class= "action-btn bgcolor--fadeorange color--white ">reject</a><a href= events_mobile_edit.html ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                                  </tr>
                                  @endforeach
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
                            <button class="btn-warning-accept" id="delete-test-2">Accept selected</button>
                          </div>
                        </div><br>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="remodal" data-remodal-id="popupModal_r" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                  <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
                  <div>
                    <div class="row">
                      <div class="col-lg-12">
                        <h3>Please enter reject reason</h3>
                      </div>
                      <div class="col-xs-12">
                        <form>
                          <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                            <p class="text-left">add Arabic Content</p>
                            <div class="master_field">
                              <label class="master_label" for="ID_No-12">reject reason in arabic</label>
                              <textarea class="master_input" name="textarea" id="ID_No-12" placeholder="reject reason in arabic" Required></textarea><span class="master_message inherit">message content</span>
                            </div>
                            <p class="text-left">add English Content</p>
                            <div class="master_field">
                              <label class="master_label" for="ID_No-15">reject reason in English</label>
                              <textarea class="master_input" name="textarea" id="ID_No-15" placeholder="reject reason in English" Required></textarea><span class="master_message inherit">message content</span>
                            </div>
                            <div class="clearfix"></div>
                            <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
                            <button class="remodal-confirm" data-remodal-action="confirm">save</button>
                            <button class="remodal-confirm" data-remodal-action="confirm" disabled>disabled</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  <script>
    $(document).ready(function(){
      $('#menu_3').addClass('openedmenu');
      $('#sub_3_2').addClass('pure-active');
    });
  </script>
  <script type="text/javascript">
      $(function () {
        $('.datepicker').datepicker({autoclose: true});
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
        $('.btn-warning-accept').click(function(){
         swal("Accepted", "You can find this event in Current Tab", "success");
        });
      });
      
    </script>
@endsection