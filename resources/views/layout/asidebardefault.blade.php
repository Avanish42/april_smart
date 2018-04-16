<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  {{ Auth::user()->name }}</div>
                <div class="email">  {{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>Sign Out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                {{--<li class="header">MAIN NAVIGATION</li>--}}
                <li class="active">
                    <a href={{url('/home')}}>
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{url('/merchant')}}">--}}
                        {{--<i class="material-icons">text_fields</i>--}}
                        {{--<span>client Registration</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{url('add-language')}}" class="menu-toggle">--}}
                        {{--<i class="material-icons">widgets</i>--}}
                        {{--<span>Languages</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Permission</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('/Permission/add')}}">
                                <span>Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/Permission/show')}}">
                                <span>Show</span>
                            </a>

                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Employee</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('/Employee/add')}}">
                                <span>Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/Employee/show')}}">
                                <span>Show</span>
                            </a>

                        </li>
                    </ul>
                </li>



                {{--<li>--}}
                {{--<a href="javascript:void(0);" class="menu-toggle">--}}
                {{--<i class="material-icons">widgets</i>--}}
                {{--<span>SubCategories</span>--}}
                {{--</a>--}}
                {{--<ul class="ml-menu">--}}
                {{--<li>--}}
                {{--<a href="{{url('/SubCategories/add')}}">--}}
                {{--<span>Add</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="{{url('/SubCategories')}}">--}}
                {{--<span>Show</span>--}}
                {{--</a>--}}

                {{--</li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                <li>
                <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Role</span>
                    </a>
                <ul class="ml-menu">
                    <li>
                            <a href="{{url('Role/add')}}">
                                <span>Add</span>
                            </a>
                        </li>
                    <li>
                            <a href="{{url('Role/show')}}">
                                <span>Show</span>
                            </a>

                        </li>
                </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Relation</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('Relation/EmployeeRelation')}}">
                                <span>Employee-Role</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('Relation/PermissionRelation')}}">
                                <span>Role-Permission</span>
                            </a>

                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Cheque Penalty</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('ChequePenalty/show')}}">
                                <span>Show cheque penalty</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('ChequePenalty/add')}}">
                                <span>Add new cheque Penalty</span>
                            </a>

                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Employee Penalty</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('ChequePenalty/EmployeeRelation')}}">
                                <span>Show Employee penalty</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('ChequePenalty/PermissionRelation')}}">
                                <span>Add new Employee Penalty</span>
                            </a>

                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 <a href="javascript:void(0);"> Smart Distributor </a>.
            </div>
            <div class="version">
                {{--<b>Version: </b> 1.0.0--}}
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" >
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple" class="active">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>