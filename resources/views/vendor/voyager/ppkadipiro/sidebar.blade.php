<?php
$user_avatar = Voyager::image(Auth::user()->avatar);
?>
<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ config('app.url') }}">
                    <div class="logo-icon-container">
                        <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'PP Kadipiro')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('guest', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
