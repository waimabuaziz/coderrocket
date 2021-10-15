
$(document).on("click", ".btn_tab_maps_delete_entity", function () {

    var myfilename = $(this).attr('data-filename');
    _tab_maps_delete_entity(myfilename, function () {

        render_tab_maps_maps('', function () {
        });

    });

});
