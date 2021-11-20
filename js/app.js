var mqSmall = window.matchMedia('(max-width: 1200px)');
var mqLarge = window.matchMedia('(min-width: 1201px)');

$('document').ready(function() {
    function removeNavActiveState(e) {
        if (e.matches) {
            $('ul.navbar-container').removeClass('active');
            $('ul.navbar-container').find('ul').removeClass('active');
        }
    }

    $('.navbar-elem a').click(function() {
        if (mqSmall.matches) {
            var dropdown = $(this).next();
            if (dropdown.hasClass("navbar-dropdown")) {
                if (!dropdown.hasClass('active')) {
                    if (!(dropdown.parent().parent().hasClass("active") && dropdown.parent().parent().hasClass("navbar-dropdown"))) {
                        $('ul.navbar-container').find('ul').removeClass('active');
                    }
                    else {
                        dropdown.parent().parent().find('ul').removeClass('active');
                    }
                    dropdown.addClass('active');
                }
                else {
                    dropdown.removeClass('active');
                    dropdown.find('ul').removeClass('active');
                }
            }
        }
    });

    $('.navbar-ham').click(function() {
        if (mqSmall.matches) {
            if (!$('ul.navbar-container').hasClass('active')) {
                $('ul.navbar-container').addClass('active');
            }
            else {
                $('ul.navbar-container').removeClass('active');
                $('ul.navbar-container').find('ul').removeClass('active');
            }
        }
    });

    mqLarge.addEventListener("change", removeNavActiveState);
});