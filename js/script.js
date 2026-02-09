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

// modale contact //
document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('modal-contact');
    const openButtons = document.querySelectorAll('[data-open-modal]');
    const closeButtons = document.querySelectorAll('[data-close-modal]');

    if (!modal) return;

    const openModal = () => {
        modal.classList.add('is-active');
    };

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    openButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', closeModal);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

});