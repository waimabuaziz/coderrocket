function Init(callback) {

  // test
  render_pages('', function () {
    //alert(this);
  });

  _get_project_destination();


  callback.call('done');
}
