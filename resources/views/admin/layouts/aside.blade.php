<aside class="sidebar navbar-default" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('admin.home.index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{route('admin.post.index')}}" class="active"><i class="fa fa-file-text fa-fw"></i>Quản lý post</a>
            </li>
            <li>
                <a href="{{route('admin.detail.index')}}" class="active"><i class="fa fa-tags fa-fw"></i>Quản lý category</a>
            </li>
            <li>
                <a href="{{route('admin.contact.index')}}" class="active"><i class="fa fa-envelope  fa-fw"></i>Quản lý contact</a>
            </li>
            <li>
                <a href="{{route('admin.subscribe.index')}}" class="active"><i class="fa fa-bell fa-fw"></i>Quản lý subscribe</a>
            </li>
            <li>
                <a href="{{route('admin.comment.index')}}" class="active"><i class="fa fa-comment fa-fw"></i>Quản lý comment</a>
            </li>
            <li>
                <a href="{{route('admin.user.index')}}" class="active"><i class="fa fa-user fa-fw"></i>Quản lý account</a>
            </li>
        </ul>
    </div>
</aside>
<!-- /.sidebar -->