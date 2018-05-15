@extends('layouts.app')

@section('content')          
              <div class="row">
                <div class="col-xs-12">
                  <div class="cover-inside-container margin--small-top-bottom bradius--no bshadow--0" style="background-image:  url( '../img/covers/dummy2.jpg ' )  ; background-position: center center; background-repeat: no-repeat; background-size:cover;">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="text-xs-center">         
                          <div class="text-wraper">
                            <h4 class="cover-inside-title">Users </h4><i class="fa fa-chevron-circle-right"></i>
                            <h4 class="cover-inside-title sub-lvl-2">Mobile application users </h4>
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
                    <div class="full-table">
                      <div class="filter__btns"><a class="filter-btn master-btn" href="#filter-users"><i class="fa fa-filter"></i>filters</a></div>
                      <div class="bottomActions__btns"><a class="master-btn" href="#">Delete selected</a>
                      </div>
                      <div class="remodal" data-remodal-id="filter-users" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                        <button class="remodal-close" data-remodal-action="close" aria-label="Close"></button>
                        <div>
                          <div class="row">
                            <div class="col-xs-12">
                              <h3 class="text-center">Filters</h3>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="master_field">
                                <label class="master_label" for="filter_countries">countries </label>
                                <select class="master_input select2" id="filter_countries" multiple="multiple" data-placeholder="Countries" style="width:100%;" ,>
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
                                <label class="master_label" for="filter_cities">cities </label>
                                <select class="master_input select2" id="filter_cities" multiple="multiple" data-placeholder="Cities" style="width:100%;" ,>
                                  <option>Abha</option>
                                  <option>Al-Abwa</option>
                                  <option>Al Artaweeiyah</option>
                                  <option>Badr</option>
                                  <option>Baljurashi</option>
                                  <option>Bisha</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="master_field">
                                <label class="master_label" for="filter_age">Age</label>
                                <select class="master_input select2" id="filter_age" multiple="multiple" data-placeholder="Age " style="width:100%;" ,>
                                  <option>Kids</option>
                                  <option>15-18 Y</option>
                                  <option>18-25 Y</option>
                                  <option>More than 25 Y</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                              <div class="master_field">
                                <label class="master_label">select gender</label>
                                <div class="funkyradio">
                                  <input type="checkbox" name="radio" id="checkboxbtn_2">
                                  <label for="checkboxbtn_2">Male</label>
                                </div>
                                <div class="funkyradio">
                                  <input type="checkbox" name="radio" id="checkboxbtn_3">
                                  <label for="checkboxbtn_3">Female</label>
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
                              <th><span class="cellcontent">Name</span></th>
                              <th><span class="cellcontent">gender</span></th>
                              <th><span class="cellcontent">image</span></th>
                              <th><span class="cellcontent">email</span></th>
                              <th><span class="cellcontent">code</span></th>
                              <th><span class="cellcontent">Phone</span></th>
                              <th><span class="cellcontent">Country</span></th>
                              <th><span class="cellcontent">City</span></th>
                              <th><span class="cellcontent">Gender</span></th>
                              <th><span class="cellcontent">Birthdate</span></th>
                              <th><span class="cellcontent">Registeration date</span></th>
                              <th><span class="cellcontent">status</span></th>
                              <th><span class="cellcontent">actions</span></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
                            </tr>
                            <tr>
                              <td><span class="cellcontent"></span></td>
                              <td><span class="cellcontent">1</span></td>
                              <td><span class="cellcontent">john doe</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent"><img src = "https://source.unsplash.com/random" , class = " img-in-table"></span></td>
                              <td><span class="cellcontent">g@gmail.com</span></td>
                              <td><span class="cellcontent">+2</span></td>
                              <td><span class="cellcontent">0123456789</span></td>
                              <td><span class="cellcontent">KSA</span></td>
                              <td><span class="cellcontent">Jeddah</span></td>
                              <td><span class="cellcontent">Male</span></td>
                              <td><span class="cellcontent">1-1-1975</span></td>
                              <td><span class="cellcontent">5-12-2017</span></td>
                              <td><span class="cellcontent"><i class = "fa icon-in-table-true fa-check"></i><i class = "fa icon-in-table-false fa-times"></i></span></td>
                              <td><span class="cellcontent"><a href= #popupModal_1 ,  class= "action-btn bgcolor--fadegreen color--white "><i class = "fa  fa-pencil"></i></a><a href="#"  class= "btn-warning-confirm action-btn bgcolor--fadebrown color--white "><i class = "fa  fa-trash-o"></i></a></span></td>
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
@endsection