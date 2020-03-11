        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('backend/images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Session::get('name')}}</div>
                    <div class="email">{{Session::get('email')}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="{{url('profile')}}"><i class="material-icons">person</i>Profile</a></li> -->
                            <!-- <li role="separator" class="divider"></li> -->
                            <li><a href="{{url('logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!-- Home -->
                        <li class="header">HOME</li>
                        <li>
                            <a href="{{url('dashboard')}}">
                                <i class="material-icons">dashboard</i>
                                <span>DASHBOARD</span>
                            </a>
                        </li>
                    <!-- #Home -->

                    <!-- Fitur -->
                        <li class="header">FITUR</li>
                        <!-- <li>
                            <a href="{{url('server')}}">
                                <i class="material-icons">people</i>
                                <span>Server Lokal TJ</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('jadwal')}}">
                                <i class="material-icons">today</i>
                                <span>Jadwal</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('catatan')}}">
                                <i class="material-icons">border_color</i>
                                <span>Catatan</span>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{url('listkuisioner')}}">
                                <i class="material-icons">assignment_turned_in</i>
                                <span>Link Form Laporan</span>
                            </a>
                        </li>
                    <!-- #Fitur -->

                    @if(Session::get('id_role') == 'ADM')
                    <!-- Setting -->
                        <li class="header">SETTING</li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">widgets</i>
                                <span>SETTING</span>
                            </a>
                            <ul class="ml-menu">
                                @if(Session::get('id_role') == 'ADM')
                                <li>
                                    <a href="{{url('bagian')}}">
                                        <i class="material-icons">account_balance</i>
                                        <span>MANAGE BAGIAN</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('role')}}">
                                      <i class="material-icons">security</i>
                                        <span>MANAGE ROLE</span>
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('user')}}">
                                      <i class="material-icons">people</i>
                                      <span>MANAGE USER</span>
                                    </a>
                                </li>
                                @if(Session::get('id_role') == 'ADM')
                                <li>
                                    <a href="{{url('token')}}">
                                      <i class="material-icons">security</i>
                                      <span>MANAGE TOKEN</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    <!-- #Setting -->
                    @endif

                    <!-- Changelogs -->
                        <li class="header">CHANGELOGS</li>
                        <li>
                            <a href="{{ route('changelogs.index') }}">
                                <i class="material-icons">update</i>
                                <span>Changelogs</span>
                            </a>
                        </li>
                    <!-- #Changelogs -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> <a href="javascript:void(0);">Neutron Yogyakarta</a><br>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->