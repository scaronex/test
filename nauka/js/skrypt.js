(function()
{

    var znajdz = $(".menu_li"),
        strona =$(".str");
        links = $("a");
        dodawanieklasy ="decoration";

znajdz.first().addClass(dodawanieklasy).css("font-size","24px");

strona.not(":first").hide();

znajdz.on("click",function(){

var this_in =$(this),
    index = this_in.index();

    znajdz.removeClass(dodawanieklasy);
    this_in.addClass(dodawanieklasy);
    strona.hide().eq(index).fadeIn(700);


});
})();


//$('ul li').each(function($) {
//    if ( i === 0 ) {
//       $(this).addClass('decoration');
//    }
