<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Properties Locations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Our Properties Locations" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/header-footer-banner.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/header-footer-banner-responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/porperty-list.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/css/porperty-list-responsive.css') }}">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    <div class="loader-head " id="sygnius-loader">
        <div class="loader">
            <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                class="img-fluid logo-loader">
            <img src="{{ URL::asset('assets/frontend/images/buffering-loader.gif') }}" alt="">
            <p>Please wait..</p>
        </div>
    </div>

    <header class="desk-nav">
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="nav-links">
                            <ul class="up">
                                <li><a href="../../index.html" class="active">Home</a></li>
                                <li><a href="../../about-us.html">About Us</a></li>
                                <li><a href="../../properties-vaccational-rental.html">Vacation Rentals</a></li>
                                <li><a href="../../our-property-management.html">Property Management</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="../../index.html">
                            <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                                class="img-fluid">
                        </a>
                    </div>
                    <div class="col-5">
                        <div class="nav-links">
                            <ul class="up">
                                <li><a href="../../faqs.html">FAQ</a></li>
                                <li><a href="../../our-blogs.html">Blogs</a></li>
                                <li><a href="../../attractions.html">Attractions</a></li>
                                <li><a href="../../contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header class="page-header mob">
        <div class="container">
            <div class="row">
                <a href="../../index.html" class="logo">
                    <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                        class="img-fluid">
                </a>
                <div class="menu-toggle1" id="menu-toggle1"><i class="fa fa-bars"></i></div>
                <div class="menu-bar-in" id="tag1">
                    <div class="mobile-nav">
                        <div class="mobile-menu-logo">
                            <a href="../../index.html" class="logo">
                                <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                                    class="img-fluid">
                            </a>
                            <span id="close-menu"><i class="fa fa-times" id="close-menu1"></i></span>
                        </div>
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse" id="main_nav">
                                <ul class="navbar-nav">
                                    <li><a href="../../index.html" class="active">Home</a></li>
                                    <li><a href="../../about-us.html">About Us</a></li>
                                    <li><a href="../../properties.html">Vacation Rentals</a></li>
                                    <li><a href="../../property-management.html">Property Management</a></li>
                                    <li><a href="../../faqs.html">FAQ</a></li>
                                    <li><a href="../../blogs.html">Blogs</a></li>
                                    <li><a href="../../attractions.html">Attractions</a></li>
                                    <li><a href="../../contact-us.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="page-title"
        style="background-image: url({{ URL::asset('assets/frontend/images/cms/faq-banner.webp') }});">
        <div class="auto-container">
            <h1 data-aos="zoom-in" data-aos-duration="1500" class="aos-init aos-animate">Properties List</h1>
            <div class="checklist">
                <p>
                    <a href="../../index.html" class="text"><span>Home</span></a>
                    <a class="g-transparent-a">Properties List</a>
                </p>
            </div>
        </div>
    </section>
    <a href="properties.html#p-list" class="sticky main-btn book1 check">
        <span class="button-text">CHECK AVAILABILITY</span>
    </a>

    <div class="search" id="p-list">

        <div class="container">

            <form action="properties.html" class="Search-bar">

                <div class="row">

                    <div class="col-3 ">

                        <label for="locations">LOCATION</label>

                        <br>

                        <select class="" title="Select Location" id="loc" name="location_id">
                            <option selected="selected" value="">Select Location</option>
                            <option value="10">Sarasota</option>
                            <option value="11">Bradenton, FL</option>
                            <option value="12">Holmes Beach, FL</option>
                        </select>

                    </div>



                    <div class="col-3 checkbar">

                        <div class="check-in">

                            <label for="locations">CHECK-IN</label>

                            <br>

                            <input required autocomplete="off" inputmode="none" id="start_date"
                                placeholder="Add date" class="" name="start_date" type="text">

                        </div>

                        <div class="check-out">

                            <label for="locations">CHECK-OUT</label>

                            <br>

                            <input required autocomplete="off" inputmode="none" id="end_date"
                                placeholder="Add date" class="right" name="end_date" type="text">

                        </div>
                        <div class="col-12 md-12 sm-12 datepicker-common-2 datepicker-main">
                            <input type="text" id="demo17" value=""
                                aria-label="Check-in and check-out dates" aria-describedby="demo17-input-description"
                                readonly />
                            <input type="hidden" value="1" name="adults" id="adults-data" />
                            <input type="hidden" value="0" name="child" id="child-data" />
                        </div>

                    </div>

                    <div class="col-2 adult_field">

                        <div class="people">

                            <div class="adult">

                                <label for="adult">GUESTS</label>



                                <div class="adult-box">
                                    <!--<button type="button" class="disabled">-</button>-->
                                    <button class="button1" type="button"
                                        onclick="functiondec('#adults-data','#show-target-data','#child-data')"
                                        value="Decrement Value">-</button>

                                    <!--<input type="text" name="" value="1">-->
                                    <input type="text" name="Guests" value="1" readonly=""
                                        class="form-control gst" id="show-target-data" placeholder="1"
                                        title="Select Guests">

                                    <!--<button type="button" class="inc">+</button>-->
                                    <button class="button11 button1" type="button"
                                        onclick="functioninc('#adults-data','#show-target-data','#child-data')"
                                        value="Increment Value">+</button>
                                </div>
                            </div>

                            <div class="Children d-none">

                                <label for="Children">CHILDREN</label>

                                <br>

                                <div class="adult-box">
                                    <button class="button1" type="button"
                                        onclick="functiondec('#child-data','#child-data-show','#adults-data')"
                                        value="Decrement Value">-</button>
                                    <!--<button type="button" class="disabled">-</button>-->

                                    <!--<input type="text" name="" value="1">-->
                                    <input type="text" readonly="" class="form-control gst"
                                        id="child-data-show" placeholder="0" title="Select Guests">

                                    <button class="button11 button1" type="button"
                                        onclick="functioninc('#child-data','#child-data-show','#adults-data')"
                                        value="Increment Value">+</button>
                                    <!--<button type="button" class="inc">+</button>-->

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-4 sub-btn">

                        <div class="submit-btn">

                            <button type="submit" class="main-btn"> <i class="fa-solid fa-magnifying-glass"></i>
                                Search</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

    <section class="home-list">
        <div class="container">
            <div class="row">
                @foreach ($module_data as $property)
                    @php
                        $thumbnail = json_decode($property['pictures'], true)[0]['original'] ?? 'N/A';
                        $title = $property['title'] ?? 'N/A';
                        $city = json_decode($property['address'], true)['city'] ?? 'N/A';
                        $state = json_decode($property['address'], true)['state'] ?? 'N/A';
                        $basePrice = json_decode($property['prices'], true)['basePrice'] ??  '0.00';
                        $description = json_decode($property['publicDescription'], true)['summary'] ??  'NA';
                        $accommodates = $property['accommodates'] ?? 'N/A';
                        $beds = $property['beds'] ?? 'N/A';
                        $bathrooms = $property['bathrooms'] ?? 'N/A';
                    @endphp
                    <div class="col-lg-4 col-md-6 col-12 prop-card" data-aos="fade-up" data-aos-duration="1500">
                        <div class="pro-img">
                            <a href="{{ route('property.show', $property['uuid']) }}" title="" data-href="">
                                <img src="{{ $thumbnail }}" class="img-fluid" alt="{{ $title }}" />
                            </a>
                            <div class="view">
                                <h5><span>
                                    $ {{ $basePrice }}
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <div class="adr-rev">
                                <p class="adr "><i class="fa-solid fa-location-dot"></i>{{ $city }}, {{ $state }}</p>
                                <p class="rating">
                                    0.00 <span><i class="fa-solid fa-star"></i></span>
                                </p>
                            </div>
                            <h3 class="title">
                                <a href="./our-property-details.html">{{ $title }}</a>
                            </h3>
                            <p class="descp">{{ $description }}
                            </p>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>{{ $accommodates }} Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>{{ $beds }} Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>{{ $bathrooms }} Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="./our-property-details.html">Check Availability
                                    <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer class="d-none">
        <div class="footer_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 first">
                    <div class="footer_box">
                        <div class="footer_logo">
                            <a href="index.html">
                                <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png')}}" alt="Logo" class="img-fluid">
                            </a>
                        </div>
                        <p class="abt"></p>

                    </div>
                </div>
                <div class="col-md-4 quick">
                    <div class="footer_box">
                        <div class="footer_links">
                            <h4>Quick Links</h4>
                            <ul class="footer_link">
                                <li><a href="index.html"><i class="fa-solid fa-angles-right"></i> Home</a></li>
                                <li><a href="about-us.html"><i class="fa-solid fa-angles-right"></i> About Us</a></li>
                                <li><a href="properties.html"><i class="fa-solid fa-angles-right"></i> Vacation
                                        Rentals</a></li>
                                <li><a href="property-management.html"><i class="fa-solid fa-angles-right"></i>
                                        Property
                                        Management</a></li>
                                <li><a href="faqs.html"><i class="fa-solid fa-angles-right"></i> Faq</a></li>
                                <li><a href="blogs.html"><i class="fa-solid fa-angles-right"></i> Blogs</a></li>
                                <li><a href="attractions.html"><i class="fa-solid fa-angles-right"></i>
                                        Attractions</a>
                                </li>

                                <li><a href="contact-us.html"><i class="fa-solid fa-angles-right"></i> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 contact">
                    <div class="footer_box">
                        <div class="footer_links">
                            <h4>Contact Details</h4>
                            <ul class="footer_link">
                                <li><i class="fa-solid fa-location-dot"></i>XYZ Los, New York</li>
                                <li><a href="tel:+1 941-725-8608"><i class="fa-solid fa-phone"></i>1234567890</a>
                                </li>
                                <li><a href="mailto:randy@bnbgulfcoast.com"><i
                                            class="fa-solid fa-envelope"></i>example@gmail.com</a></li>
                            </ul>

                            <div class="footer-social">
                                <ul>
                                    <li><span>Follow Us:</span></li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank"><i
                                                class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 newsletter d-none">
                    <div class="footer_box">
                        <div class="footer_links">
                            <h4>Subscribe</h4>
                            <div class="news">
                                <p>Subscribe to our newsletter for regular updates on our seasonal promotions, offers
                                    &amp; lots more.</p>
                                <div class="newsletter-form">
                                    <form method="POST" action="https://www.bnbgulfcoast.com/newsletter-post"
                                        accept-charset="UTF-8" class="newsletter-data newsLetterForm"><input
                                            name="_token" type="hidden"
                                            value="rgN6EebLrqdVaf4hbjfG2yUNASOyZA7EQUnLl9oc">
                                        <div class="news-gorm-group">
                                            <input type="emil" name="email" required=""
                                                placeholder="Your Email..">
                                            <i class="fa-solid fa-paper-plane"></i>
                                            <button type="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left_copyright">
                            <p>Copyright &copy; 2024. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right_copyright">
                            <p>Designed &amp; href="#" target="_blank"><img
                                    src="front/images/footer_1.webp"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <section class="footer-section">
        <footer class="footer">
            <div class="section-shape">
                <div class="shape1">
                    <img src="{{ URL::asset('assets/frontend/images/shape-1.svg')}}" alt="">
                </div>
                <div class="shape2">
                    <img src="{{ URL::asset('assets/frontend/images/shape-2.svg')}}" alt="">
                </div>
                <div class="shape3">
                    <img src="{{ URL::asset('assets/frontend/images/shape-3.svg')}}" alt="">
                </div>
            </div>
            <div class="foot">
                <div class="container">

                    <div class="row">
                        <div class="col-4 info">
                            <div class="info-content">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png')}}" alt="Logo" class="img-fluid">
                                    </a>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-4 other-info quick-links">
                            <h5>Quick Links</h5>
                            <ul class="footer-links">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="properties.html">Vacation Rentals</a></li>
                                <li><a href="property-management.html">Property Management</a></li>
                                <li><a href="faqs.html">FAQ</a></li>
                                <li><a href="blogs.html">Blogs</a></li>
                                <li><a href="attractions.html">Attractions</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-4 other-info contact-us">
                            <h5>Contact Us</h5>
                            <ul class="footer-links">
                                <li><a href="tel:+1 1234567890"><img src="{{ URL::asset('assets/frontend/images/telephone.png')}}"
                                            alt="">+1
                                        1234567890</a></li>
                                <li><a href="mailto:eample@gmail.com"><img src="{{ URL::asset('assets/frontend/images/envelope.png')}}"
                                            alt="">eample@gmail.com</a></li>
                                <li><img src="{{ URL::asset('assets/frontend/images/location.png')}}" alt="">LOS Angles, New York</li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 left">
                            <p>Copyright &copy; 2024. All Rights Reserved</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12right">
                            <div class="footer-about-social-list">
                                <li><a href="https://www.facebook.com/" target="_BLANK">Facebook <i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_BLANK">Instagram <i
                                            class="fab fa-instagram"></i></a></li>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 right_copyright">
                            <p>Designed &amp; Developed by <a href="#" target="_blank"><img
                                        src="front/images/footer_1.webp"></a></p>
                        </div>
                    </div>
                </div>
            </div>


        </footer>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <!-- main js -->

    <script>
        $(function() {
            $("#sygnius-loader").addClass("d-none");
        });
        AOS.init();
        $(document).ready(function() {
            $(".gst").click(function() {
                $("#guestsss").css("display", "block");
            });
            $(".close1").click(function() {
                $("#guestsss").css("display", "none");
            });

            $(".gst1").click(function() {
                $("#guestsss1").css("display", "block");
            });
            $(".close12").click(function() {
                $("#guestsss1").css("display", "none");
            });
        });
        $(document).ready(function() {




        });

        $(document).ready(function() {
            $("#more").click(function() {
                $("#less").css("display", "block");
                $("#more").css("display", "none");
                $(".abt").css("height", "auto");
            });

            $("#less").click(function() {
                $("#less").css("display", "none");
                $("#more").css("display", "block");
                $(".abt").css("height", "253px");
            });
        });

        $(document).ready(function() {
            $("#mr a").click(function() {
                $("#ls").css("display", "block");
                $("#mr").css("display", "none");
                $(".readMore_review").css("height", "auto");
            });

            $("#ls a").click(function() {
                $("#ls").css("display", "none");
                $("#mr").css("display", "block");
                $(".readMore_review").css("height", "78px");
            });
        });

        $(document).ready(function() {
            $("#menu-toggle1").click(function() {
                $("#tag1").css("transform", "translateX(0em)");
            });
            $("#close-menu1").click(function() {
                $("#tag1").css("transform", "translateX(-38em)");
            });
        });
        $(document).ready(function() {
            $("#menu-toggle2").click(function() {
                $("#tag2").toggle();
            });
        });

        function playVideo() {
            $('#mob').trigger('play');
        }

        function pauseVideo() {
            $('#mob').trigger('pause');
        }

        $(document).ready(function() {
            $("#pause").click(function() {
                $("#play").css("display", "block");
                $("#pause").css("display", "none");
            });
            $("#play").click(function() {
                $("#pause").css("display", "block");
                $("#play").css("display", "none");
            });
        });

        $(document).ready(function() {
            $("#hmore a").click(function() {
                $("#hless").css("display", "block");
                $("#hmore").css("display", "none");
                $(".abt-para").css("height", "auto");
            });

            $("#hless a").click(function() {
                $("#hless").css("display", "none");
                $("#hmore").css("display", "block");
                $(".abt-para").css("height", "199px");
            });
        });

        $(document).ready(function() {
            var a = $(".abt-para").height();
            if (a < 199) {
                $("#hmore").css("display", "none");
            } else {
                $("#hmore").css("display", "block");

            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".gst").click(function() {
                $("#guestsss").css("display", "block");
            });
            $(".close1").click(function() {
                $("#guestsss").css("display", "none");
            });
            $(".close111").click(function() {
                $("#guestsss").css("display", "none");
            });
        });
    </script>
    <script src="https://www.bnbgulfcoast.com/front/js/properties-list.js"></script>
    <script>
        $(document).ready(function() {
            $(".gst1").click(function() {
                $("#guestsss1").css("display", "block");
            });
            $(".close12").click(function() {
                $("#guestsss1").css("display", "none");
            });
            $(".close1112").click(function() {
                $("#guestsss1").css("display", "none");
            });
        });

        function functiondec($getter_setter, $show, $cal) {
            val = parseInt($($getter_setter).val());
            if (val > 0) {
                val = val - 1;
            }
            $($getter_setter).val(val);
            person1 = val;
            person2 = parseInt($($cal).val());
            $show_data = person1 + person2;
            $show_actual_data = $show_data + " Guests";
            if ($getter_setter == "#adults-data") {
                $($getter_setter + '-show').html(val + " Adults");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Adult");
                }
            } else {
                $($getter_setter + '-show').html(val + " Children");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Child");
                }
            }
            $($show).val($show_actual_data);
        }

        function functioninc($getter_setter, $show, $cal) {
            val = parseInt($($getter_setter).val());

            val = val + 1;

            $($getter_setter).val(val);
            person1 = val;
            person2 = parseInt($($cal).val());
            $show_data = person1 + person2;
            $show_actual_data = $show_data + " Guests";
            $($show).val($show_actual_data);
            if ($getter_setter == "#adults-data") {
                $($getter_setter + '-show').html(val + " Adults");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Adult");
                }
            } else {
                $($getter_setter + '-show').html(val + " Children");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Child");
                }
            }
        }


        function functiondec1($getter_setter, $show, $cal) {
            val = parseInt($($getter_setter).val());
            if ($getter_setter == "#adults-data") {
                if (val > 1) {
                    val = val - 1;
                }
            } else {
                if (val > 0) {
                    val = val - 1;
                }
            }
            $($getter_setter).val(val);
            person1 = val;
            person2 = parseInt($($cal).val());
            $show_data = person1 + person2;
            $show_actual_data = $show_data + " Guests";
            if ($getter_setter == "#adults-data1") {
                $($getter_setter + '-show').html(val + " Adults");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Adult");
                }
            } else {
                $($getter_setter + '-show').html(val + " Children");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Child");
                }
            }
            $($show).val($show_actual_data);
        }

        function functioninc1($getter_setter, $show, $cal) {
            val = parseInt($($getter_setter).val());

            val = val + 1;

            $($getter_setter).val(val);
            person1 = val;
            person2 = parseInt($($cal).val());
            $show_data = person1 + person2;
            $show_actual_data = $show_data + " Guests";
            $($show).val($show_actual_data);
            if ($getter_setter == "#adults-data1") {
                $($getter_setter + '-show').html(val + " Adults");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Adult");
                }
            } else {
                $($getter_setter + '-show').html(val + " Children");
                if (val <= 1) {
                    $($getter_setter + '-show').html(val + " Child");
                }
            }
        }
    </script>
    <script src="datepicker/node_modules/fecha/dist/fecha.min.js"></script>
    <script src="datepicker/dist/js/hotel-datepicker.js"></script>
    <script>
        var checkin = [];
        var checkout = [];
        var blocked = [];


        function clearDataForm() {
            $("#start_date").val('');
            $("#end_date").val('');

        }
        (function() {
            abc = document.getElementById("demo17");
            var demo17 = new HotelDatepicker(
                abc, {
                    noCheckInDates: checkin,
                    noCheckOutDates: checkout,
                    disabledDates: blocked,
                    onDayClick: function() {
                        d = new Date();
                        d.setTime(demo17.start);
                        document.getElementById("start_date").value = getDateData(d);
                        d = new Date();
                        console.log(demo17.end)
                        if (Number.isNaN(demo17.end)) {
                            document.getElementById("end_date").value = '';
                        } else {
                            d.setTime(demo17.end);
                            document.getElementById("end_date").value = getDateData(d);
                            // ajaxCallingData();
                        }
                    },
                    clearButton: function() {
                        return true;
                    }
                }
            );


        })();

        $(document).on("click", "#clear", function() {
            $("#clear-demo17").click();
        })
        x = document.getElementById("month-2-demo17");
        x.querySelector(".datepicker__month-button--next").addEventListener("click", function() {
            y = document.getElementById("month-1-demo17");
            y.querySelector(".datepicker__month-button--next").click();
        });


        x = document.getElementById("month-1-demo17");
        x.querySelector(".datepicker__month-button--prev").addEventListener("click", function() {
            y = document.getElementById("month-2-demo17");
            y.querySelector(".datepicker__month-button--prev").click();
        });



        function getDateData(objectDate) {

            let day = objectDate.getDate();
            //console.log(day); // 23

            let month = objectDate.getMonth() + 1;
            //console.log(month + 1); // 8

            let year = objectDate.getFullYear();
            // console.log(year); // 2022


            if (day < 10) {
                day = '0' + day;
            }

            if (month < 10) {
                month = `0${month}`;
            }
            format1 = `${year}-${month}-${day}`;
            return format1;
            console.log(format1); // 07/23/2022
        }
    </script>





</body>

</html>
