<?php
/**
 * Introduction Section Template - Discover Your Paradise
 * Stayli-style layout with image carousel
 *
 * @package CatenaEstates
 */

$theme_uri = get_template_directory_uri();
?>

<section id="introduction" class="section section-primary">
    <div class="container">
        <!-- Stayli-style Two Column Layout -->
        <div class="intro-stayli will-animate">
            <!-- Left: Content -->
            <div class="intro-stayli__content">
                <span class="intro-label">Discover</span>
                
                <p class="intro-stayli__text">Discover Jamaica's most extraordinary coastal living at Catena Estates. Whether you're seeking a permanent residence, vacation home, or investment property, we have the perfect space waiting for you.</p>
                
                <a href="#features" class="cta-button cta-dark">Explore</a>
            </div>
            
            <!-- Right: Image Carousel -->
            <div class="intro-stayli__carousel">
                <div class="intro-carousel" id="intro-carousel">
                    <div class="intro-carousel__track">
                        <div class="intro-carousel__slide active">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/interior-living-room.jpg" 
                                 alt="Modern living room interior" 
                                 loading="lazy">
                        </div>
                        <div class="intro-carousel__slide">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/beach-cove.webp" 
                                 alt="Private beach cove" 
                                 loading="lazy">
                        </div>
                        <div class="intro-carousel__slide">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/interior-bedroom.jpg" 
                                 alt="Luxury bedroom" 
                                 loading="lazy">
                        </div>
                        <div class="intro-carousel__slide">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/beach-paradise.webp" 
                                 alt="Caribbean beach" 
                                 loading="lazy">
                        </div>
                    </div>
                    
                    <!-- Carousel Dots -->
                    <div class="intro-carousel__dots">
                        <button class="intro-carousel__dot active" data-slide="0" aria-label="Slide 1"></button>
                        <button class="intro-carousel__dot" data-slide="1" aria-label="Slide 2"></button>
                        <button class="intro-carousel__dot" data-slide="2" aria-label="Slide 3"></button>
                        <button class="intro-carousel__dot" data-slide="3" aria-label="Slide 4"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    'use strict';
    
    function initCarousel() {
        const carousel = document.getElementById('intro-carousel');
        if (!carousel) return;
        
        const slides = carousel.querySelectorAll('.intro-carousel__slide');
        const dots = carousel.querySelectorAll('.intro-carousel__dot');
        let currentSlide = 0;
        let autoplayInterval;
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }
        
        // Dot click handlers
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                resetAutoplay();
            });
        });
        
        // Autoplay
        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 4000);
        }
        
        function resetAutoplay() {
            clearInterval(autoplayInterval);
            startAutoplay();
        }
        
        startAutoplay();
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCarousel);
    } else {
        initCarousel();
    }
})();
</script>
