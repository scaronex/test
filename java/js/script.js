var huj="ja pierdole ";
 (function(){

var tooltip = null;

function createToolTip (text,options)
{
var div = document.createElement("div");
div.textContent =text;
div.className ="tooltip hidden";


document.body.appendChild(div)

div.style.top = (options.y + options.w / 2 -div.offsetWidth /2 ) + "px";
div.style.left= (options.x -div.offsetHeight )+ "px";
div.classList.remove("hidden")

tooltip = div;
}


function showTooltip(e) {
  var title = e.target.getAttribute("title");
   createToolTip(title,{
     w:e.target.offsetWidth,
     x:e.target.offsetLeft,
     y:e.target.offsetTop
   });
}

function removeTooltip() {
  tooltip.parentNode.removeChild(tooltip);


}

var title = document.querySelectorAll("[title]");

  for (var i = 0; i < title.length; i++) {
   title[i].addEventListener("mouseenter",showTooltip,false);
    title[i].addEventListener("mouseleave",removeTooltip,false);
  }


 })();
