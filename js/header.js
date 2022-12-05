$(document).ready(function() {
    $('#quickLoginInvalidEmail').hide();
    $('#quickLoginInvalidPassword').hide();

    $("#quickLoginSidebar").on('submit', e => {
        e.preventDefault();

        const data = {
            email: $("#quickLoginEmail").val(),
            password: $("#quickLoginPassword").val()
        };

        if (!data.email) {
            $('#quickLoginInvalidEmail').show();
            return;
        } else {
            $('#quickLoginInvalidEmail').hide();
        }

        if (!data.password) {
            $('#quickLoginInvalidPassword').show();
            return;
        } else {
            $('#quickLoginInvalidPassword').hide();
        }

        $.post('/plugins/signup/ajax/login.php', data, response => {
            const data = JSON.parse(response);
            if (data.success) {
                window.location.href = "/account-details.html";
                return;
            }

            $.fancybox.open("Login failed. Please try again.");
        });
    });

    $("#loginForm").on('submit', e => {
        e.preventDefault();

        const data = {
            email: $("#loginEmail").val(),
            password: $("#loginPassword").val()
        };

        if (!data.email) {
            $('#loginInvalidEmail').show();
            return;
        } else {
            $('#loginInvalidEmail').hide();
        }

        if (!data.password) {
            $('#loginInvalidPassword').show();
            return;
        } else {
            $('#loginInvalidPassword').hide();
        }

        $.post('/plugins/signup/ajax/login.php', data, response => {
            const data = JSON.parse(response);
            if (data.success) {
                window.location.href = "/account-details.html";
                return;
            }

            $.fancybox.open("Login failed. Please try again.");
        });
    });

    $('.all-categories-menu-toggle').on('click', function (e) {
        var $mmenu = $('.mobilemenu');
        $mmenu.on('click', 'a', function (e) {
            if ($(e.target).parent('li').find('ul').length) {
                e.preventDefault();
                that.defaults.curItem = $(this).parent();
                that._updateActiveMenu();
            }
        });
        $mmenu.on('click', '.nav-toggle', function () {
            that._updateActiveMenu('back');
        });
        $mmenu.on('click', '.nav-viewall', function (e) {
            e.stopPropagation();
            location.href = $(this).attr('href');
        });

        var $this = $(this);
        $this.toggleClass('open');

        $('.hdr').toggleClass('open');
        $('.mmenu-js').addClass('disable').delay(1000).queue(function () {
            $this.removeClass('disable').dequeue();
        });

        e.preventDefault();

        $('.mobilemenu').toggleClass('active');
        $(".mobile-menu").toggleClass('active');
        $(".mobilemenu-toggle").toggleClass('active');
        $("body").toggleClass('slidemenu-open');

        $('.nav-wrapper').css({
            "height": $('.nav-wrapper .nav-level-1').outerHeight()
        });
    });

    $.get('/plugins/user/isAuthenticated.php', function(response) {
        const data = JSON.parse(response);

        if (data.authenticated === true) {
            $("#login-sidebar-btn").hide();
            $("#register-sidebar-btn").hide();
            $("#account-sidebar-btn").show();
            $("#quickLoginLogout").show();
            $(".quick-login-section").hide();

            $.get('/plugins/signup/ajax/getUserData.php', response => {
                const data = JSON.parse(response);

                window.localStorage.setItem('authUser', JSON.stringify(data));
                
                $("#welcomeUserSidebar").show();
                $("#welcomeUserSidebar").append(data.name);
            });
        }
    });

    $("#quickLoginLogout").on('click', () => {
        $.post('/plugins/user/logout.php', () => {
            window.location.href = "/";
        })
    });
});
