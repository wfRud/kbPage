import smoothscroll from "smoothscroll-polyfill";

(function($) {
  // kick off the polyfill!
  smoothscroll.polyfill();

  // Toggle visible class form
  $(".form-toggle").click(function() {
    $(".form-wrap").toggleClass("visible");
    $closeBtn = $("<div/>")
      .addClass("close-btn")
      .appendTo(".form");

    $closeBtn.click(function() {
      $(".form-wrap").toggleClass("visible");
      $(".close-btn").remove();
    });
  });

  // Remove auto paragraphs
  $("p")
    .filter(function() {
      return this.innerHTML.replace("&nbsp;", " ").trim() == "";
    })
    .remove();

  // Remove br markups
  $("br").remove();

  // Add manually class for section #about paragraph
  $("#about p").addClass("text");
})(jQuery);
