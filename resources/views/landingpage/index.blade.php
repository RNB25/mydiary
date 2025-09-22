<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- SEO Meta Tags -->
        <meta name="description" content="Catatan penting tentang hidup kamu!" />
        {{-- <meta name="author" content="Your name" /> --}}

        <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        {{-- <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="summary_large_image" /> <!-- to have large image post format in Twitter --> --}}

        <!-- Webpage Title -->
        <title>MyDiary</title>

        <!-- Styles -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet" />
        <link href="landingpage/css/fontawesome-all.css" rel="stylesheet" />
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="landingpage/css/swiper.css" rel="stylesheet" />
        <link href="landingpage/css/testimonial.css" rel="stylesheet" />
        <link href="landingpage/css/magnific-popup.css" rel="stylesheet" />
        <link href="landingpage/css/styles.css" rel="stylesheet" />

        <!-- Favicon  -->
        <link rel="icon" href="logo/logo.png" />
    </head>
    <body data-spy="scroll" data-target=".fixed-top">

        @include('landingpage.component.navbar')
        <!-- end of navigation -->

        
        <!-- Header -->
        @include('landingpage.component.abovethefold')

        <!-- Introduction -->
        <div class="pt-4 pb-14 text-center">
            <div class="container px-4 sm:px-8 xl:px-4">
                <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Aplikasi catatan harian yang akan menemani setiap langkah dan perasaanmu. Mulailah menulis, dan biarkan momen-momen kecil menjadi kenangan yang berarti.</p>
            </div> <!-- end of container -->
        </div>
        <!-- end of introduction -->


        <!-- Features -->
        @include('landingpage.component.features')
        <!-- end of features -->


        <!-- Details / kontent-->
        @include('landingpage.component.details')

        <!-- Statistics -->
        @include('landingpage.component.statistics')
        
        <!-- Reviews/testimonials -->
        @include('landingpage.component.reviews')

        <!-- Pricing -->
        @include('landingpage.component.pricing')

        <!-- Call to Action -->
        @include('landingpage.component.cta')

        <!-- Footer -->
        @include('landingpage.component.footer')
        <!-- end of copyright -->


        <!-- Scripts -->
        <script src="landingpage/js/jquery.min.js"></script> <!-- jQuery for JavaScript plugins -->
        <script src="landingpage/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="landingpage/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
        <script src="landingpage/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
        <script src="landingpage/js/scripts.js"></script> <!-- Custom scripts -->
    </body>
</html>
