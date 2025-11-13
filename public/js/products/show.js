document.addEventListener('DOMContentLoaded', function() {
    // Смена главного изображения при клике на превью
    const thumbs = document.querySelectorAll('.gallery-thumb');
    const mainImage = document.getElementById('mainImage');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            mainImage.src = this.getAttribute('data-image');
        });
    });
});
