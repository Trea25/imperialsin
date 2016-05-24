@extends('layouts.app')

@section('head')
    <title>Administracio</title>
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
                    Administracio
                    <i class="icon-chevron-sign-right"></i>
                </a>
                <ul class="section">
                    <li class="folder">
                        <a class="" href="">
                            <i class="icon-caret-right"></i>
                            <i class="icon-folder icon-doctype icon-folder-close"></i>
                            Noticia
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="/noticia/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Afegir Noticia
                                    <i class="icon-chevron-sign-right"></i>
                                </a></li>
                            <li>
                                <a href="/llistanoticies">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Totes les Noticies
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistanoticiespen">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Noticies Pendents
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
                            Events
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="/event/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Afegir Event
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistaevents">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Tots els events
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistaeventspen">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Events pendents
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
                            Tipus Events
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="/tipusevent/create">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Afegir Tipus Event
                                    <i class="icon-chevron-sign-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/llistatipus">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Tots els tipus de events
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
                            Altres
                            <i class="icon-chevron-sign-right"></i>
                        </a>
                        <ul class="section">
                            <li>
                                <a href="/llistacarrers">
                                    <i class="icon-filetype icon-doctype icon-columns"></i>
                                    Modificar carrer
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

