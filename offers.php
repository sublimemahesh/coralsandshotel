<?php
include './include.php';

$offer = new Offers();
$offers = $offer->getAll();
?>

<!doctype html>
<html class="no-js" lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
        <meta name="keywords" content="premium html template, unique premium template, multipurpose template">
        <meta name="description" content="Kallyas is an ultra-premium, responsive theme built for todays websites. Create your website, fast.">
        <title>Offers | Coral Sands Hikkaduwa</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,600italic,700,800,800italic" type="text/css">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Montserrat:400,700' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/sliders/ios/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/template.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/custom.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/responsive.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/base-sizing.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/dp.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poiret+One">
        <link rel="stylesheet" href="css/sliders/owl.carousel/owl.theme.default.min.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/sliders/owl.carousel/owl.carousel.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/sliders/owl.carousel/owl.transitions.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/sliders/owl.carousel/owl.theme.green.css" type="text/css" media="all">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="shortcut icon" type="image/x-icon" href="images/index.ico">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>


    </head>

    <body class="">
        <?php include 'header.php'; ?>
        <?php include 'login-form.php'; ?>

        <div id="page_wrapper">
            <div class="header-section">
                <div class="parallax" style="background-image:url(images/banners/offers.jpg); background-repeat:repeat;">
                    <div class="dot-layer"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="parallax-text">
                                    <h1 class="tbk__title montserrat fs-57 lh-32 fw-extrabold tcolor">Offers</h1>
                                    <span><i class="icon-hotel"></i></span>
                                    <ul class="breadcrumb">
                                        <li class="tbk__title montserrat fs-14 lh-22 .fw-vthin tcolor"><a href="./">Home</a></li>
                                        <li class="tbk__title montserrat fs-14 lh-22 .fw-thin tcolor">Offers</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>

                    <section class="hg_section sec1">
                        <div class="container offer2 wi-pb10">


                            <?php
                            foreach ($offers as $offer) {
                                ?>
                                <div class="screenshot-box kl-style-2 fixclear mb-60 pb-40 pt-40 pr-45 pl-45">
                                    <div class="row">
                                        <div class="col-lg-5 offers-details1">
                                            <h3 class="tbk__title montserrat fs-38 lh-46 fw-bold">
                                                <span class="text-custom fw-normal tcolor"><?php echo $offer['title']; ?></span>
                                            </h3>
                                            <div class="features">
                                                <?php echo $offer['description']; ?>
                                            </div>
                                            <a href="contact_us.php" class="btn btn-fullcolor btn-third">FIND OUT MORE</a>
                                        </div>
                                        <div class="col-lg-7 offers-img1">
                                            <img src="images/offers/<?php echo $offer['image_name']; ?>" alt="Owl Image">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>


                        </div>
                    </section>


                    <?php include 'footer.php'; ?>
                </div>
            </div> 
        </div>

        <!-- ToTop trigger -->
        <a href="#" id="totop">TOP</a>
        <!--/ ToTop trigger -->

        <!-- JS FILES/ These should be loaded in every page -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/kl-plugins.js"></script>

        <!-- JS FILES/ Loaded on this page -->
        <!-- Requried js script for Slideshow Scroll effect -->
        <script type="text/javascript" src="js/plugins/scrollme/jquery.scrollme.js"></script>

        <!-- Required js script for iOS Slider -->
        <script type="text/javascript" src="js/plugins/_sliders/ios/jquery.iosslider.min.js"></script>

        <!-- Required js trigger for iOS Slider -->
        <script type="text/javascript" src="js/trigger/slider/ios/kl-ios-slider.js"></script>

        <!-- CarouFredSel - Required js script for Screenshot box Partners Carousel -->
        <script type="text/javascript" src="js/plugins/_sliders/caroufredsel/jquery.carouFredSel-packed.js"></script>

        <!-- Required js trigger for Screenshot Box Carousel -->
        <script type="text/javascript" src="js/trigger/kl-screenshot-box.js"></script>

        <!-- Required js trigger for Partners Carousel -->
        <script type="text/javascript" src="js/trigger/kl-partners-carousel.js"></script>	

        <!-- Custom Kallyas JS codes -->
        <script type="text/javascript" src="js/kl-scripts.js"></script>

        <!-- Demo panel -->
        <script type="text/javascript" src="js/dp.js"></script>
        <script src="js/owl.carousel.js" type="text/javascript"></script>
        <script src="js/owl.carousel.js" type="text/javascript"></script>

        <!-- Code provided by Google -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
            }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

        <!-- Flag click handler -->
        <script type="text/javascript">
            $('.toplang-item a').click(function () {

                var lang = $(this).data('lang');
                var $frame = $('.goog-te-menu-frame:first');
                if (!$frame.size()) {
                    alert("Error: Could not find Google translate frame.");
                    return false;
                }
                $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                return false;
            });
        </script>
    </body>
</html>