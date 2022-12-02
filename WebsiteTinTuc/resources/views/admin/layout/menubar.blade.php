   <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                          <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="{{ route('admin') }}">
                                <span class="icon-holder">
                                   <i class="far fa-columns"></i>
                                </span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa-solid fa-newspaper"></i>
                                </span>
                                <span class="title">Quản lý tin tức</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('tintuc.index') }}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{ route('tintuc.them') }}">Thêm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-compass"></i>
                                </span>
                                <span class="title">Quản lý loại tin</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('loaitin.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('loaitin.them')}}">Thêm</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-caret-square-down"></i>
                                </span>
                                <span class="title">Quản lý thể loại</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('theloai.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('theloai.them')}}">Thêm</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-caret-square-down"></i>
                                </span>
                                <span class="title">Quản lý Video</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('video.index')}}">Danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('video.them')}}">Thêm</a>
                                </li>
                            </ul>
                        </li>

                        @if (Auth::user()->quyen == 1)
                             <li class="nav-item dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);">
                                    <span class="icon-holder">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <span class="title">Quản lý User</span>
                                    <span class="arrow">
                                        <i class="arrow-icon"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('users.index') }}">Danh sách</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.them') }}">Thêm</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                       
                    </ul>
                </div>
            </div>