<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Property Details</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Our Property Details" />
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
    <link rel="stylesheet" href="{{ URL::asset('assets/frontend/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://www.bnbgulfcoast.com/front/assets/fancybox/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://www.bnbgulfcoast.com/front/css/property-detail.css" />
    <link rel="stylesheet" href="https://www.bnbgulfcoast.com/front/css/property-detail-responsive.css" />
    <link rel="stylesheet" type="text/css"
        href="https://www.bnbgulfcoast.com/datepicker/dist/css/hotel-datepicker.css" />
    <link rel="stylesheet" href="https://www.bnbgulfcoast.com/front/css/datepicker.css" />
</head>
<style>
    .dayContainer span.check-in-blocked.red {
        background-image: url("{{ URL::asset('assets/backend/img/check-out-box.png') }}") !important;
        color: #222 !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        margin-top: 2px !important;
        margin-bottom: 2px !important;
    }

    .dayContainer span.check-in-blocked.check-out-blocked.red {
        color: #fff !important;
        background-color: #FF3838 !important;
        background-image: none !important;
        margin-top: 2px !important;
        margin-bottom: 2px !important;
        line-height: 39px !important;
    }

    .dayContainer span.check-out-blocked {
        background-image: url("{{ URL::asset('assets/backend/img/check-in-box.png') }}") !important;
        color: #222 !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        margin-top: 2px !important;
        margin-bottom: 2px !important;
        line-height: 39px !important;
    }
