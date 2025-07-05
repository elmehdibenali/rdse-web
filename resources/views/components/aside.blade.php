    <aside class="admin__sidebar" id="admin-sidebar">
        <div class="sidebar__header">
            <a href="#" class="sidebar__logo">
                <img src="{{asset('img/rdse-white-logo.png')}}" alt="RDSE Logo" class="logo__white">
            </a>
            <div class="sidebar__close" id="sidebar-close">
                <i class="ri-close-line"></i>
            </div>
        </div>

        <ul class="sidebar__nav">
            <li><a href="{{route('admin.index')}}"><i class="ri-dashboard-line"></i> Dashboard</a></li>
            <li><a href="{{route('users.index')}}"><i class="ri-user-line"></i> Utilisateurs</a></li>
            <li><a href="{{route('consultation.index')}}"><i class="ri-psychotherapy-line"></i>Consultations</a></li>
            <li><a href="{{route('offers.index')}}"><i class="ri-folder-line"></i> Offres</a></li>
            <li><a href="{{route('service.index')}}"><i class="ri-service-line"></i> Services</a></li>
            <li><a href="{{route('projects.index')}}"><i class="ri-briefcase-fill "></i> Projects</a></li>
            <li><a href="{{route('login.logout')}}"><i class="ri-logout-box-r-line"></i> Logout</a></li>
        </ul>
    </aside>

    <!-- Toggle Button (visible on small screens) -->
    <div class="sidebar__toggle" id="sidebar-toggle">
        <i class="ri-menu-line"></i>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById('admin-sidebar'),
                  sidebarToggle = document.getElementById('sidebar-toggle'),
                  sidebarClose = document.getElementById('sidebar-close');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.add('show-sidebar');
                });
            }

            if (sidebarClose) {
                sidebarClose.addEventListener('click', () => {
                    sidebar.classList.remove('show-sidebar');
                });
            }
        });
    </script>
