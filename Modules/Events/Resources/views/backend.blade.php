@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title">@lang('keywords.events') </h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.addfrombackend') </h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="events_backend_edit.html">Add New Event</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="full-table">
          <div class="filter__btns"><a class="filter-btn master-btn" href="#filter-users"><i class="fa fa-filter"></i>@lang('keywords.filter')</a></div>
          <div class="bottomActions__btns"><a class="master-btn" href="#">Delete selected</a><a class="master-btn" href="#">Add New Event</a>
          </div>
          <div class="remodal" data-remodal-id="filter-users" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
            <div>
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="filter_cat">Event categories </label>
                    <select class="master_input select2" id="filter_cat" multiple="multiple" data-placeholder="Event categories" style="width:100%;" ,>
                      <option>Egypt</option>
                      <option>KSA</option>
                      <option>USA</option>
                      <option>Sudan</option>
                      <option>France</option>
                      <option>Etc</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label">Events status</label>
                    <div class="funkyradio">
                      <input type="checkbox" name="radio" id="event_status_2">
                      <label for="event_status_2">Active</label>
                    </div>
                    <div class="funkyradio">
                      <input type="checkbox" name="radio" id="event_status_3">
                      <label for="event_status_3">inActive</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="bootstrap_date_start_from">start date from</label>
                    <div class="bootstrap-timepicker">
                      <input class="datepicker master_input" type="text" placeholder="start date from" id="bootstrap_date_start_from">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="bootstrap_date_start_to">start date to</label>
                    <div class="bootstrap-timepicker">
                      <input class="datepicker master_input" type="text" placeholder="start date to" id="bootstrap_date_start_to">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="bootstrap_date_End_from">End date from</label>
                    <div class="bootstrap-timepicker">
                      <input class="datepicker master_input" type="text" placeholder="End date from" id="bootstrap_date_End_from">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="bootstrap_date_End_to">End date to</label>
                    <div class="bootstrap-timepicker">
                      <input class="datepicker master_input" type="text" placeholder="End date to" id="bootstrap_date_End_to">
                    </div>
                  </div>
                </div>
              </div>
            </div><br>
            <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
            <button class="remodal-confirm" data-remodal-action="confirm">Apply Filters</button>
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

                @if ( isset($events) && !empty($events) )
                    @foreach ($events as $event)
                        <tr data-id="{{ $event->id }}">
                            <td><span class="cellcontent" data-id="{{ $event->id }}"></span></td>
                            <td><span class="cellcontent">{{ $event->id }}</span></td>
                            <td><span class="cellcontent">{{ $event->name ? $event->name : '' }}</span></td>
                            <td><span class="cellcontent">{{ $event->venu ? $event->venu : '' }}</span></td>
                            <td><span class="cellcontent">{{ $event->start_datetime ? $event->start_datetime : '' }}</span></td>
                            <td><span class="cellcontent">{{ $event->end_datetime ? $event->end_datetime : '' }}</span></td>
                            <td><span class="cellcontent">{{ $event->created_at ? $event->created_at : '' }}</span></td>
                            <td><span class="cellcontent">{{ $event->user ? $event->user->name : '' }}</span></td>
                            <td><span class="cellcontent"><i class = "{{ $event->is_active ? ($event->is_active == 0 ? 'fa icon-in-table-false fa-times' : 'fa icon-in-table-true fa-check' ) : 'fa icon-in-table-false fa-times' }}"></i></i></span></td>
                            <td>
                                <span class="cellcontent">
                                    <a href= events_backend_view.html ,  class= "action-btn bgcolor--main color--white "><i class = "fa  fa-eye"></i></a>
                                    <a href= events_backend_edit.html ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a>
                                    <a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a>
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
          <button id="delete-test">Delete selected</button>
        </div>
      </div>
    </div><br>
  </div>

  <script>
    $(document).ready(function(){
      $('#menu_3').addClass('openedmenu');
      $('#sub_3_1').addClass('pure-active');
    });
  </script>
@endsection