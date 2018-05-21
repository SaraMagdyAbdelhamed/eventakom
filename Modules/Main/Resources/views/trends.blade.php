@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( {{ asset('img/covers/dummy2.jpg ') }} )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title">@lang('keywords.mainData') </h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.trends') </h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="#popupModal_1">@lang('keywords.addNew')</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="full-table">
          <div id="deleteSelected" class="bottomActions__btns"><a class="master-btn" href="#">delete selected</a>
          </div>
          <form id="dataTableTriggerId_001_form">
            <table class="data-table-trigger table-master" id="dataTableTriggerId_001">
              <thead>
                <tr class="bgcolor--gray_mm color--gray_d">
                  <th><span class="cellcontent">&lt;input type=&quot;checkbox&quot; data-click-state=&quot;0&quot; name=&quot;select-all&quot; id=&quot;select-all&quot; /&gt;</span></th>
                  <th><span class="cellcontent">serial No</span></th>
                  <th><span class="cellcontent">Trending searches words</span></th>
                  <th><span class="cellcontent">actions</span></th>
                </tr>
              </thead>

              <tbody>
                @if ( isset($trends) && !empty($trends) )
                    @foreach ($trends as $trend)
                    <tr data-id="{{ $trend->id }}">
                      <td><span class="cellcontent"></span></td>
                      <td><span class="cellcontent">{{ $trend->id }}</span></td>
                      <td><span class="cellcontent">{{ $trend->name ? $trend->name : '' }}</span></td>
                      <td>
                        <span class="cellcontent">
                          <a href="#popupModal_2" data-id="{{ $trend->id }}" data-name="{{ $trend->name ? $trend->name : '' }}" class= "action-btn bgcolor--fadegreen color--white rowEdit"><i class = "fa  fa-pencil"></i></a>
                          <a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white deleteRecord"><i class = "fa  fa-trash-o"></i></a>
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
          <button id="delete-test">delete tests</button>
        </div>
      </div>
    </div><br>
  </div>
  <div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
      <div class="row">
        <div class="col-lg-12">
          <h3>@lang('keywords.addNew') @lang('keywords.trends')</h3>
        </div>
        <div class="col-xs-12">
          <form>
            <div class="tabs--wrapper">
              <div class="clearfix"></div>
              <ul class="tabs">
                <li id="arabic">العربية</li>
                <li id="english">English</li>
              </ul>
              <ul class="tab__content">
                <li class="tab__content_item active" id="arabic-content">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="master_field">
                      <label class="master_label" for="trending_search">اضافة كلمة بحث باللغة العربية</label>
                      <input name="arabic" class="master_input" type="text" placeholder="new Trending searches words in Arabic" Required id="trending_search">
                    </div>
                  </div>
                </li>
                <li class="tab__content_item" id="english-content">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <div class="master_field">
                      <label class="master_label" for="trending_search">Add new keyword in English</label>
                      <input name="english" class="master_input" type="text" placeholder="new Trending searches words in English" Required id="trending_search">
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-xs-12">
              <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
              <button class="remodal-confirm" type="submit">save</button>
              <button class="remodal-confirm" data-remodal-action="confirm" disabled>save disabled</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection