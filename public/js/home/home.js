document.addEventListener('DOMContentLoaded', function() {
    const genderSections = document.querySelectorAll('.gender-section');

    genderSections.forEach(section => {
        const hoverImage = section.getAttribute('data-hover-image');
        const originalBackground = section.style.background;

        // Предзагружаем изображение для плавной смены
        const img = new Image();
        img.src = hoverImage;

        section.addEventListener('mouseenter', function() {
            this.style.background = this.style.background.replace(/url\([^)]+\)/, `url('${hoverImage}')`);
        });

        section.addEventListener('mouseleave', function() {
            this.style.background = originalBackground;
        });
    });
});
