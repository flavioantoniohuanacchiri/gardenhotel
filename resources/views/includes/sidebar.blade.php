<?php

if (!Session::has("sistema.modulos")) {
    $padres = App\Modulo::where(
        "parent",
        "=",
        0
    )->orderBy("orden", "ASC")
    ->get();

    $modulos = [];
    foreach ($padres as $key => $value) {
        $modulos[$value->id]["cabecera"] = $value;
        $modulos[$value->id]["cuerpo"] = [];
    }
  $usuarioPerfil = App\User::with("perfils")->find(Auth::user()->id);
  $perfiles = $usuarioPerfil->perfils;

    foreach ($perfiles as $key => $value) {
        $modulosPerfil = App\Perfil::with("modulos")->find($value->id_perfil);

        foreach ($modulosPerfil->modulos as $key2 => $value2) {
                //echo $value2->visible;
            if (isset($modulos[$value2->parent])) {
                if ($value2->visible == 1 && $value2->estado > 0) {
                        $modulos[$value2->parent]["cuerpo"][] = $value2;
                }
            }
        }
    }
    Session::put("sistema.modulos", $modulos);
} else {
    $modulos = Session::get("sistema.modulos");
}


    //print_r($modulos);

    //print_r($usuarioPerfil->perfils);
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
                <a href="{{ url('/') }}" class="site_title"><i class="fa fa-paw"></i> <span>{{ trans('master.name') }}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
                <div class="profile_pic">
                    <!--<img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">-->
                    <img src="{{ asset('imgs-front/icons/logo_admin.jpg') }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
                </div>
                <div class="profile_info">
                        <span>{{ trans('master.welcome') }},</span>
                        <h2>{{ Auth::user()->name }}</h2>
                </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <div class="clearfix"></div>
        <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section"></div>

                <div class="menu_section">
                    <ul class="nav side-menu">
                        @foreach ($modulos as $modulo)
                            @if (count($modulo['cuerpo']) > 0)
                            <li>
                                <a>
                                    <i class="fa {{ $modulo['cabecera']['class_icon'] }} " aria-hidden="true"></i> {{ $modulo['cabecera']['nombre'] }} <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    @foreach ($modulo['cuerpo'] as $submodulo)
                                        <li><a href="{{ url($submodulo['url']) }}">{{ $submodulo['nombre']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <!--
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li>
                            <a>
                                <i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span>
                            </a>
                            <ul class="nav child_menu">
                                <li>
                                    <a href="#">Level One</a>
                                </li>
                                <li>
                                    <a>Level One<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu">
                                                <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                                <a href="#">Level Two</a>
                                        </li>
                                        <li>
                                                <a href="#">Level Two</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Level One</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
                -->
            </div>
            <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <!-- 
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            -->
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>