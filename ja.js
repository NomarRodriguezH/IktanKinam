$(function () {

  var transTime = 5000;

  var numBgColors = $(".bg-grad").length;

  var bgtrans = setInterval(function () {
    if ($(".bg-grad.active").index() == $(".bg-grad").length - 1) {
      $(".bg-grad.active").removeClass("active");
      $(".bg-grad").eq(0).addClass("active");
    } else {
      var curIndex = $(".bg-grad.active").index();
      $(".bg-grad.active").removeClass("active");
      $(".bg-grad")
        .eq(curIndex + 1)
        .addClass("active");
    }
  }, transTime);

  /***** SHOW/HIDE PASSWORD *****/

  $(".show-pass").click(function () {
    if ($(this).hasClass("showing")) {
      $(this).attr("title", "show characters");
      $(this).removeClass("showing");
      $("#password").attr("type", "password");
    } else {
      $(this).attr("title", "hide characters");
      $(this).addClass("showing");
      $("#password").attr("type", "text");
    }
  });

  /***** PARALLAXATIVE *****/

  var moveSpeed = 0.05;

  var login = $(".login-wrapper");
  var transX = $(".x-wrapper");
  var transY = $(".y-wrapper");

  var winMidX = $(window).width() / 2;
  var winMidY = $(window).height() / 2;

  $(window).resize(function () {
    winMidX = $(window).width() / 2;
    winMidY = $(window).height() / 2;
  });

  $(window).mousemove(function (e) {
    var mX = e.pageX;
    var mY = e.pageY;
    var xDif = winMidX - mX;
    var yDif = winMidY - mY;

    login.css({
      marginTop: yDif * moveSpeed,
      marginLeft: xDif * moveSpeed
    });

    transX.css({
      "-webkit-transform": "rotateX(" + yDif * moveSpeed * -1 + "deg)",
      "-moz-transform": "rotateX(" + yDif * moveSpeed * -1 + "deg)",
      transform: "rotateX(" + yDif * moveSpeed * -1 + "deg)"
    });

    transY.css({
      "-webkit-transform": "rotateY(" + xDif * moveSpeed * -1 + "deg)",
      "-moz-transform": "rotateY(" + xDif * moveSpeed * -1 + "deg)",
      transform: "rotateY(" + xDif * moveSpeed * -1 + "deg)"
    });
  });
});
$(function () {
  /***** BG TRANSITIONING *****/

  var transTime = 5000;

  var numBgColors = $(".bg-grad").length;

  var bgtrans = setInterval(function () {
    if ($(".bg-grad.active").index() == $(".bg-grad").length - 1) {
      $(".bg-grad.active").removeClass("active");
      $(".bg-grad").eq(0).addClass("active");
    } else {
      var curIndex = $(".bg-grad.active").index();
      $(".bg-grad.active").removeClass("active");
      $(".bg-grad")
        .eq(curIndex + 1)
        .addClass("active");
    }
  }, transTime);

  /***** SHOW/HIDE PASSWORD *****/

  $(".show-pass").click(function () {
    if ($(this).hasClass("showing")) {
      $(this).attr("title", "show characters");
      $(this).removeClass("showing");
      $("#password").attr("type", "password");
    } else {
      $(this).attr("title", "hide characters");
      $(this).addClass("showing");
      $("#password").attr("type", "text");
    }
  });

  /***** PARALLAXATIVE *****/

  var moveSpeed = 0.05;

  var login = $(".login-wrapper");
  var transX = $(".x-wrapper");
  var transY = $(".y-wrapper");

  var winMidX = $(window).width() / 2;
  var winMidY = $(window).height() / 2;

  $(window).resize(function () {
    winMidX = $(window).width() / 2;
    winMidY = $(window).height() / 2;
  });

  $(window).mousemove(function (e) {
    var mX = e.pageX;
    var mY = e.pageY;
    var xDif = winMidX - mX;
    var yDif = winMidY - mY;

    login.css({
      marginTop: yDif * moveSpeed,
      marginLeft: xDif * moveSpeed
    });

    transX.css({
      "-webkit-transform": "rotateX(" + yDif * moveSpeed * -1 + "deg)",
      "-moz-transform": "rotateX(" + yDif * moveSpeed * -1 + "deg)",
      transform: "rotateX(" + yDif * moveSpeed * -1 + "deg)"
    });

    transY.css({
      "-webkit-transform": "rotateY(" + xDif * moveSpeed * -1 + "deg)",
      "-moz-transform": "rotateY(" + xDif * moveSpeed * -1 + "deg)",
      transform: "rotateY(" + xDif * moveSpeed * -1 + "deg)"
    });
  });
});