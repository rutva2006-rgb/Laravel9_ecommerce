(function ($) {
    'use strict';
    $(function () {
        var body = $('body');
        var sidebar = $('.sidebar');

        //Add active class to nav-link based on URL dynamically
        function addActiveClass(element) {
            var currentPath = location.pathname;
            var currentHref = element.attr('href');

            // Handle both full path and partial path matches
            if (currentHref && currentPath.indexOf(currentHref) > -1) {
                element.parents('.nav-item').last().addClass('active');
                if (element.parents('.sub-menu').length) {
                    // Use Bootstrap 5's data-bs-toggle for collapsing
                    element.closest('.collapse').addClass('show');
                    element.addClass('active');
                }
            }
        }

        $('.nav li a', sidebar).each(function () {
            var $this = $(this);
            addActiveClass($this);
        });

        // Close other submenus on opening any new one
        // This is the key fix: it now looks for data-bs-toggle="collapse" and correctly targets the sidebar
        sidebar.on('show.bs.collapse', '.collapse', function () {
            // Find all open collapse elements inside the sidebar that are not the current one
            var otherCollapses = sidebar.find('.collapse.show').not(this);

            // Hide the other open collapse elements
            otherCollapses.collapse('hide');
        });

        //Change sidebar mini view
        $('[data-toggle="minimize"]').on("click", function () {
            body.toggleClass('sidebar-icon-only');
        });

        //checkbox and radios
        $(".form-check label, .form-radio label").append('<i class="input-helper"></i>');

        // Handle Pro Banner
        // The banner functionality remains the same as it does not affect the sidebar
        var proBanner = document.querySelector('#proBanner');
        var navbar = document.querySelector('.navbar');
        var pageBody = document.querySelector('.page-body-wrapper');

        function setBannerClosed() {
            localStorage.setItem('majestic-free-banner', 'true');
        }
        function isBannerClosed() {
            return localStorage.getItem('majestic-free-banner') === 'true';
        }

        if (proBanner && navbar && pageBody) {
            if (!isBannerClosed()) {
                proBanner.classList.add('d-flex');
                navbar.classList.remove('fixed-top');
            } else {
                proBanner.classList.add('d-none');
                navbar.classList.add('fixed-top');
            }

            if (navbar.classList.contains("fixed-top")) {
                pageBody.classList.remove('pt-0');
                navbar.classList.remove('pt-5');
            } else {
                pageBody.classList.add('pt-0');
                navbar.classList.add('pt-5');
                navbar.classList.add('mt-3');
            }

            var bannerCloseBtn = document.querySelector('#bannerClose');
            if (bannerCloseBtn) {
                bannerCloseBtn.addEventListener('click', function () {
                    proBanner.classList.add('d-none');
                    proBanner.classList.remove('d-flex');
                    navbar.classList.remove('pt-5');
                    navbar.classList.add('fixed-top');
                    pageBody.classList.add('proBanner-padding-top');
                    navbar.classList.remove('mt-3');
                    setBannerClosed();
                });
            }
        }
    });
})(jQuery);
