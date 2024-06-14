// document.addEventListener('DOMContentLoaded', function () {
//     const sidebar = document.getElementById('sidebar');
//     const toggleButton = document.getElementById('sidebar-toggle');

//     toggleButton.addEventListener('click', function () {
//         if (sidebar.classList.contains('collapsed')) {
//             sidebar.classList.remove('collapsed');
//             sidebar.classList.add('expanded');
//             toggleButton.classList.add('expanded');
//         } else {
//             sidebar.classList.add('collapsed');
//             sidebar.classList.remove('expanded');
//             toggleButton.classList.remove('expanded');
//         }
//     });

//     // Ensure sidebar state is appropriate on page load
//     function adjustSidebar() {
//         if (window.innerWidth < 768) {
//             sidebar.classList.add('collapsed');
//             sidebar.classList.remove('expanded');
//             toggleButton.classList.remove('expanded');
//         } else {
//             sidebar.classList.remove('collapsed');
//             sidebar.classList.add('expanded');
//             toggleButton.classList.add('expanded');
//         }
//     }

//     // Adjust sidebar on page load and on window resize
//     window.addEventListener('load', adjustSidebar);
//     window.addEventListener('resize', adjustSidebar);
// });

// resources/js/sidebar.js
window.toggleDropdown = function(event) {
    event.stopPropagation();
    let dropdown = event.currentTarget.nextElementSibling;
    dropdown.classList.toggle('hidden');
}

document.addEventListener('click', function(event) {
    let dropdowns = document.querySelectorAll('.dropdown-menu');
    dropdowns.forEach(function(dropdown) {
        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }
    });
});
