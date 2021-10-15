$('.btn_add_new_entity').on('click', function () {

    var mytab = $(this).attr('data-tab');

    var sender = {
        mytab: mytab,
    }
    _create_new_entity(sender, function () {

      alert(this);

    });



});