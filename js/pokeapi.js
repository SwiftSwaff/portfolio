$(document).on("submit", "#poke-search-form", function(e) {
    e.preventDefault();

    $.ajax({
        url: "",
        method: "POST",
        dataType: "json",
        data: {
            action : "SearchForPokemon",
            name   : $("input[name='pokemon-name']").val()
        }
    }).done(function(response) {
        $("#poke-search-result").empty().html(response.data);
    });
});