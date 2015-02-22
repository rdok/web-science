<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {!! HTML::image('img/default-avatar.png', 'User Image', ['class' => 'user-image']) !!}
        <span class="hidden-xs">Guest</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            {!! HTML::image('img/default-avatar.png', 'User Image', ['class' => 'user-image']) !!}

            <p>
                Guest
                <small>{!! Carbon\Carbon::now() !!}</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="">Artists</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer disabled">
            <div class="pull-left">
                {!! link_to_route('register_index', 'Sign Up', [], ['class' => 'btn btn-default btn-flat']) !!}
            </div>
            <div class="pull-right">
                {!! link_to_route('session_index', 'Sign In', [], ['class' => 'btn btn-default btn-flat']) !!}
            </div>
        </li>
    </ul>
</li>
