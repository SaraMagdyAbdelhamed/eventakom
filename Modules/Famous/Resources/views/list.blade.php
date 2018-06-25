@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.famousAtt')</h4>
              </div>
            </div>
          </div>
          <div class="cover--actions">
            <a class="bradius--no border-btn master-btn" type="button" href="{{ route('fa.create') }}">@lang('keywords.addNew')</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="full-table">
          <div class="filter__btns"><a class="filter-btn master-btn" href="#filter-users"><i class="fa fa-filter"></i>@lang('keywords.filter')</a></div>
          <div class="bottomActions__btns">
            <a class="master-btn" href="#" id="deleteSelected">@lang('keywords.deleteSelected')</a>
            <a class="master-btn" href="{{ route('event_backend.add') }}">@lang('keywords.addNewBackend')</a>
          </div>
          <div class="remodal" data-remodal-id="filter-users" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
            <div>
              <div class="row">
                <div class="col-xs-12">
                  <h3>Filters</h3>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label" for="filter_cat">place categories </label>
                    <select class="master_input select2" id="filter_cat" multiple="multiple" data-placeholder="place categories" style="width:100%;" ,>
                      <option>historical</option>
                      <option>meditations</option>
                      <option>Etc</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="master_field">
                    <label class="master_label">place status</label>
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
                  <th><span class="cellcontent">@lang('keywords.serialNo')</span></th>
                  <th><span class="cellcontent">@lang('keywords.placeName')</span></th>
                  <th><span class="cellcontent">@lang('keywords.placeAddress')</span></th>
                  <th><span class="cellcontent">@lang('keywords.placePhone')</span></th>
                  <th><span class="cellcontent">@lang('keywords.placeCategories')</span></th>
                  <th><span class="cellcontent">@lang('keywords.status')</span></th>
                  <th><span class="cellcontent">@lang('keywords.actions')</span></th>
                </tr>
              </thead>
              <tbody>

                  @if ( isset($attractions) && !empty($attractions) )
                      @foreach ($attractions as $attraction)
                        <tr data-id="{{ $attraction->id }}">
                          <td><span class="cellcontent" data-id="{{ $attraction->id }}"></span></td>
                          <td><span class="cellcontent">{{ $attraction->id }}</span></td>
                          <td><span class="cellcontent">{{ $attraction->name ? : '' }}</span></td>
                          <td><span class="cellcontent">{{ $attraction->address ? : '' }}</span></td>
                          <td><span class="cellcontent">{{ $attraction->phone ? : '' }}</span></td>
                          <td>
                            <span class="cellcontent">
                              @foreach ($attraction->categories as $cat)
                                  {{ $cat->name }}
                              @endforeach
                            </span>
                          </td>
                          <td>
                            <span class="cellcontent">
                              <i class = "{{ $attraction->is_active ? 'fa icon-in-table-true fa-check' : 'fa icon-in-table-false fa-times' }}"></i>
                            </span>
                          </td>
                          <td>
                            <span class="cellcontent">
                              <a href= #popupModal_1 ,  class= "action-btn bgcolor--main color--white showRow" data-id="{{ $attraction->id }}">
                                <i class = "fa  fa-eye"></i>
                              </a>
                              <a  href= famous_attractions_edit.html ,  class= " action-btn bgcolor--fadegreen color--white ">
                                <i class = "fa  fa-pencil"></i>
                              </a>
                              <a href="#" data-id="{{ $attraction->id }}"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white deleteRecord">
                                <i class = "fa  fa-trash-o"></i>
                              </a>
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
        </div>
      </div>
    </div><br>
</div>

<div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
      <div class="row">
        <div class="col-xs-12"></div>
        <h3>Place Name</h3>
        <div class="col-xs-12">
          <div class="tabs--wrapper">
            <div class="clearfix"></div>
            <ul class="tabs">
              <li id="info">Info</li>
              <li id="media">Media</li>
            </ul>
            <ul class="tab__content">
              <li class="tab__content_item active" id="info-content">
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                  <div class="full-table">
                    <table class="verticaltable table-master">
                      <tr>
                        <th><span class="cellcontent">Place name</span></th>
                        <td><span class="cellcontent">El batraa jordan</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Place category</span></th>
                        <td><span class="cellcontent">historical</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Address</span></th>
                        <td><span class="cellcontent">jordan</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Place phone</span></th>
                        <td><span class="cellcontent">0123456789</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Website</span></th>
                        <td><span class="cellcontent">&lt;a href = &quot;#.html&quot;&gt;www.google.com&lt;/a&gt;</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Opening days</span></th>
                        <td><span class="cellcontent">sat,sun,mon,tue</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">from</span></th>
                        <td><span class="cellcontent">12:00PM</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">to</span></th>
                        <td><span class="cellcontent">12:00AM</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">status</span></th>
                        <td><span class="cellcontent">&lt;i class = &quot;fa icon-in-table-true fa-check&quot;&gt;&lt;/i&gt;</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">other info</span></th>
                        <td><span class="cellcontent">other info other info</span></td>
                      </tr>
                    </table>
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
                  </div>
                  <div class="clearfix"></div>
                </div>
              </li>
              <li class="tab__content_item" id="media-content">
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                  <div class="col-xs-12">
                    <h5 class="text-left">images</h5>
                  </div>
                  <div class="col-xs-12">
                    <div class="slideperview" id="slider--3">
                      <div class="swiper-container">
                        <div class="swiper-wrapper">                     
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300/?random"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/g/350/300"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300/?random"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/g/350/300"></div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"> </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-xs-12">
                  <h5 class="text-left">video</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom"><iframe width="100%" height="350" src="https://www.youtube.com/embed/tMe0vwZ13fw?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom"><iframe width="100%" height="350" src="https://www.youtube.com/embed/tMe0vwZ13fw?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12">
          <button class="remodal-confirm" data-remodal-action="confirm">Close</button>
        </div>
      </div>
    </div>
</div>


{{-- Start Scripts --}}
<script>
    $(document).ready(function(){
        // Sidebar Active Class
        $('#menu_5').addClass('openedmenu');
        $('#sub_5_1').addClass('pure-active');
    });

    // delete single row
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
              url: "{{ route('fa.delete') }}",
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

    $('#deleteSelected').click(function(){
      var allVals = [];                   // selected IDs
      var token = '{{ csrf_token() }}';

      // push cities IDs selected by user
      $('input.input-in-table:checked').each(function() {
          allVals.push( $(this).data("id") );
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
              url: "{{ route('event_backend.destroySelected') }}",
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

    // AJAX: get record info
    $('.showRow').click(function(){
        // Get ID of that record
        var id = $(this).data("id");    

        // AJAX call to get record data
        $.ajax({
            url: "{{ route('fa.show') }}",
            type: 'GET',
            data: {id: id},

            // On success, set retrieved data to edit input fields
            success: function (data)
            { console.log(data);
                $("#name").val(data.name);  
                $("#address").val(data.address);
                $("#").val(data.name_en);
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
</script>
{{-- End Scripts --}}


@endsection