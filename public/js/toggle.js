
$(document).ready(function () {
  $("#show_media").click(function () {
    if ($("#see_media").css('display') == "block") {
      $("#see_media").css('display', 'none');
    } else {
      $("#see_media").css('display', 'block');
    }
  });
});

