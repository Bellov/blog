$(document).ready(function () {
    $('.delete').click(function () {
        var checkstr = confirm('Are you sure you wanna to delete this post?');
        if (checkstr == true) {
            return true
        } else {
            return false;
        }
    });


});
