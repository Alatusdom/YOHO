/* Set the width of the side navigation to 250px */
document.getElementById("mySidenav").addEventListener("mouseleave", closeNav);
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }

  function serviceUp() {
    var popup = document.getElementById("serv");
    popup.classList.toggle("show");
  }

  function oserviceUp() {
    var popup = document.getElementById("oneT");
    popup.classList.toggle("show");
  }

  function rserviceUp() {
    var popup = document.getElementById("resT");
    popup.classList.toggle("show");
  }

  function cserviceUp() {
    var popup = document.getElementById("comT");
    popup.classList.toggle("show");
  }

  function mserviceUp() {
    var popup = document.getElementById("mosT");
    popup.classList.toggle("show");
  }