$(document).ready(function() {

  function reload() {
    $('.hidden').fadeOut();
    $('displayOutput').empty();
    $.getJSON( '../example').done(function(data) {
      console.log("showing", data);
      var rendered = "<ul>";
      data.items.forEach(function(item) {
        rendered = rendered + "<li>The word <b>" + item.word + "</b> is defined as <b>" + item.definition + "</b></li>";
      });
      rendered = rendered + "</ul>";

      $('#displayOutput').html(rendered);
    });
    $('.hidden').fadeIn();
  }

  $('#add-word').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: '../example',
      type: 'PUT',
      data: $(this).serialize(),
      success: function(data) {
        reload();
      }
    });
  });

  // load data on start
  reload();

});
