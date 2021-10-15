 $('#btn_call_render').on('click', function() {

   
        // AJAX Call starts here =====
        var request = {
            render_name: 'test',
            // retobj: retobj,
        }
        Render(request, function() {
               alert(this);
            })
            // End of AJAX Call ============

    





});