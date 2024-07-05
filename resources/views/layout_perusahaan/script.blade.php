
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<script>
        const toggleSidebarButton = document.getElementById('toggle-sidebar');
        const sidebar = document.getElementById('sidebar-multi-level-sidebar');

        toggleSidebarButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>