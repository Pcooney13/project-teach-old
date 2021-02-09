/*eslint-disable*/ 

var $ = jQuery.noConflict();

$(document).ready(function() {
      function setDoNotShowBanner() {
    // set default parameterts: no need to change
    var name = "cookieHasBeenSet";
    var value = true;
    var days = 1;

    var date = new Date(); // (1day!)
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "; expires=" + date.toGMTString();

    // have browser set out cookie
    document.cookie = name + "=" + value + expires + "; path=/";
  }

  function doNotShowBanner() {
    // set default parameters: no need to change
    var name = "cookieHasBeenSet";
    var nameEQ = name + "=";
    // read the cookies for this site
    var ca = document.cookie.split(";");
    // format the cookie string we are looking for
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      // cookie set: return value (true).
    }
    // no cookie set
    return null;
  }
  if (doNotShowBanner()) {
    $("#welcome-modal").modal("hide");
}

$("#welcome-modal .close, .nothanks").on("click", function() {
    $("#welcome-modal").modal("hide");
    setDoNotShowBanner();
  });
});
