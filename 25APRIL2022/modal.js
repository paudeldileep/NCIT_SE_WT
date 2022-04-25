document.getElementById("notice").onclick = showNotice;

function showNotice() {
  document.getElementById("center").style.opacity = 0.5;
  document.getElementById("notice_section").style.display = "flex";
}

document.getElementById("close").onclick = closeNotice;

function closeNotice() {
  document.getElementById("center").style.opacity = 1;
  document.getElementById("notice_section").style.display = "none";
}

//for action button
document.getElementById("action").onclick = showAction;

function showAction() {
  document.getElementById("center").style.opacity = 0.5;
  document.getElementById("signin_section").style.display = "flex";
}
