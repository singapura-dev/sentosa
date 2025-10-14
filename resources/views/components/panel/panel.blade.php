@php use Sentosa\Components\Panel\Panel; @endphp
<x-sentosa::layouts.html :html-attributes="$self->getAttributes('html')">
    <div class="page">
        <!-- BEGIN NAVBAR  -->
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                        aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <!-- BEGIN NAVBAR LOGO -->
                <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{panel()->getHomeUrl()}}" aria-label="{{panel()->getBrandName()}}">
                        {{panel()->getBrandName()}}
                    </a>
                </div>
                <!-- END NAVBAR LOGO -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                           aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                  style="background-image: url({{panel()->auth()->user()->avatar}})"> </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{panel()->auth()->user()->name}}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            @if(panel()->hasLogin())
                                <a href="{{panel()->route('auth.logout')}}" class="dropdown-item">Logout</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <!-- BEGIN NAVBAR MENU -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-1">
                      <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg></span>
                                <span class="nav-link-title"> Home </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                               data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler.io/icons/icon/lifebuoy -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="icon icon-1">
                      <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                      <path d="M15 15l3.35 3.35"></path>
                      <path d="M9 15l-3.35 3.35"></path>
                      <path d="M5.65 5.65l3.35 3.35"></path>
                      <path d="M18.35 5.65l-3.35 3.35"></path></svg></span>
                                <span class="nav-link-title"> Help </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                                    Documentation </a>
                                <a class="dropdown-item" href="./changelog.html"> Changelog </a>
                                <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank"
                                   rel="noopener"> Source code </a>
                                <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm"
                                   target="_blank" rel="noopener">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/heart -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="icon icon-inline me-1 icon-2">
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                                    </svg>
                                    Sponsor project!
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- END NAVBAR  -->
        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            @if($header_children = $self->getChildren(Panel::CHILDREN_POSITION_HEADER))
                <div class="page-header">
                    @include('sentosa::components.partials.children',[
                        'children' => $header_children,
                    ])
                </div>
            @endif
            <!-- END PAGE HEADER -->
            <!-- BEGIN PAGE BODY -->
            <div class="page-body">
                <div class="container-xl">
                    @include('sentosa::components.partials.children', [
                        'children' => $self->getChildren(),
                    ])
                </div>
            </div>
            <!-- END PAGE BODY -->
            @if($footer_children = $self->getChildren(Panel::CHILDREN_POSITION_FOOTER))
                <!--  BEGIN FOOTER  -->
                <footer class="footer footer-transparent d-print-none">
                    @include('sentosa::components.partials.children',[
                       'children' => $footer_children,
                    ])
                </footer>
                <!--  END FOOTER  -->
            @endif
        </div>
    </div>
</x-sentosa::layouts.html>
