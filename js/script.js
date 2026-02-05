// menu dynamisé //
const menuLinks = document.querySelectorAll('#topnav_responsive_menu a');
const menu = document.getElementById("topnav_responsive_menu");
const icon = document.getElementById("topnav_hamburger_icon");

function showResponsiveMenu() {
  menu.classList.toggle("open");
  icon.classList.toggle("open");
}

menuLinks.forEach(link => {
  link.addEventListener('click', () => {
    menu.classList.remove('open');
    icon.classList.remove('open');
  });
});