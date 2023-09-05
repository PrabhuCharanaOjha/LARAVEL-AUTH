@include('includes.header')
<!-- <section class="bannerBackGround" style="background-image: url('{{ asset(`images/common_files/banner.png`) }}');"> -->
<section class="bannerBackGround">
    <div class="container">
        <div class="row">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                                <li><a href="#">New Releases</a></li>
                                <li><a href="#">Today's Deals</a></li>
                                <li><a href="#">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginpage') }}">login</a>
                            </li>
                        </ul>
                        <form class="d-flex position-absolute top-50 start-50 translate-middle" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item position-absolute top-50 start-100 translate-middle">
                                <a class="nav-link active" aria-current="page" href="#"> <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="text-center my-3">OUR PRODUCTS</h1>
                    <div class="col-md-12">
                        <div id="news-slider" class="owl-carousel">
                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>

                            <div class="post-slide">
                                <div class="post-img">
                                    <img src="{{ asset('images/common_files/banner.png') }}" alt="">
                                    <a href="#" class="over-layer"><i class="fa fa-link"></i></a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Lorem ipsum dolor sit amet.</a>
                                    </h3>
                                    <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consectetur cumque dolorum, ex incidunt ipsa laudantium necessitatibus neque quae tempora......</p>
                                    <span class="post-date"><i class="fas fa-clock"></i>Out 27, 2019</span>
                                    <a href="#" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="eventCarousel">
    <h1 class="text-center my-3">EVENTS</h1>
    <div class="owl-carousel owl-theme" id="owl-carousel-event">
        <div class="item">
            <img src="{{ asset('images/common_files/banner.png') }}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line"></div>
                        <h2>Teimagine Digital Experience with</h2>
                        <h1>Start-ups and solutions</h1>
                        <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('images/common_files/banner.png') }}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line animated bounceInLeft"></div>
                        <h2>Reimagine Digital Experience with</h2>
                        <h1>Intelligent solutions</h1>
                        <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('images/common_files/banner.png') }}" alt="images not found">
            <div class="cover">
                <div class="container">
                    <div class="header-content">
                        <div class="line animated bounceInLeft"></div>
                        <h2>Peimagine Digital Experience with</h2>
                        <h1>Intelligent Solutions</h1>
                        <h4>We help entrepreneurs, start-ups and enterprises shape their ideas into products</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container-fluid my-5">
        <h1 class="text-center my-3">GALLERY</h1>
        <div class="row my-3" id="galleryId">
            <div class="col-sm-3 img-hover-zoom img-hover-zoom--colorize">
                <img src="{{ asset('images/common_files/no-image-available.jpg') }}" alt="" srcset="" class="img-fluid p-5">
            </div>
            <div class="col-sm-3 img-hover-zoom img-hover-zoom--colorize">
                <img src="{{ asset('images/common_files/profile.png') }}" alt="" srcset="" class="img-fluid p-5">
            </div>
            <div class="col-sm-3 img-hover-zoom img-hover-zoom--colorize">
                <img src="{{ asset('images/common_files/no-image-available.jpg') }}" alt="" srcset="" class="img-fluid p-5">
            </div>
            <div class="col-sm-3 img-hover-zoom img-hover-zoom--colorize">
                <img src="{{ asset('images/common_files/profile.png') }}" alt="" srcset="" class="img-fluid p-5">
            </div>
        </div>
    </div>
</section>

<section class="game-section">
    <h1 class="text-center my-3">OUR TEAM</h1>
    <div class="owl-carousel custom-carousel owl-theme" id="teamId">

        <!-- <div class="item" style="background-image: url('{{ asset('images/common_files/profile.png') }}');"> -->
        <div class="item" style="background-image: url('{{ asset(`images/common_files/profile.png`) }}');">
            <div class="item-desc">
                <h3>The Witcher 3</h3>
                <p>The Witcher 3 is a multiplayer online battle arena by Valve. The game is a sequel to Defense
                    of the Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url('{{ asset(`images/common_files/profile.png`) }}');">
            <div class="item-desc">
                <h3>PUBG Mobile</h3>
                <p>PUBG 2 is a multiplayer online battle arena by Valve. The game is a sequel to Defense of the
                    Ancients, which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url('{{ asset(`images/common_files/profile.png`) }}');">
            <div class="item-desc">
                <h3>Fortnite</h3>
                <p>Battle royale where 100 players fight to be the last person standing. which was a community-created mod
                    for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
        <div class="item" style="background-image: url('{{ asset(`images/common_files/profile.png`) }}');">
            <div class="item-desc">
                <h3>Far Cry 5</h3>
                <p>Far Cry 5 is a 2018 first-person shooter game developed by Ubisoft.
                    which was a community-created mod for Blizzard Entertainment's Warcraft III.</p>
            </div>
        </div>
    </div>
</section>


<section class="testimonials">
    <div class="container my-5">
        <div class="row">
            <h1 class="text-center my-3">TESTIMONIALS</h1>
            <h3 class="text-center">What they're saying about us</h3>
            <div class="col-sm-12">
                <div id="customers-testimonials" class="owl-carousel">

                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ asset('images/common_files/profile.png') }}" alt="">
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                        </div>
                        <div class="testimonial-name">EMILIANO AQUILANI</div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ asset('images/common_files/profile.png') }}" alt="">
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                        </div>
                        <div class="testimonial-name">ANNA ITURBE</div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ asset('images/common_files/profile.png') }}" alt="">
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                        </div>
                        <div class="testimonial-name">LARA ATKINSON</div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ asset('images/common_files/profile.png') }}" alt="">
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                        </div>
                        <div class="testimonial-name">IAN OWEN</div>
                    </div>
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ asset('images/common_files/profile.png') }}" alt="">
                            <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                        </div>
                        <div class="testimonial-name">MICHAEL TEDDY</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mr-auto">
                <h2>Contact Us</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quaerat autem corrupti asperiores accusantium et fuga! Facere excepturi, quo eos, nobis doloremque dolor labore expedita illum iusto, aut repellat fuga!</p>
                <ul class="list-unstyled pl-md-5 mb-5">
                    <li class="d-flex text-black mb-2">
                        <span class="mr-3"><span class="icon-map"></span></span> 34 Street Name, City Name Here, <br> United States
                    </li>
                    <li class="d-flex text-black mb-2"><span class="mr-3"><span class="icon-phone"></span></span> +1 (222) 345 6789</li>
                    <li class="d-flex text-black"><span class="mr-3"><span class="icon-envelope-o"></span></span> info@mywebsite.com </li>
                </ul>
            </div>
            <div class="col-md-6">
                <form class="mb-5" method="post" id="contactForm" name="contactForm" novalidate="novalidate">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message" class="col-form-label">Message</label>
                            <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 my-3">
                            <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                            <span class="submitting"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




<!-- <section>
    <div class="container-fluid my-5">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d233.60253493029754!2d85.98769623643618!3d20.479951212137838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1692727660952!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section> -->

<section class="bg-dark">
    <div class="container">
        <footer class="py-3">
            <ul class="nav justify-content-center pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light">About</a></li>
            </ul>
            <ul class="nav justify-content-center pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light"><i class="fa fa-facebook"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light"><i class="fa fa-twitter"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light"><i class="fa fa-phone"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light"><i class="fa fa-whatsapp"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-light"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <p class="text-center link-light">© 2023 Company, Inc</p>
        </footer>
    </div>
</section>
<script src="{{ asset('js/home.js') }}"></script>
@include('includes.footer')