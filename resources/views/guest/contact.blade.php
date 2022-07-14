<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('mainassets/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('mainassets/css/style.css') }}" type="text/css">
</head>
<body>
    @include('inc.guest.header', ['num' => $c->getNumberofProducts(), 'tot' => $c->getTotal()])

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4>Tunisia</h4>
                                <p>Teboulba, Monastir, Tunis <br />+21653224190</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    @include('inc.guest.footer')
    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('mainassets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('mainassets//bootstrap.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('mainassets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('mainassets/js/main.js') }}"></script>
</body>
</html>
