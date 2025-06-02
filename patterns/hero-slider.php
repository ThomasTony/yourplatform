<?php
/**
 * Title: Hero Slider
 * Slug: yourplatform/hero-slider
 * Categories: yourplatform
 */
?>

<!-- wp:group {"className":"hero-slider-wrapper"} -->
<div class="wp-block-group hero-slider-wrapper">

  <!-- Swiper wrapper -->
  <div class="swiper hero-swiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide">
        <div class="slide-content" style="height: 500px; background-image: url('http://localhost/works/yp/v1/wp-content/uploads/2025/05/tuva-mathilde-loland-1161642-unsplash-1440x2160-1.jpg'); background-size: cover; padding: 100px; color: white;">
          <h2>Fly to Tokyo for My Christmas 2019!</h2>
          <p>Trip plan inspirations and highlights from Tokyo.</p>
          <a href="#" class="button">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide">
        <div class="slide-content" style="height: 500px; background-image: url('http://localhost/works/yp/v1/wp-content/uploads/2025/05/florian-van-duyn-389609-unsplash-1440x2160-1.jpg'); background-size: cover; padding: 100px; color: white;">
          <h2>Explore Switzerland’s Hidden Trails</h2>
          <p>Mountains, lakes, and cozy alpine villages await.</p>
          <a href="#" class="button">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide">
        <div class="slide-content" style="height: 500px; background-image: url('http://localhost/works/yp/v1/wp-content/uploads/2025/05/jezael-melgoza-974061-unsplash-1440x1560-1.jpg'); background-size: cover; padding: 100px; color: white;">
          <h2>Relax at Thailand’s Luxury Spas</h2>
          <p>Recharge in tropical paradise and ancient temples.</p>
          <a href="#" class="button">Read More</a>
        </div>
      </div>

    </div>

    <!-- Swiper Controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <!-- Swiper script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      new Swiper(".hero-swiper", {
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    });
  </script>

  <div class="swiper_bottom_bar d-flex flex-nowrap justify-content-center align-items-center" style="height: 100px; background-image: linear-gradient(to right, #8224e3, #31d8cd);">
    <h3>Life is meant for good friends and great adventures.</h3>
  </div>
</div>
<!-- /wp:group -->
