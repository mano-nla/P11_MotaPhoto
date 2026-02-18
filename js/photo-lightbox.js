document.addEventListener('DOMContentLoaded', function() {

    const triggers = document.querySelectorAll('.photo-block-overlay-fullscreen');
    const lightbox = document.querySelector('.lightbox');
    const lightboxImage = document.querySelector('.lightbox-container img');
    const closeBtn = document.querySelector('.lightbox-close');
    const lightboxInfo = document.querySelector('.lightbox-info');
    const nextBtn = document.querySelector('.lightbox-next');
    const prevBtn = document.querySelector('.lightbox-prev');

    let currentIndex = 0;

    function openLightbox(element) {

        const imageUrl = element.dataset.image;
        const category = element.dataset.category;
        const reference = element.dataset.reference;

        lightboxImage.src = imageUrl;

        lightboxInfo.innerHTML = `
            <p class="lightbox-info-categorie">${category}</p>
            <p class="lightbox-info-reference">${reference}</p>
        `;

        lightbox.classList.add('active');
        document.body.classList.add('no-scroll');
    }

    // Ouverture //
    document.addEventListener('click', function(e) {
        const trigger = e.target.closest('.photo-block-overlay-fullscreen');
        if (!trigger) return;
        e.preventDefault();
        const triggers = document.querySelectorAll('.photo-block-overlay-fullscreen');
        currentIndex = Array.from(triggers).indexOf(trigger);
        openLightbox(trigger);
    });

    // Fermeture //
    closeBtn.addEventListener('click', function() {
        lightbox.classList.remove('active');
        document.body.classList.remove('no-scroll');
    });

    // Image suivante //
    nextBtn.addEventListener('click', function() {
        const triggers = document.querySelectorAll('.photo-block-overlay-fullscreen');
        currentIndex++;
        if (currentIndex >= triggers.length) {
            currentIndex = 0;
        }
        openLightbox(triggers[currentIndex]);
    });

    // Image précédente //
    prevBtn.addEventListener('click', function() {
        const triggers = document.querySelectorAll('.photo-block-overlay-fullscreen');
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = triggers.length - 1;
        }
        openLightbox(triggers[currentIndex]);
    });

});