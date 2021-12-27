$("main").on("click", "#display-get-panel", function(e) {
    $("#get-panel").css("display", "block");
    $("#post-panel").css("display", "none");
});

$("main").on("click", "#display-post-panel", function(e) {
    $("#get-panel").css("display", "none");
    $("#post-panel").css("display", "block");
});

$("main").on("click", "#get-request", function(e) {
    $.ajax({
        url: "trading_game/handle_request.php",
        method: "POST",
        data: {
            action : "GET",
            uri    : $("#api-request").val()
        }
    }).done(function(response) {
        $("#api-response").html(response);
    });
});

$("main").on("submit", "#create-offer", function(e) {
    e.preventDefault();

    $.ajax({
        url: "trading_game/handle_request.php",
        method: "POST",
        data: {
            action  : "CreateOffer",
            user_id : $("input[name='user_id']").val(),
            item_id : $("input[name='item_id']").val(),
            price   : $("input[name='price']").val()
        }
    }).done(function(response) {
        $("#api-response").html(response);
    });
});

$("main").on("submit", "#buy-offer", function(e) {
    e.preventDefault();

    $.ajax({
        url: "trading_game/handle_request.php",
        method: "POST",
        data: {
            action   : "BuyOffer",
            offer_id : $("input[name='offer_id']").val(),
            buyer_id : $("input[name='buyer_id']").val()
        }
    }).done(function(response) {
        $("#api-response").html(response);
    });
});