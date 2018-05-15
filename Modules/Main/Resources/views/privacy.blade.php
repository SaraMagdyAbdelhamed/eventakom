@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title">@lang('keywords.mainData') </h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">@lang('keywords.privacy') </h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><a class="bradius--no border-btn master-btn" type="button" href="#popupModal_1">edit</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="tabs--wrapper">
        <div class="clearfix"></div>
        <ul class="tabs">
          <li id="arabic">Arabic</li>
          <li id="english">English</li>
        </ul>
        <ul class="tab__content">
          <li class="tab__content_item active" id="arabic-content">
            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
              <p class="text-center">sorry.. ther's no any content added, please click add and update your content</p>
            </div>
          </li>
          <li class="tab__content_item" id="english-content">
            <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
              <p class="text-center">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently |with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently |with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently |with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="remodal" data-remodal-id="popupModal_1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
    <div>
      <div class="row">
        <div class="col-lg-12">
          <h3>Edit PRIVACY AND POLICY</h3>
        </div>
        <div class="col-xs-12">
          <form>
            <div class="tabs--wrapper">
              <div class="clearfix"></div>
              <ul class="tabs">
                <li id="arabic-popup">Arabic</li>
                <li id="english-popup">English</li>
              </ul>
              <ul class="tab__content">
                <li class="tab__content_item active" id="arabic-popup-content">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <p class="text-left">Add Arabic Content</p>
                    <textarea class="tinyMce form-control" id="tinyMce-1" name="tinyMce" cols="100" rows="10"></textarea>
                  </div>
                </li>
                <li class="tab__content_item" id="english-popup-content">
                  <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
                    <p class="text-left">Add English Content</p>
                    <textarea class="tinyMce form-control" id="tinyMce-2" name="tinyMce" cols="100" rows="10"></textarea>
                  </div>
                </li>
                <div class="clearfix"></div>
              </ul>
            </div>
            <button class="remodal-cancel" data-remodal-action="cancel">Cancel</button>
            <button class="remodal-confirm" data-remodal-action="confirm">save</button>
            <button class="remodal-confirm" data-remodal-action="confirm" disabled>save disabled</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection