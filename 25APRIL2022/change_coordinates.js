document.getElementById("change").onclick = moveText;

function moveText() {
  var text = document.getElementById("text");
  var x = document.getElementById("xcoord").value;
  var y = document.getElementById("ycoord").value;
  text.style.left = x + "px";
  text.style.top = y + "px";
}
