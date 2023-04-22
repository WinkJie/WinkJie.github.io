$(function () {
    $(".liList").hide();
    $(".list > li > a").hover(function () {
        $(this).addClass("current").siblings().show().parent().siblings().children("a").removeClass("current").next().hide();
    });
    $("span:hidden").click(function () {
      $(this).parent().hide();
    });
});