@extends('layouts.app')


@section('content')

              <!-- =============== Custom Content ===========-==========-->
              <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  {{asset( 'img/covers/dummy2.jpg ' )}}  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h3 class="cover-inside-title  ">Shop and dine</h3>
                          </div>
                        </div>
                      </div>
                      <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="{{route('add_shop')}}">Add new Shop and dine</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><br>
          <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
          <button class="remodal-confirm" data-remodal-action="confirm">Apply Filters</button>
        </div> --}}
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
              @foreach($shops as $key=>$value)
              <tr data-shop-id={{$value['id']}}>
                <td><span class="cellcontent"></span></td>
                <td><span class="cellcontent">{{$value['id']}}</span></td>
                <td><span class="cellcontent"><img src = "{{$value['photo']}}" , class = " img-in-table"></span></td>
                <td><span class="cellcontent">{{$value['name']}}</span></td>
                <td><span class="cellcontent">{{$value['phone']}}</span></td>
                @if($value['is_active'])
                <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i></i></span></td>
                @else
                <td><span class="cellcontent"><i class = "fa icon-in-table-false fa-times"></i></span></td>
                @endif
                <td><span class="cellcontent"><a href= "#shop_{{$value['id']}}" ,  class= "action-btn bgcolor--main color--white " ><i class = "fa  fa-eye"></i></a><a href= "{{route('edit_shop',$value['id'])}}" ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a   class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>


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
        {{-- <button id="delete-test">Delete Tests</button> --}}
      </div>
    </div>
  </div><br>
</div>
@foreach($shops as $key => $value)
<div class="remodal" data-remodal-id="shop_{{$value['id']}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
  <div>
    <div class="row">
      <div class="col-xs-12"></div>
      <h3>{{$value['name']}}</h3>
      <div class="col-xs-12">
        <form>
          <div class="tabs--wrapper">
            <div class="clearfix"></div>
            <ul class="tabs">
              <li id="info_{{$value['id']}}">Info</li>
              <li id="media_{{$value['id']}}">Media</li>
            </ul>
            <ul class="tab__content">
              <li class="tab__content_item active" id="info_{{$value['id']}}-content">
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                  <div class="full-table">
                    <table class="verticaltable table-master">
                      <tr>
                        <th><span class="cellcontent">Place name</span></th>
                        <td><span class="cellcontent">{{$value['name']}}</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Place phone</span></th>
                        <td><span class="cellcontent">{{$value['phone']}}</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Website</span></th>
                        <td><span class="cellcontent">&lt;a href = &quot;#.html&quot;&gt;{{$value['website']}}&lt;/a&gt;</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Opening days</span></th>
                        <td><span class="cellcontent">sat,sun,mon,tue</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">other info</span></th>
                        <td><span class="cellcontent">{{$value['info']}}</span></td>
                      </tr>
                      <tr>
                        <th><span class="cellcontent">Branches</span></th>
                        <td><span class="cellcontent">
                      @foreach($value['shop_branch'] as $branch)
                      {{$branch['branch']}},
                      @endforeach
                    </span></td>
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
                        @if($value['is_active'])
                        <td><span class="cellcontent">&lt;i class = &quot;fa icon-in-table-true fa-check&quot;&gt;&lt;/i&gt;</span></td>
                        @else
                        <td><span class="cellcontent">&lt;i class = &quot;fa icon-in-table-true fa-times&quot;&gt;&lt;/i&gt;</span></td>
                        @endif
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
              <li class="tab__content_item" id="media_{{$value['id']}}-content">
                <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                  <div class="col-xs-12">
                    <h5 class="text-left">images</h5>
                  </div>
                  <div class="col-xs-12">
                    <div class="slideperview" id="slider--3">
                      <div class="swiper-container">
                        <div class="swiper-wrapper">    
                          @foreach($value['shop_media'] as $image)           @if($image['type'] ==1)      
                          <div class="swiper-slide"><img class="full-size" src="{{$image['link']}}"></div>
                          @endif
                          @endforeach
                          {{-- <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300/?random"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/g/350/300"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/350/300/?random"></div>
                          <div class="swiper-slide"><img class="full-size" src="https://unsplash.it/g/350/300"></div> --}}
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
                @foreach($value['shop_media'] as $video)          
                 @if($image['type'] ==2)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom"><iframe width="100%" height="350" src="{{$video['link']}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                </div>
                @endif
                @endforeach
                {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom"><iframe width="100%" height="350" src="https://www.youtube.com/embed/tMe0vwZ13fw?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                </div> --}}
              </li>
            </ul>
          </div>
          <button class="remodal-confirm" data-remodal-action="confirm">Close</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  @endforeach

@endsection


@section('js')
<script type="text/javascript">
      $(document).ready(function(){
        "use strict";
        $('.btn-warning-confirm').click(function(){
           var shop_id = $(this).closest('tr').attr('data-shop-id');
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
           function(isConfirm){
        if (isConfirm){
         $.ajax({
           type:'GET',
           url:'{{url('shop_destroy')}}'+'/'+shop_id,
           data:{_token:_token},
           success:function(data){
            // alert('h');
            $('tr[data-shop-id='+shop_id+']').fadeOut();
          }
        });
         swal("تم الحذف!", "تم الحذف بنجاح", "success");
       } else {
        swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
      }
    });
          // function(){
          //   swal("Deleted!", "Your imaginary file has been deleted!", "success");
          // });
        });

        $('.btn-warning-cancel-all').click(function(){
      var selectedIds = $("input:checkbox:checked").map(function(){
        return $(this).closest('tr').attr('data-shop-id');
      }).get();
      if(selectedIds.length == 0 )
      {
        swal("خطأ", "من فضلك اختر  متجر :)", "error");
      }
      else
      {
        // alert(selectedIds);
      var _token = '{{csrf_token()}}';
      swal({
        title: "هل أنت متأكد؟",
        text: "لن تستطيع إسترجاع هذه المعلومة لاحقا",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'نعم متأكد!',
        cancelButtonText: "إلغاء",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm){
         $.ajax({
           type:'POST',
           url:'{{url('shop_destroy_all')}}',
           data:{ids:selectedIds,_token:_token},
           success:function(data){
            $.each( selectedIds, function( key, value ) {
              $('tr[data-shop-id='+value+']').fadeOut();
            });
          }
        });
         swal("تم الحذف!", "تم الحذف بنجاح", "success");
       } else {
        swal("تم الإلغاء", "المعلومات مازالت موجودة :)", "error");
      }
    });
    }
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
