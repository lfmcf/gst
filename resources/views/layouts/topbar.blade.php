<div class="top_bar navbar-custom">
            <ul class="list-unstyled topbar-menu float-end mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-toggle='dropdown' id="dropdownMenuButton" style="display: block;cursor:pointer;">
                        <span class="account-user-avatar">
                            <img src="/download.png" alt="user-image" class="rounded-circle" />
                        </span>
                        <span>
                            <span>{{ Auth::user()->name }}</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>
                        <a class="dropdown-item notify-item">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Log out</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>


        <script type="text/javascript">
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
   </script>