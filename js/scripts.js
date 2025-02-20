
$(document).ready(function(){
    let slides = $('.slide');
    let currentSlide = 0;

    // Mostrar la primera imagen
    slides.eq(currentSlide).addClass('show');

    // Función para cambiar imágenes
    function nextSlide() {
        slides.eq(currentSlide).removeClass('show');
        currentSlide = (currentSlide + 1) % slides.length;
        slides.eq(currentSlide).addClass('show');
    }

    // Cambiar imágenes cada 3 segundos
    setInterval(nextSlide, 5000);
});





