@extends('layouts.app')


@section('content')

              <!-- =============== Custom Content ===========-==========-->
              <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h3 class="cover-inside-title  ">Shop and dine</h3>
                          </div>
                        </div>
                      </div>
                      <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="{{route('edit_shop')}}">Add new Shop and dine</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="full-table">
                      <div class="filter__btns"><a class="filter-btn master-btn" href="#filter-users"><i class="fa fa-filter"></i>filters</a></div>
                      <div class="bottomActions__btns"><a class="master-btn" href="#">Delete selected</a><a class="master-btn" href="#">Add new Shop and dine</a>
                      </div>
                      <div class="remodal" data-remodal-id="filter-users" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                        <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
                        <div>
                          <div class="row">
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
                              <th><span class="cellcontent">serial No</span></th>
                              <th><span class="cellcontent">Shop photo</span></th>
                              <th><span class="cellcontent">Place name</span></th>
                              <th><span class="cellcontent">Place phone</span></th>
                              <th><span class="cellcontent">status</span></th>
                              <th><span class="cellcontent">actions</span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">5</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">El batraa jordan</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--main color--white "><i class = "fa  fa-eye"></i></a><a href= "{{route('edit_shop')}}" ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">5</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">El batraa jordan</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--main color--white "><i class = "fa  fa-eye"></i></a><a href= "{{route('edit_shop')}}" ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                           
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
                      <form>
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
                                      <th><span class="cellcontent">other info</span></th>
                                      <td><span class="cellcontent">other info other info</span></td>
                                    </tr>
                                    <tr>
                                      <th><span class="cellcontent">Branches</span></th>
                                      <td><span class="cellcontent">egypt</span></td>
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
                        <button class="remodal-confirm" data-remodal-action="confirm">Close</button>
                      </form>
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