/* Set the width of the side navigation to 250px */
document.getElementById("mySidenav").addEventListener("mouseleave", closeNav);
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }
  
  /* Set the width of the side navigation to 0 */
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }