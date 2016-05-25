@extends('layouts.app')

@section('head')
    <title>{{ trans('messages.Menu_admin') }}</title>
    <link href="{{URL::asset('css/bonsai.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')


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
                                <a href="/noticia/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Add_news') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a></li>
                            <li>
                                <a href="/llistanoticies">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Allnews') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistanoticiespen">
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
                                <a href="/event/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.Add_event') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistaevents">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                     {{ trans('messages.All_event') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistaeventspen">
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
                                <a href="/tipusevent/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    {{ trans('messages.add_type') }}
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistatipus">
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
                                <a href="/llistacarrers">
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
    </div>


@endsection

@section('mytree')
    <script src="{{URL::asset('js/bonsai.min.js')}}" type="text/javascript"></script>
    <script>
        new $.bonsai($('.bonsai'));
    </script>
@endsection

