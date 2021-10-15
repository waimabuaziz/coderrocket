$('.tab_link').on('click', function () {
  var sel_tab_id = $(this).attr('data-tab');

  $('.tab_link' ).css('color','silver');
  $(this).css('color','skyblue');

  $('.tab-pane-rds' ).css('display','none');

  $('#tab-'+ sel_tab_id ).css('display','block');
  

   

});