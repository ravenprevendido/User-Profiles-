<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Intro intro</title>
    <link rel="stylesheet" href="styletwo.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
  </head>
  <body>
    <!-- Content -->
    <div class="navbar">
      <div class="site-info">Group 3</div>
      <div class="site-menu">
        <!-- <div class="menu-item">projects</div>
        <div class="menu-item">about</div>
        <div class="menu-item">contact</div> -->
      </div>
    </div>
    <div class="container">
      <div class="block b-1">qweqeqwe</div>
      <div class="block b-2"></div>
      <div class="block b-3"></div>
      <div class="block b-4"></div>
      <div class="block b-5"></div>
      <div class="block b-6"></div>
      <div class="block b-7"></div>
      <div class="block b-8"></div>
    </div>
    <div class="overlay"></div>
    <p class="title">Activity 2 </p>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script>
      // Function to handle animations
      function playAnimations() {
        // Wrap every letter in a span
        var textWrapper = document.querySelector(".title");
        textWrapper.innerHTML = textWrapper.textContent.replace(
          /\S/g,
          "<span class='letter'>$&</span>"
        );

        // Anime.js animation for text
        anime.timeline().add({
          targets: ".title .letter",
          translateY: [-200, 0],
          easing: "easeOutExpo",
          duration: 1400,
          delay: (el, i) => 6500 + 30 * i,
        });

        // GSAP animations for loading effect
        TweenMax.staggerFrom(
          ".container > .block",
          2,
          {
            y: "110%",
            ease: Expo.easeInOut,
            delay: 1,
          },
          0.4
        );
        TweenMax.to(".overlay", 0.5, {
          y: "100%",
          ease: Expo.easeInOut,
          delay: 5.2,
        });

        TweenMax.to(".container", 2, {
          scale: "2",
          y: "90%",
          ease: Expo.easeInOut,
          delay: 5.5,
        });

        TweenMax.staggerFrom(
          ".navbar > div",
          1.6,
          {
            opacity: 0,
            y: -100,
            ease: Expo.easeInOut,
            delay: 6,
          },
          0.08
        );
        TweenMax.staggerFrom(
          ".site-menu > div",
          1,
          {
            opacity: 0,
            y: -100,
            ease: Power2.easeOut,
            delay: 6.5,
          },
          0.1
        );

        

        // Redirect to index.php after all animations are complete
        setTimeout(function () {
          window.location.replace("index.php"); // Redirects to index.php
        }, 8000); // Adjust the delay time to match the end of your animations
      }

      window.onload = function () {
        playAnimations();
      };
      
    </script>
  </body>
</html>
