@extends('admin.layouts.admin_master')
@section('content')

  <div id="page-inner">
      <div class="row">
          <div class="col-md-12">
              <h1 class="page-head-line">DASHBOARD</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div class="alert alert-info">
                <div class="prod-subcontent">
                  <div class="faqsearch">
                    <div class="faqsearchinputbox">
                      <div class="input-group input-group-lg">
                        <span class="input-group-addon">@</span>
                        <input type="text" id="faq_search_input" name="keyword" class="form-control" placeholder="Username">
                      </div>
                    </div>
                  </div>
                  <div id="searchresultdata" class="faq-articles"> </div>
		            </div>

              </div>
          </div>
      </div>

  <!-- /. PAGE INNER  -->
  </div>


@stop
