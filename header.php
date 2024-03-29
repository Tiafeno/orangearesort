<!-- 
 * Copyright (c) 2018 Falicrea
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files, to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * Contact: contact@falicrea.com
 -->

<!DOCTYPE html>
<html class="no-js" <?= language_attributes(); ?>>

<head>

   <!-- head -->
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="msapplication-tap-highlight" content="no" />
   <meta name="viewport" content="width=600" />
   <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="theme-color" content="#ffffff">
   <meta name="description" content="Orangea Hotel Resort">
   <meta name="author" content="Falicrea (Tiafeno Finel)">
   <title>Hotel Orangea Beach Resort - Nosy Be</title>
   <!-- Stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800&display=swap" rel="stylesheet"
      type='text/css'>

    <?php wp_head(); ?>


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


   <!-- javascript -->
   <script type="text/javascript">
      jQuery(document).ready(function ($) {
         $('.fadeOut').owlCarousel({
            items: 1,
            animateOut: 'fadeOut',
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: false,
            pagination: false,
            dots: false,
            margin: 0,
            autoHeight: true,
         });
         $(window).resize(function () {
            _fixHeaderResponsive();
         });
         _fixHeaderResponsive();

         // Cette fonction permet de corriger le slider dans le header.
         // 
         function _fixHeaderResponsive() {
            var container = $('.hf-container');
            var height = container.innerHeight();
            var width = container.innerWidth();
            $('.hf-bg').each(function (index, el) {
               var imgWidth;
               var imgHeight;

               var img = new Image();
               img.onload = function () {
                  imgHeight = this.height;
                  imgWidth = this.width;

                  var heightFinal = (width * imgHeight) / imgWidth;
                  if (heightFinal < height) {
                     heightFinal = height;
                     $(el).css('width', (heightFinal * imgWidth) / imgHeight);
                  } else {
                     $(el).css('width', '100%');
                  }
                  $(el).css('height', heightFinal);
               }
               img.src = $(el).attr('src');
            });
         }
         
      });
   </script>

   <style>
   .preload-backdrop {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 999;
      background-color: rgb(255, 255, 255);
   }

   .preload-body {
      overflow-y: hidden;
   }

   .page-preload {
      background: transparent url(https://cdn.dribbble.com/users/107759/screenshots/2436386/copper-loader.gif) no-repeat center center;
      position: fixed;
      z-index: 1000;
      height: 100vh;
      width: 100%;
   }
   </style>
</head>

<body <?php body_class(); ?>>
   <div class="preload-backdrop">
      <div class="page-preload">
      </div>
   </div>