</style>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100">
    {{-- <div class="loader-head " id="sygnius-loader">
        <div class="loader">
            <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                class="img-fluid logo-loader">
            <img src="{{ URL::asset('assets/frontend/images/buffering-loader.gif') }}" alt="">
            <p>Please wait..</p>
        </div>
    </div> --}}
    <header class="desk-nav">
        <div class="top-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="nav-links">
                            <ul class="up">
                                <li><a href="../../index.html" class="active">Home</a></li>
                                <li><a href="../../about-us.html">About Us</a></li>
                                <li><a href="../../properties.html">Vacation Rentals</a></li>
                                <li><a href="../../property-management.html">Property Management</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2">
                        <a href="../index.html">
                            <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}" alt="Logo"
                                class="img-fluid">
                        </a>
                    </div>
                    <div class="col-5">
                        <div class="nav-links">
                            <ul class="up">
                                <li><a href="../../faqs.html">FAQ</a></li>
                                <li><a href="../../blogs.html">Blogs</a></li>
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
        style="background-image: url({{ URL::asset('assets/frontend/images/cms/about-us-banner.webp') }});">
        <div class="auto-container">
            <h1 data-aos="zoom-in" data-aos-duration="1500" class="aos-init aos-animate">
                {{ $module_data->title ?? '' }}</h1>
            <div class="checklist">
                <p>
                    <a href="../../index.html" class="text"><span>Home</span></a>
                    <a class="g-transparent-a">{{ $module_data->title ?? '' }}</a>
                </p>
            </div>
        </div>
    </section>
    <a href="index.html#book" class="sticky main-btn book1 book-now">
        <span class="button-text">BOOK NOW</span>
    </a>
    <section class="property-detail">
        <div class="container">
            <div class="upper-area">
                <h3>{{ $module_data->title ?? '' }}</h3>
                <div class="adr-area">
                    <h6><i class="fa-solid fa-location-dot"></i>
                        {{ json_decode($module_data['address'], true)['city'] }},
                        {{ json_decode($module_data['address'], true)['state'] }}</h6>
                    <div class="share-area">
                        <button class="main-btn share"><i class="fa-regular fa-share-from-square"></i> Share</button>
                        <div class="icon-area">
                            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://www.bnbgulfcoast.com/7-yr-superhost-last-minute-weekend-getaway-pricing-320835"
                                target="_BLANK"><i class="fab fa-facebook-f"></i></a>

                            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                                href="https://twitter.com/share?text=7+yr SuperHost/Last Minute Weekend Getaway pricing&amp;url=https://www.bnbgulfcoast.com/7-yr-superhost-last-minute-weekend-getaway-pricing-320835"
                                target="_BLANK"><svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                </svg></a>

                            <a onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                                href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.bnbgulfcoast.com/7-yr-superhost-last-minute-weekend-getaway-pricing-320835"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row gallery">
                    @php
                        $pictures = json_decode($module_data['pictures'], true);
                    @endphp
                    @foreach ($pictures as $index => $picture)
                        @if ($index === 0)
                            <div class="col-6 left">
                                <a href="{{ $picture['original'] }}" data-fancybox="gallery">
                                    <img src="{{ $picture['original'] }}" class="img-fluid"
                                        alt="{{ $picture['caption'] ?? '' }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-6 right">
                        <div class="row">
                            @foreach ($pictures as $index => $picture)
                                @if ($index > 0 && $index <= 4)
                                    <div class="col-6">
                                        <a href="{{ $picture['original'] }}" data-fancybox="gallery">
                                            <img src="{{ $picture['original'] }}" class="img-fluid"
                                                alt="{{ $picture['caption'] ?? '' }}">
                                            @if ($index === 4)
                                                <button type="button" class="main-btn">Show All</button>
                                            @endif
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="hidden-gallery">
                        @foreach ($pictures as $index => $picture)
                            @if ($index > 4)
                                <div class="img-active">
                                    <a href="{{ $picture['original'] }}" data-fancybox="gallery">
                                        <img src="{{ $picture['original'] }}" class="img-fluid"
                                            alt="{{ $picture['caption'] ?? '' }}"
                                            title="{{ $picture['caption'] ?? '' }}">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row bottom">
                <div class="col-8">
                    <div class="row hosted">
                        <div class="col-12">
                            <h4>{{ $module_data->title ?? '' }}</h4>
                            <div class="ammenity-home">
                                <span><i class="fa fa-bed" aria-hidden="true"></i> {{ $module_data['accommodates'] }}
                                    Bedrooms</span>
                                <span><i class="fa fa-bed" aria-hidden="true"></i> {{ $module_data['beds'] }}
                                    Beds</span>
                                <span><i class="fa fa-bathtub" aria-hidden="true"></i>
                                    {{ $module_data['bathrooms'] }} Bathrooms</span>
                                <span><i class="fa fa-users" aria-hidden="true"></i> {{ $module_data['guests'] }}
                                    Sleeps </span>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="overview">
                        <h4>Overview</h4>
                        <div class="overcontent">
                            @php
                                $descriptions = json_decode($module_data['public_description'], true);
                                $sections = [
                                    'summary' => 'Summary',
                                    'space' => 'Space',
                                    'access' => 'Access',
                                    'interactionWithGuests' => 'Interaction with Guests',
                                    'neighborhood' => 'Neighborhood',
                                    'notes' => 'Notes',
                                    'houseRules' => 'House Rules',
                                ];
                            @endphp
                            @foreach ($sections as $key => $title)
                                @if (!empty($descriptions[$key]))
                                    <div class="description-section mb-4">
                                        <h5 class="mb-2">{{ $title }}</h5>
                                        <div class="description-content">
                                            {!! nl2br(e($descriptions[$key])) !!}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="more" id="more">
                            Show More
                            <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false"
                                style="height: 12px; width: 12px; display: block; ">
                                <path
                                    d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a class="less" id="less">
                            Show Less
                            <svg viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false"
                                style="height: 12px; width: 12px; display: block; ">
                                <path
                                    d="m4.29 1.71a1 1 0 1 1 1.42-1.41l8 8a1 1 0 0 1 0 1.41l-8 8a1 1 0 1 1 -1.42-1.41l7.29-7.29z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                    <hr>
                    <div class="amenities">
                        <h4>Amenities</h4>
                        @php
                            $amenities = json_decode($module_data['amenities'], true);
                        @endphp
                        <ul class="amenities-detail">
                            @if ($amenities)
                                @foreach ($amenities as $amenity)
                                    <li>{{ $amenity }}</li>
                                @endforeach
                            @endif
                        </ul>
                        <button class="main-btn amn-btn" data-bs-toggle="modal" data-bs-target="#amn">Show all
                            amenities</button>
                        <div class="modal" id="amn">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>What this place offers</h4>
                                        <div class="amn-area">
                                            <div class="single-amenity">
                                                @php
                                                    $amenities = json_decode($module_data['amenities'], true);
                                                @endphp
                                                <ul>
                                                    @if ($amenities)
                                                        @foreach ($amenities as $amenity)
                                                            <li>{{ $amenity }}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="availability">
                        <h4>Availability</h4>
                        <iframe id="calendar-iframe" width="100%" height="400" style="border:0;"
                            src="{{ route('full_calender', $id) }}"allowfullscreen=""
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-4 sidebar" id="book">
                    <div class="side-area">
                        <div class="upper-area">
                            <div class="price" id="price-data-div">
                                <p>$ {{ json_decode($module_data['prices'], true)['basePrice'] }}</p>
                                <span>/ night</span>
                            </div>
                        </div>
                        <div class="error-box d-none" id="gaurav-error-show-parent">
                            <p id="gaurav-error-show-p"></p>
                        </div>
                        <div class="get-quote">
                            <div class="contact-box">
                                <form class="form" id="booking_form">
                                    <div class="main-cal">
                                        <div class="ovabrw_datetime_wrapper">
                                            <input id="start_date" placeholder="Check in" name="start_date"
                                                type="text">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="ovabrw_datetime_wrapper">
                                            <input id="end_date" placeholder="Check Out" name="end_date"
                                                type="text">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                    </div>
                                    <div class="row pet" style="display:none;">
                                        <div class="col-md-12">
                                            <select class="form-control" title="Choose no. of pet"
                                                id="pet_fee_data_guarav" name="pet">
                                                <option selected="selected" value="">Choose Pet</option>
                                                <option value="0">0</option>
                                            </select>
                                            <i class="fa-solid fa-paw"></i>
                                        </div>
                                    </div>
                                    <div class="ovabrw_service_select rental_item">
                                        <input type="text" name="guests_count" readonly=""
                                            class="form-control gst" id="show-target-data" placeholder="Add guests"
                                            title="Choose no. of guests">
                                        <i class="fa-solid fa-users "></i>
                                        <input type="hidden" name="adults" id="adults-data">
                                        <input type="hidden" name="child" id="child-data">
                                        <div class="adult-popup" id="guestsss">
                                            <i class="fa fa-times close1"></i>
                                            <div class="adult-box">
                                                <p id="adults-data-show"><span> 1 Adult
                                                    </span> 18+</p>
                                                <div class="adult-btn">
                                                    <button class="button1" type="button"
                                                        onclick="functiondec('#adults-data','#show-target-data','#child-data')"
                                                        value="Decrement Value">-</button>
                                                    <button class="button11 button1" type="button"
                                                        onclick="functioninc('#adults-data','#show-target-data','#child-data')"
                                                        value="Increment Value">+</button>
                                                </div>
                                            </div>
                                            <div class="adult-box">
                                                <p id="child-data-show"><span> Child
                                                    </span> (0-17)</p>
                                                <div class="adult-btn">
                                                    <button class="button1" type="button"
                                                        onclick="functiondec('#child-data','#show-target-data','#adults-data')"
                                                        value="Decrement Value">-</button>
                                                    <button class="button11 button1" type="button"
                                                        onclick="functioninc('#child-data','#show-target-data','#adults-data')"
                                                        value="Increment Value">+</button>
                                                </div>
                                            </div>
                                            <button class="main-btn  close111" type="button"
                                                onclick="">Apply</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ovabrw-book-now" id="submit-button-gaurav-data"
                                                style="display: none;">
                                                <button type="submit" class="main-btn">
                                                    <span> Reserve</span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="gaurav-new-data-area"></div>
                                </form>
                                <div class="text-center about-owner-section">
                                    <p>Or<br>Contact Owner</p>
                                    <p><a href="mailto:randy@bnbgulfcoast.com"><i class="fa-solid fa-envelope"></i>
                                            randy@bnbgulfcoast.com</a></p>
                                    <p><a href="tel:+1 941-725-8608"><i class="fa-solid fa-phone"></i> +1
                                            941-725-8608</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="more-properties">
                <h4>More properties from BNB Gulf Coast</h4>
                <div class="owl-carousel" id="more-slider">
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/1-block-walk-on-quiet-street-to-beach-food-fun-280444"
                                data-href="https://www.bnbgulfcoast.com/1-block-walk-on-quiet-street-to-beach-food-fun-280444">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-280444-sL-4krOlF6piuX7vT8FzcU946qm43gIz--IcS4li1eO0-66681d0c15040"
                                    class="img-fluid" alt="1 Block WALK on QUIET street to beach/food/fun">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 394
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3011 Avenue East</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/1-block-walk-on-quiet-street-to-beach-food-fun-280444">1
                                    Block WALK on QUIET street to beach/food/fun</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>6 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>4 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/1-block-walk-on-quiet-street-to-beach-food-fun-280444">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../island-vacay--1-block-walk-quiet-street-to-beach-280443.html"
                                data-href="https://www.bnbgulfcoast.com/island-vacay--1-block-walk-quiet-street-to-beach-280443">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-280443-fSow1fCl7jmL6WkwDjFZfNmPODA--aoKQwjxe--VpCQQo-66684427cb1db"
                                    class="img-fluid" alt="Island Vacay -1 Block Walk/quiet street to beach">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 299
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3011 Avenue East</p>
                            <h3 class="title">
                                <a href="../island-vacay--1-block-walk-quiet-street-to-beach-280443.html">Island Vacay
                                    -1 Block Walk/quiet street to beach</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>4 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>2 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>1 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../island-vacay--1-block-walk-quiet-street-to-beach-280443.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../1-block-walk-quiet-st--to-beach-food-fun-sun-shops-280442.html"
                                data-href="https://www.bnbgulfcoast.com/1-block-walk-quiet-st--to-beach-food-fun-sun-shops-280442">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-280442-SobHh6F43--w-zNUw4ygQos-4ifkABlEtwqJtMF30G2I-66681d1a3436e"
                                    class="img-fluid" alt="1 BLOCK WALK-QUIET St. to beach/food/fun/sun/shops">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 389
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3011 Avenue East 1</p>
                            <h3 class="title">
                                <a href="../1-block-walk-quiet-st--to-beach-food-fun-sun-shops-280442.html">1 BLOCK
                                    WALK-QUIET St. to beach/food/fun/sun/shops</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>8 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../1-block-walk-quiet-st--to-beach-food-fun-sun-shops-280442.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/king-bed-beaches-86°heated-pool-turf-putting-green-264785"
                                data-href="https://www.bnbgulfcoast.com/king-bed-beaches-86°heated-pool-turf-putting-green-264785">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-264785---ntAmocaKwaMCNMdehyfOA6IzBAf9kd5--iWieALVUS8-66269affadebd"
                                    class="img-fluid" alt="King Bed-Beaches-86°Heated Pool-Turf Putting Green">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 439
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>4018 Sandpointe Drive</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/king-bed-beaches-86°heated-pool-turf-putting-green-264785">King
                                    Bed-Beaches-86°Heated Pool-Turf Putting Green</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>8 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/king-bed-beaches-86°heated-pool-turf-putting-green-264785">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../orange-leaf-ami-beach-pool-turf-putting-game-room--264574.html"
                                data-href="https://www.bnbgulfcoast.com/orange-leaf-ami-beach-pool-turf-putting-game-room--264574">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-264574-9UvBf9W-s10fjOWzUdmtCp65tqkdiDnqfYPWZyKeg54-6625ccb2f2a39"
                                    class="img-fluid" alt="Orange Leaf/AMI Beach/Pool/TURF Putting/GAME Room.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 249
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>2906 22nd Avenue West</p>
                            <h3 class="title">
                                <a href="../orange-leaf-ami-beach-pool-turf-putting-game-room--264574.html">Orange
                                    Leaf/AMI Beach/Pool/TURF Putting/GAME Room.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>7 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>4 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../orange-leaf-ami-beach-pool-turf-putting-game-room--264574.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/wow-king-bed-w-86°-pool--turf-golf-green--beaches-261332"
                                data-href="https://www.bnbgulfcoast.com/wow-king-bed-w-86°-pool--turf-golf-green--beaches-261332">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261332-LW1FfRBeAQl--QrWntexzLa6eMhAD6DoD5jAyU5S8lOE-6616c689be390"
                                    class="img-fluid" alt="WOW-King Bed w/86° Pool, Turf Golf green, Beaches">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 552
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>419 58th Street Northwest</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/wow-king-bed-w-86°-pool--turf-golf-green--beaches-261332">WOW-King
                                    Bed w/86° Pool, Turf Golf green, Beaches</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>8 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/wow-king-bed-w-86°-pool--turf-golf-green--beaches-261332">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../kayak-fish-king-bed-free-htd-pool-dog-loving---img-261329.html"
                                data-href="https://www.bnbgulfcoast.com/kayak-fish-king-bed-free-htd-pool-dog-loving---img-261329">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261329-NcC2O8Gv3-1B0HFLsFY8u7hHJr--Vjl4GJkoRICO2mJM-6616d6bf3f582"
                                    class="img-fluid" alt="Kayak-Fish-King Bed-Free Htd Pool-Dog Loving &amp; IMG">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 249
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1323 Magellan Drive</p>
                            <h3 class="title">
                                <a href="../kayak-fish-king-bed-free-htd-pool-dog-loving---img-261329.html">Kayak-Fish-King
                                    Bed-Free Htd Pool-Dog Loving &amp; IMG</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>10 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../kayak-fish-king-bed-free-htd-pool-dog-loving---img-261329.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../3-king-beds-pool-putting-green-walk-d-town-cafe-s--261328.html"
                                data-href="https://www.bnbgulfcoast.com/3-king-beds-pool-putting-green-walk-d-town-cafe-s--261328">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261328-qFXQwarV6PZa0FzCqOGBrPma19FaDSrG7bbGfHVEj1E-6616d71266012"
                                    class="img-fluid"
                                    alt="3 King Beds/Pool/Putting Green/Walk D&#039;Town Cafe&#039;s.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 399
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1523 1st Avenue West</p>
                            <h3 class="title">
                                <a href="../3-king-beds-pool-putting-green-walk-d-town-cafe-s--261328.html">3 King
                                    Beds/Pool/Putting Green/Walk D&#039;Town Cafe&#039;s.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>12 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>8 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>5 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../3-king-beds-pool-putting-green-walk-d-town-cafe-s--261328.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../heated-pool-riverwalk-d-town-walk-to-restaurants--261327.html"
                                data-href="https://www.bnbgulfcoast.com/heated-pool-riverwalk-d-town-walk-to-restaurants--261327">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261327-H--NQL4N94WFdM----xg7CPlkYbMAqya0ePQBJuJdsnts-6616d79882f6d"
                                    class="img-fluid" alt="Heated Pool-Riverwalk-D&#039;Town-Walk to Restaurants.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 299
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1529 1st Avenue West</p>
                            <h3 class="title">
                                <a href="../heated-pool-riverwalk-d-town-walk-to-restaurants--261327.html">Heated
                                    Pool-Riverwalk-D&#039;Town-Walk to Restaurants.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>10 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>7 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>3 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../heated-pool-riverwalk-d-town-walk-to-restaurants--261327.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/king-bed-en-suite-fire-pit-dog-friendly-ami-img-261324"
                                data-href="https://www.bnbgulfcoast.com/king-bed-en-suite-fire-pit-dog-friendly-ami-img-261324">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261324-9KW7t0rvvFp8DTHXAKzANkDQXxgemO6NU6NT5vzIQH8-6616d8019714f"
                                    class="img-fluid" alt="King Bed en-suite/Fire Pit/Dog friendly/AMI/IMG">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 284
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>299 44th Street West</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/king-bed-en-suite-fire-pit-dog-friendly-ami-img-261324">King
                                    Bed en-suite/Fire Pit/Dog friendly/AMI/IMG</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>6 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>4 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/king-bed-en-suite-fire-pit-dog-friendly-ami-img-261324">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../walk-to-restaurants-local-shops-near-beaches---img-261323.html"
                                data-href="https://www.bnbgulfcoast.com/walk-to-restaurants-local-shops-near-beaches---img-261323">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261323-EDP8AxEyn2dEnWDGhzvZozyiCnYBhYsQRoAqp9fapK8-6616c7fa90606"
                                    class="img-fluid" alt="Walk to Restaurants/Local shops-Near Beaches &amp; IMG">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 325
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>314 28th Street West</p>
                            <h3 class="title">
                                <a href="../walk-to-restaurants-local-shops-near-beaches---img-261323.html">Walk to
                                    Restaurants/Local shops-Near Beaches &amp; IMG</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>5 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>3 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../walk-to-restaurants-local-shops-near-beaches---img-261323.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../coral-reef-w-2-king-en-suite-img-ami-w-in-6-miles-261322.html"
                                data-href="https://www.bnbgulfcoast.com/coral-reef-w-2-king-en-suite-img-ami-w-in-6-miles-261322">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261322-kvHvQG8J44KI2-L5w9sG-J--OcYZFckK6TxbunHknEi0-6616e6131b56f"
                                    class="img-fluid" alt="Coral Reef-w/2 King en-suite-IMG-AMI w/in 6 Miles">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 294
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3724 9th Avenue West</p>
                            <h3 class="title">
                                <a href="../coral-reef-w-2-king-en-suite-img-ami-w-in-6-miles-261322.html">Coral
                                    Reef-w/2 King en-suite-IMG-AMI w/in 6 Miles</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>10 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>6 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>3 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../coral-reef-w-2-king-en-suite-img-ami-w-in-6-miles-261322.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../endless-outdoor-fun--pool-spa-golf-games-near-img--261321.html"
                                data-href="https://www.bnbgulfcoast.com/endless-outdoor-fun--pool-spa-golf-games-near-img--261321">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261321-RLrOYIx7BVhDLq-q1NlCL--WKywy36wsDnXbaOZ--4ogM-6616d8cef2cee"
                                    class="img-fluid" alt="Endless Outdoor FUN! Pool/Spa/Golf/Games/Near IMG.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 563
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3204 33rd Street West</p>
                            <h3 class="title">
                                <a href="../endless-outdoor-fun--pool-spa-golf-games-near-img--261321.html">Endless
                                    Outdoor FUN! Pool/Spa/Golf/Games/Near IMG.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>7 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>6 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../endless-outdoor-fun--pool-spa-golf-games-near-img--261321.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/amazing-game-room-86°pool-spa-beaches-dog-friendly-261320"
                                data-href="https://www.bnbgulfcoast.com/amazing-game-room-86°pool-spa-beaches-dog-friendly-261320">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261320-Ui2PeUk8ZZ--kU5HAXsd21gGBCy7wsdAfBTdAQyg9vec-6616d8e40cf4d"
                                    class="img-fluid" alt="Amazing Game Room-86°Pool/Spa-Beaches-Dog Friendly">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 234
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>416 61st Street Northwest</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/amazing-game-room-86°pool-spa-beaches-dog-friendly-261320">Amazing
                                    Game Room-86°Pool/Spa-Beaches-Dog Friendly</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>8 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>4 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>3 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/amazing-game-room-86°pool-spa-beaches-dog-friendly-261320">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/waterfall-spa-pool-family-friendly-fun-near-beach-261318"
                                data-href="https://www.bnbgulfcoast.com/waterfall-spa-pool-family-friendly-fun-near-beach-261318">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261318-080ykzUMkH--bssHApYuwWEE6EJipcg6x3R1QpSL1i--A-6616d92d71e57"
                                    class="img-fluid" alt="Waterfall spa-pool/Family Friendly Fun/Near Beach">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 399
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>7712 10th Avenue Northwest</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/waterfall-spa-pool-family-friendly-fun-near-beach-261318">Waterfall
                                    spa-pool/Family Friendly Fun/Near Beach</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>8 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/waterfall-spa-pool-family-friendly-fun-near-beach-261318">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../walk-to-restaurants-shops-ami-ferry-beaches-img-261317.html"
                                data-href="https://www.bnbgulfcoast.com/walk-to-restaurants-shops-ami-ferry-beaches-img-261317">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261317-v7Fri8Lknln9M8g--7HrnXNy0PTrcysJPdWhY29u4Qhw-6616d94123614"
                                    class="img-fluid" alt="Walk To Restaurants-Shops-AMI Ferry/Beaches/IMG">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 199
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1701 Point Pleasant Avenue
                                West</p>
                            <h3 class="title">
                                <a href="../walk-to-restaurants-shops-ami-ferry-beaches-img-261317.html">Walk To
                                    Restaurants-Shops-AMI Ferry/Beaches/IMG</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>4 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>2 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>1 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../walk-to-restaurants-shops-ami-ferry-beaches-img-261317.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../groovy-decor--yard-games--pool--hot-tub----swings--261315.html"
                                data-href="https://www.bnbgulfcoast.com/groovy-decor--yard-games--pool--hot-tub----swings--261315">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261315-HYkk-7Xyn8sk9tk9n3kn8Sc4c7WhUmVCDXaNqplOWV8-6616c91b9fe87"
                                    class="img-fluid" alt="Groovy decor, Yard Games, Pool, Hot Tub, &amp; Swings.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 247
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>2520 11th Avenue West</p>
                            <h3 class="title">
                                <a href="../groovy-decor--yard-games--pool--hot-tub----swings--261315.html">Groovy
                                    decor, Yard Games, Pool, Hot Tub, &amp; Swings.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>6 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>3 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../groovy-decor--yard-games--pool--hot-tub----swings--261315.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../relax-swim-play-games-gym-enjoy-ami-beach-sunsets--261314.html"
                                data-href="https://www.bnbgulfcoast.com/relax-swim-play-games-gym-enjoy-ami-beach-sunsets--261314">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261314-kab-D3h2tVggfTGmhzPznOvhbayY1oon--HrArCPAAlc-6616d9a4872d7"
                                    class="img-fluid" alt="Relax-Swim-Play Games-Gym-Enjoy AMI Beach Sunsets.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 249
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>4911 20th Avenue West</p>
                            <h3 class="title">
                                <a href="../relax-swim-play-games-gym-enjoy-ami-beach-sunsets--261314.html">Relax-Swim-Play
                                    Games-Gym-Enjoy AMI Beach Sunsets.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>7 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>4 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../relax-swim-play-games-gym-enjoy-ami-beach-sunsets--261314.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/endless-outdoor-fun-86°pool-game-room-dog-friendly-261313"
                                data-href="https://www.bnbgulfcoast.com/endless-outdoor-fun-86°pool-game-room-dog-friendly-261313">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261313-tzvP1dWNzoJQGjCm--x0kkeebDLy8hizSPIo0HSg0if4-6616c9496a8e6"
                                    class="img-fluid" alt="Endless Outdoor Fun-86°Pool-Game Room-Dog Friendly">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 249
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>3601 28th Avenue West</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/endless-outdoor-fun-86°pool-game-room-dog-friendly-261313">Endless
                                    Outdoor Fun-86°Pool-Game Room-Dog Friendly</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>5 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>5 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>2 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/endless-outdoor-fun-86°pool-game-room-dog-friendly-261313">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="../walk-2-restaurants-king-bed-near-beaches---img--261312.html"
                                data-href="https://www.bnbgulfcoast.com/walk-2-restaurants-king-bed-near-beaches---img--261312">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261312-jXIMmbjx-eYbvQEtkOFCefoDUmKuGMB1jYctIfK0q--4-6616d9ed0b0e7"
                                    class="img-fluid" alt="Walk 2 Restaurants-King Bed-Near Beaches &amp; IMG.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 107
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1701 Point Pleasant Avenue
                                West</p>
                            <h3 class="title">
                                <a href="../walk-2-restaurants-king-bed-near-beaches---img--261312.html">Walk 2
                                    Restaurants-King Bed-Near Beaches &amp; IMG.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>2 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>1 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>1 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a href="../walk-2-restaurants-king-bed-near-beaches---img--261312.html">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="pro-img">
                            <a href="https://www.bnbgulfcoast.com/private-king-bed-suite-near-ami-beach-walk-d’town--261311"
                                data-href="https://www.bnbgulfcoast.com/private-king-bed-suite-near-ami-beach-walk-d’town--261311">
                                <img src="https://hostaway-platform.s3.us-west-2.amazonaws.com/listing/34417-261311---Uleqi5MWWYHGnH-T9KId--v--MjYf0IBdthZi7wrhJOE-6616da16bed61"
                                    class="img-fluid" alt="Private King Bed Suite-Near AMI Beach-Walk D’Town.">
                            </a>
                            <div class="view">
                                <h5><span>
                                        $ 124
                                    </span> / Night
                                </h5>
                            </div>
                        </div>
                        <div class="pro-cont">
                            <p class="adr "><i class="fa-solid fa-location-dot"></i>1701 Point Pleasant Avenue
                                West</p>
                            <h3 class="title">
                                <a
                                    href="https://www.bnbgulfcoast.com/private-king-bed-suite-near-ami-beach-walk-d’town--261311">Private
                                    King Bed Suite-Near AMI Beach-Walk D’Town.</a>
                            </h3>
                            <div class="amn">
                                <ul class="first">
                                    <li><i class="fa-solid fa-user"></i>3 Guests </li>
                                    <li><i class="fa-solid fa-bed"></i>2 Beds </li>
                                    <li><i class="fa-solid fa-bath"></i>1 Baths </li>
                                </ul>
                            </div>
                            <div class="prop-view-btn">
                                <a
                                    href="https://www.bnbgulfcoast.com/private-king-bed-suite-near-ami-beach-walk-d’town--261311">Check
                                    Availability <i class="fa-solid fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <a href="../index.html">
                                <img src="../uploads/uploads/logo-67349387c288e.png" alt="Logo"
                                    class="img-fluid">
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
                                <li><a href="../index.html"><i class="fa-solid fa-angles-right"></i> Home</a></li>
                                <li><a href="../about-us.html"><i class="fa-solid fa-angles-right"></i> About Us</a>
                                </li>
                                <li><a href="../properties.html"><i class="fa-solid fa-angles-right"></i> Vacation
                                        Rentals</a></li>
                                <li><a href="../property-management.html"><i class="fa-solid fa-angles-right"></i>
                                        Property Management</a></li>
                                <li><a href="../faqs.html"><i class="fa-solid fa-angles-right"></i> Faq</a></li>
                                <li><a href="../blogs.html"><i class="fa-solid fa-angles-right"></i> Blogs</a></li>
                                <li><a href="../attractions.html"><i class="fa-solid fa-angles-right"></i>
                                        Attractions</a></li>

                                <li><a href="../contact-us.html"><i class="fa-solid fa-angles-right"></i> Contact
                                        Us</a>
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
                                <li><i class="fa-solid fa-location-dot"></i>Holmes Beach, FL</li>
                                <li><a href="tel:+1 941-725-8608"><i class="fa-solid fa-phone"></i>+1
                                        941-725-8608</a>
                                </li>
                                <li><a href="mailto:randy@bnbgulfcoast.com"><i
                                            class="fa-solid fa-envelope"></i>randy@bnbgulfcoast.com</a></li>
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
                            <p>Designed &amp; Dehref="https://www.webdesignvr.com/" target="_blank"><img
                                    src="../front/images/footer_1.webp"></a></p>
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
                    <img src="{{ URL::asset('assets/frontend/front/images/shape-1.svg') }}" alt="">
                </div>
                <div class="shape2">
                    <img src="{{ URL::asset('assets/frontend/front/images/shape-2.svg') }}" alt="">
                </div>
                <div class="shape3">
                    <img src="{{ URL::asset('assets/frontend/front/images/shape-3.svg') }}" alt="">
                </div>
            </div>
            <div class="foot">
                <div class="container">
                    <div class="row">
                        <div class="col-4 info">
                            <div class="info-content">
                                <div class="footer-logo">
                                    <a href="../index.html">
                                        <img src="{{ URL::asset('assets/frontend/images/uploads/logo.png') }}"
                                            alt="Logo" class="img-fluid">
                                    </a>
                                </div>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-4 other-info quick-links">
                            <h5>Quick Links</h5>
                            <ul class="footer-links">
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="../about-us.html">About Us</a></li>
                                <li><a href="../properties.html">Vacation Rentals</a></li>
                                <li><a href="../property-management.html">Property Management</a></li>
                                <li><a href="../faqs.html">FAQ</a></li>
                                <li><a href="../blogs.html">Blogs</a></li>
                                <li><a href="../attractions.html">Attractions</a></li>
                                <li><a href="../contact-us.html">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-4 other-info contact-us">
                            <h5>Contact Us</h5>
                            <ul class="footer-links">
                                <li><a href="tel:+1 941-725-8608"><img
                                            src="{{ URL::asset('assets/frontend/front/images/telephone.png') }}"
                                            alt="">+1
                                        941-725-8608</a></li>
                                <li><a href="mailto:randy@bnbgulfcoast.com"><img
                                            src="{{ URL::asset('assets/frontend/front/images/envelope.png') }}"
                                            alt="">randy@bnbgulfcoast.com</a></li>
                                <li><img src="{{ URL::asset('assets/frontend/front/images/location.png') }}"
                                        alt="">Holmes Beach, FL</li>

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
                            <p>Designed &amp; Developed by <a href="https://www.webdesignvr.com/" target="_blank"><img
                                        src="../front/images/footer_1.webp"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Days</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="gaurav-new-modal-days-area">
                    Modal body..
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Additional Fee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="gaurav-new-modal-service-area">
                    Modal body..
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Days</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="gaurav-new-modal-days-area">
                    Modal body..
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Additional Fee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="gaurav-new-modal-service-area">
                    Modal body..
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- slick js file -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Bootstrao 5 cdn js -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <!-- main js -->
    <script type="text/javascript" src="https://www.bnbgulfcoast.com/front/js/main.js?ver=1.0.0"></script>
    <script src="https://www.bnbgulfcoast.com/toastr/toastr.js?ver=1.0.0"></script>
    <script src="https://www.bnbgulfcoast.com/front/assets/fancybox/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://www.bnbgulfcoast.com/front/js/property-detail.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
            $('#more-slider').owlCarousel({
                loop: true,
                items: 3,
                margin: 25,
                dots: false,
                nav: true,
                autoplay: true,
                autoplayTimeout: 4000,
                smartSpeed: 550,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1170: {
                        items: 3

                    }
                }
            });
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
            $("#menu-toggle1").click(function() {
                $("#tag1").css("transform", "translateX(0em)");
            });
            $("#close-menu1").click(function() {
                $("#tag1").css("transform", "translateX(-38em)");
            });
            $("#menu-toggle2").click(function() {
                $("#tag2").toggle();
            });
            $("#pause").click(function() {
                $("#play").css("display", "block");
                $("#pause").css("display", "none");
            });
            $("#play").click(function() {
                $("#pause").css("display", "block");
                $("#play").css("display", "none");
            });
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
            var a = $(".abt-para").height();
            if (a < 199) {
                $("#hmore").css("display", "none");
            } else {
                $("#hmore").css("display", "block");
            }
            $(".gst").click(function() {
                $("#guestsss").css("display", "block");
            });
            $(".close1").click(function() {
                $("#guestsss").css("display", "none");
            });
            $(".close111").click(function() {
                $("#guestsss").css("display", "none");
            });
            $(document).on("change", "#pet_fee_data_guarav", function() {
                ajaxCallingData();
            });
            $(document).on("change", "#heating_pool_fee_data_guarav", function() {
                ajaxCallingData();
            });
            fetchCalender();
        });

        function playVideo() {
            $('#mob').trigger('play');
        }

        function pauseVideo() {
            $('#mob').trigger('pause');
        }

        function clearDataForm() {
            $("#start_date").val('');
            $("#end_date").val('');
            $("#submit-button-gaurav-data").hide();
            $("#gaurav-new-modal-days-area").html('');
            $("#gaurav-new-modal-service-area").html('');
            $("#gaurav-new-data-area").html('');
        }

        function ajaxCallingData() {
            $("#sygnius-loader").removeClass("d-none");
            pet_fee_data_guarav = $("#pet_fee_data_guarav").val();
            heating_pool_fee_data_guarav = $("#heating_pool_fee_data_guarav").val();
            adults = $("#adults-data").val();
            childs = $("#child-data").val();
            total_guests = parseInt(adults) + parseInt(childs);
            if (total_guests > 0) {
                if ($("#start_date").val() != "") {
                    if ($("#end_date").val() != "") {
                        $.post("https://www.bnbgulfcoast.com/checkajax-get-quote", {
                            start_date: $("#start_date").val(),
                            end_date: $("#end_date").val(),
                            heating_pool_fee_data_guarav: heating_pool_fee_data_guarav,
                            pet_fee_data_guarav: pet_fee_data_guarav,
                            adults: adults,
                            childs: childs,
                            book_sub: true,
                            property_id: 22
                        }, function(data) {
                            if (data.status == 400) {
                                $("#gaurav-new-modal-days-area").html(null);
                                $("#gaurav-new-modal-service-area").html(null);
                                $("#gaurav-new-data-area").html(null);
                                $("#submit-button-gaurav-data").hide();
                                toastr.error(data.message);
                                $("#sygnius-loader").addClass("d-none");

                            } else {
                                $("#submit-button-gaurav-data").show();
                                $("#gaurav-new-modal-days-area").html(data.modal_day_view);
                                $("#gaurav-new-modal-service-area").html(data.modal_service_view);
                                $("#gaurav-new-data-area").html(data.data_view);
                                $("#sygnius-loader").addClass("d-none");
                                $("#price-data-div").html(data.price);
                            }
                        });
                    }
                }
            } else {
                $("#gaurav-new-modal-days-area").html(null);
                $("#sygnius-loader").addClass("d-none");
                $("#gaurav-new-modal-service-area").html(null);
                $("#gaurav-new-data-area").html(null);
                $("#submit-button-gaurav-data").hide();
            }
        }

        function fetchCalender() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('property.calender', $id) }}",
                type: "GET",
                success: function(response) {
                    console.log(response);
                    const blockedDates = [];
                    const blockRefs = [];
                    response.forEach(day => {
                        if (day.block_refs) {
                            try {
                                const parsedBlockRefs = JSON.parse(day.block_refs);
                                if (Array.isArray(parsedBlockRefs) && parsedBlockRefs.length > 0) {
                                    parsedBlockRefs.forEach(block => {
                                        if (block.startDate && block.endDate) {
                                            const startDate = new Date(block.startDate)
                                                .toISOString().split('T')[0];
                                            const endDate = new Date(block.endDate)
                                            .toISOString().split('T')[0];
                                            blockedDates.push({
                                                startDate,
                                                endDate
                                            });
                                            blockRefs.push(block);
                                        }
                                    });
                                    initializeDatepicker(blockedDates);
                                } else {
                                    console.warn("No valid block references found.");
                                }
                            } catch (error) {
                                console.error("Error parsing block_refs JSON:", error);
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        function initializeDatepicker(blockedDates) {
            console.log('Blocked Dates:', blockedDates);
            const today = new Date();
            const nextMonth = new Date(today.getFullYear(), today.getMonth() + 1, 1);
            const onDayCreate = (dObj, dStr, fp, dayElem) => {
                const date = dayElem.dateObj.toISOString().split('T')[0];
                blockedDates.forEach(({
                    startDate,
                    endDate
                }) => {
                    if (date == startDate && date == endDate) {
                       dayElem.classList.add('disabled-date');
                    }
                    else if (date === startDate) {
                        dayElem.classList.add('check-in-blocked', 'red');
                    } else if (date === endDate) {
                        dayElem.classList.add('check-out-blocked', 'red');
                    } else if (new Date(date).getTime() > new Date(startDate).getTime() &&
                        new Date(date).getTime() < new Date(endDate).getTime()) {
                        dayElem.classList.add('check-in-blocked', 'check-out-blocked', 'red');
                    }
                });
            };
            const startDatePicker = flatpickr("#start_date", {
                placeholder: 'Check In',
                defaultDate: today,
                minDate: today,
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0) {
                        endDatePicker.set("minDate", dateStr);
                        endDatePicker.setDate("", false);
                    }
                },
                onDayCreate: onDayCreate
            });
            const endDatePicker = flatpickr("#end_date", {
                placeholder: 'Check Out',
                defaultDate: nextMonth,
                minDate: nextMonth,
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0 && typeof createbookingReservation === 'function') {
                        createbookingReservation();
                    }
                },
                onDayCreate: onDayCreate
            });
        }

        function createbookingReservation() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('property.createbookingReservation') }}",
                type: "POST",
                data: {
                    guestsCount: $("#guests_count").val(),
                    checkInDateLocalized: $("#start_date").val(),
                    checkOutDateLocalized: $("#end_date").val(),
                    listingId: $id
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
</body>

</html>
