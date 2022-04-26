var oldTopId = "img4";
var oldTop = "300px";
var oldLeft = "300px";

function moveToTop(newTopId) {
  console.log(newTopId);
  //updating z-index of the new top image
  document.getElementById(newTopId).style.zIndex = "10";

  document.getElementById(oldTopId).style.zIndex = "0";

  //updating old top image
  oldTopId = newTopId;
}
