var testimonials = new Swiper('#testimonials', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: "auto",
    centeredSlides: false,
    grabCursor: true,
    spaceBetween: 0,
    navigation: {
        nextEl: '.testimonial-button-next',
        prevEl: '.testimonial-button-prev',
    }
})