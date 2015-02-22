<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        {!! HTML::image('img/default-avatar.png', 'User Image', ['class' => 'user-image']) !!}
        <span class="hidden-xs"> {{ Auth::user()->username }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            {!! HTML::image('img/default-avatar.png', 'User Image', ['class' => 'user-image']) !!}

            <p>
                {{ Auth::user()->name }}
                <small>{{ Auth::user()->created_at }}</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Artists</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-right">
                {!! link_to_route('session_destroy', 'Sign out', [], ['class' => 'btn btn-default btn-flat']) !!}
            </div>
        </li>
    </ul>
</li>
