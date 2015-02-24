<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {!! HTML::image('img/default-avatar.png', 'User Image', ['class' => 'img-circle']) !!}
            </div>
            <div class="pull-left info">
                <p>Guest</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                                    class="fa fa-search"></i></button>
                    </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {!! set_active(['show_dashboard']) !!}">
                <a href="{!! route('show_dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="treeview {!! set_active(['artists_path', 'tags_path']) !!}">
                <a href="#">
                    <i class="fa fa-lastfm"></i> <span>Raw Data</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! set_active(['artists_path']) !!}">
                        <a href="{!! route('artists_path') !!}">
                            <i class="fa fa-circle-o"></i> Artists
                        </a>
                    </li>
                    <li class="{!! set_active(['tags_path']) !!}">
                        <a href="{!! route('tags_path') !!}">
                            <i class="fa fa-circle-o"></i> Tags
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
