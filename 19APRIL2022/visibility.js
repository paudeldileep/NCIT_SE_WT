document.getElementById("button").onclick = changeVisibility;

function changeVisibility() {
  var x = document.getElementById("div");
  if (x.style.visibility == "hidden") {
    x.style.visibility = "visible";
  } else {
    x.style.visibility = "hidden";
  }
}
