$(document).ready(function () {
    $("#googleText").hide();
    $("#facebookText").hide();

    $("#googleBtn").click(function () {
        $("#googleText").fadeIn(1000, function () {
            $(this).delay(1000).fadeOut();
        });
        $("#facebookText").hide();
    });

    $("#facebookBtn").click(function () {
        $("#facebookText").fadeIn(1000, function () {
            $(this).delay(1000).fadeOut();
        });
        $("#googleText").hide();
    });
});