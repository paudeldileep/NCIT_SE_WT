var diffX, diffY, element;

//initially invoked on grab
function grabber(event) {
  console.log("grabber called");
  element = event.currentTarget;

  var posX = parseInt(element.style.left);
  var posY = parseInt(element.style.top);

  diffX = event.clientX - posX;
  diffY = event.clientY - posY;

  //assign event listeners for mousemove and mouseup event
  document.addEventListener("mousemove", mover, false);
  document.addEventListener("mouseup", dropper, false);

  event.stopPropagation();
  event.preventDefault();
}

//mover function(called while dragging the element)
function mover(event) {
  element.style.left = event.clientX - diffX + "px";
  element.style.top = event.clientY - diffY + "px";
  //console.log(element.style.left, element.style.top);

  event.stopPropagation();
}

//invoked on dropping the element
function dropper(event) {
  document.removeEventListener("mousemove", mover, false);
  document.removeEventListener("mouseup", dropper, false);
  event.stopPropagation();
}

// HW:  event.stopPropagation()  and event.preventDefault()
