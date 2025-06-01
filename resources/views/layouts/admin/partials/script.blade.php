<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationDropdown = document.getElementById('notificationDropdown');
        const userProfile = document.getElementById('userProfile');
        const userDropdown = document.getElementById('userDropdown');

        // Mobile menu functions
        function openSidebar() {
            sidebar.classList.add('show');
            overlay.classList.add('show');
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }

        // Mobile menu events
        mobileMenuBtn.addEventListener('click', openSidebar);
        sidebarClose.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Submenu functionality
        document.querySelectorAll('.nav-item.has-submenu').forEach(item => {
            const link = item.querySelector('.nav-link');
            const submenu = item.querySelector('.submenu');

            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Close other submenus
                document.querySelectorAll('.nav-item.has-submenu').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('open');
                        otherItem.querySelector('.submenu').classList.remove('open');
                    }
                });

                // Toggle current submenu
                item.classList.toggle('open');
                submenu.classList.toggle('open');
            });
        });

        // Notification dropdown
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationDropdown.classList.toggle('show');
            userDropdown.classList.remove('show');
        });

        // User profile dropdown
        userProfile.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
            notificationDropdown.classList.remove('show');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            notificationDropdown.classList.remove('show');
            userDropdown.classList.remove('show');
        });

        // Navigation active states
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                const hasSubmenu = this.closest('.nav-item.has-submenu') &&
                    this.closest('.nav-item.has-submenu').querySelector('.nav-link') === this;

                if (!hasSubmenu) {
                    e.preventDefault();
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    // Close mobile menu
                    if (window.innerWidth <= 768) {
                        closeSidebar();
                    }
                }
            });
        });

        // Close sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                closeSidebar();
            }
        });

        // Animate progress bars on load
        setTimeout(() => {
            document.querySelectorAll('.progress-bar').forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        }, 500);
    });
</script>

@stack('scripts')
