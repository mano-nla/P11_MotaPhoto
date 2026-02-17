// menu dynamisé //
const menuLinks = document.querySelectorAll('#topnav_responsive_menu a');
const menu = document.getElementById("topnav_responsive_menu");
const icon = document.getElementById("topnav_hamburger_icon");
const body = document.body;

function showResponsiveMenu() {
  menu.classList.toggle('open');
  icon.classList.toggle('open');
  body.classList.toggle('no-scroll');
}

menuLinks.forEach(link => {
  link.addEventListener('click', () => {
    menu.classList.remove('open');
    icon.classList.remove('open');
    body.classList.remove('no-scroll');
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

// Champ ref photo prérempli //
jQuery(document).ready(function($) {
    $('.single-photo-other-contact-button').on('click', function() {
        let reference = $(this).data('reference');
        $('#ref-photo').val(reference);
    });
});

// Chargement des photos sur la page d'accueil en Ajax //
jQuery(document).ready(function($) {

    $('.front-page-load-more').on('click', function(e) {
        e.preventDefault();

        const button = $(this);
        const ajaxurl = button.data('ajaxurl');
        let page = button.data('page');
        page++;

        const data = {
            action: button.data('action'),
            nonce: button.data('nonce'),
            page: page,
            categorie: $('select[name="categorie"]').val(),
            format: $('select[name="format"]').val(),
            order: $('select[name="date"]').val() || 'ASC',        
        };

        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(response => {

            if (!response.success) {
                button.hide();
                return;
            }

            $('.front-page-photo').append(response.data);

            $('.front-page-load-more').data('page', 1).show();

            button.data('page', page);
        });
    });

});

// Filtrage et triage des photos sur la front page //
jQuery(document).ready(function($){

    $('#photo-filter select').on('change', function(e){
        e.preventDefault();

        const ajaxurl = $(this).closest('form').attr('action');

        const data = {
            action: 'filter_photos',
            categorie: $('select[name="categorie"]').val(),
            format: $('select[name="format"]').val(),
            order: $('select[name="date"]').val(),
        };

        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: new URLSearchParams(data),
        })
        .then(response => response.json())
        .then(response => {
            if(response.success){
                $('.front-page-photo').html(response.data);
            }
        });

    });

});
