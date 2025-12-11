class ReviewsSlider {
    constructor(container) {
        this.slider = container;
        this.slides = container.querySelector('.reviews-slides');
        this.slideElements = container.querySelectorAll('.review-slide');
        this.prevBtn = container.querySelector('.review-prev');
        this.nextBtn = container.querySelector('.review-next');
        this.indicators = container.querySelectorAll('.review-indicator');

        this.totalSlides = this.slideElements.length;

        // Начинаем с центрального слайда
        this.currentSlide = Math.floor(this.totalSlides / 2);

        this.init();
    }

    init() {
        // Сначала устанавливаем начальную позицию
        this.setInitialPosition();

        // Затем инициализируем обработчики
        this.prevBtn.addEventListener('click', () => this.prev());
        this.nextBtn.addEventListener('click', () => this.next());

        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goToSlide(index));
        });

        this.startAutoPlay();
        this.slider.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.slider.addEventListener('mouseleave', () => this.startAutoPlay());
    }

    setInitialPosition() {
        // Устанавливаем начальную позицию в центр
        this.slides.style.transform = `translateX(-${this.currentSlide * 100}%)`;

        // Обновляем активные классы
        this.slideElements.forEach((slide, index) => {
            slide.classList.toggle('active', index === this.currentSlide);
        });

        this.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentSlide);
        });
    }

    goToSlide(index) {
        this.currentSlide = index;
        this.updateSlider();
    }

    next() {
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.updateSlider();
    }

    prev() {
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.updateSlider();
    }

    updateSlider() {
        this.slides.style.transform = `translateX(-${this.currentSlide * 100}%)`;

        this.slideElements.forEach((slide, index) => {
            slide.classList.toggle('active', index === this.currentSlide);
        });

        this.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentSlide);
        });
    }

    startAutoPlay() {
        this.stopAutoPlay();
        this.autoPlay = setInterval(() => this.next(), 5000);
    }

    stopAutoPlay() {
        if (this.autoPlay) {
            clearInterval(this.autoPlay);
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.reviews-slider');
    if (sliderContainer) {
        new ReviewsSlider(sliderContainer);
    }
});
