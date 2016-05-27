@extends('layouts.app')

@section('head')
    <title>{{ trans('messages.Menu_admin') }}</title>
    <link href="{{URL::asset('css/bonsai.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
     <link href="{{URL::asset('css/simple-sidebar.css')}}" rel="stylesheet">
@endsection

@section('content')

 <div id="wrapper">
 
  <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!--
    <div class="bonsai">
        <ul class="section">
            <li class="folder">
                <a class="" href="">
                    <i class="icon-caret-right"></i>
                    <i class="icon-doctype icon-columns"></i>
                    {{ trans('messages.Menu_admin') }}
                    <i class="icon-chevron-sign-right"></i>
                </a>
                <ul class="section">
                    <li class="folder">
                        <a class="" href="">
                            <i class="icon-caret-right"></i>
                            <i class="icon-folder icon-doctype icon-folder-close"></i>
                            {{ trans('messages.Menu_news') }}
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="noticia/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Add_news') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a></li>
                            <li>
                                <a href="llistanoticies">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Allnews') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="llistanoticiespen">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                     {{ trans('messages.pending_news') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="section">
                    <li class="folder">
                        <a class="" href="">
                            <i class="icon-caret-right"></i>
                            <i class="icon-folder icon-doctype icon-folder-close"></i>
                             {{ trans('messages.events') }}
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="event/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Add_event') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="llistaevents">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                     {{ trans('messages.All_event') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="llistaeventspen">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.pending_events') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <ul class="section">
                    <li class="folder">
                        <a class="" href="">
                            <i class="icon-caret-right"></i>
                            <i class="icon-folder icon-doctype icon-folder-close"></i>
                           {{ trans('messages.event_type') }}
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="tipusevent/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.add_type') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="llistatipus">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.all_types') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="section">
                    <li class="folder">
                        <a class="" href="">
                            <i class="icon-caret-right"></i>
                            <i class="icon-folder icon-doctype icon-folder-close"></i>
                            {{ trans('messages.other') }}
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="llistacarrers">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.edit_street') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div> <!-- bonsai -->
     <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
   
    </div>
    <!-- /#wrapper -->

@endsection

@section('mytree')
    <script src="{{URL::asset('js/bonsai.min.js')}}" type="text/javascript"></script>
    <script>
        new $.bonsai($('.bonsai'));
    </script>
     <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
@endsection

