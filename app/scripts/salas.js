'use strict';
$(document).ready(function() {
    $("#search").css({ width: '200px', opacity: '0.7', transition: 'width 1s' });
    $("#search").on('focusin', function() {
            $("#search").css({ width: '300px', opacity: '1' });
        })
        .on('focusout', function() {
            $("#search").css({ width: '200px', opacity: '0.7' });
        });
});
