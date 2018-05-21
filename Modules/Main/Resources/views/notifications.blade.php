@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
        <div class="row">
          <div class="col-xs-12">
            <div class="text-xs-center">         
              <div class="text-wraper">
                <h4 class="cover-inside-title">Main Data </h4><i class="fa fa-chevron-circle-right"></i>
                <h4 class="cover-inside-title sub-lvl-2">Notification distance </h4>
              </div>
            </div>
          </div>
          <div class="cover--actions"><span></span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="row">
          <div class="col-lg-6">
            <div class="master_field">
              <label class="master_label" for="new_cat">new categories</label>
              <input class="master_input" type="text" placeholder="new categories" Required id="new_cat">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="master_field">
              <label class="master_label mandatory" for="distance">distance </label>
              <select class="master_input" id="distance">
                <option>Km </option>
                <option>Meter</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12"> 
      <div class="cardwrap inherit bradius--noborder bshadow--0 padding--small margin--small-top-bottom">
        <div class="col-lg-3 pull-right">
          <button class="master-btn  btn-block color--white bgcolor--fadegreen bradius--noborder bshadow--0" type="submit"><i class="fa fa-check"></i><span>save</span>
          </button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>    
@endsection