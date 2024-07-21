<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarket</title>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="index.php" class="navbar-brand">
                    <h2 class="text-white">SuperMarket</h2>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="#home" class="nav-item nav-link ">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="./admin/authantication/login.php"
                        class="btn btn-outline-light py-2 px-4 d-none d-lg-inline-block">LogIn</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5" id="home">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h3 class="fw-light text-white animated slideInRight">Natural & Organic</h3>
                                    <h1 class="display-4 text-white animated slideInRight">Organic <span
                                            class="fw-light text-dark">Food</span> Is Always Healthy</h1>
                                    <p class="text-white mb-4 animated slideInRight">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing
                                        elit. Etiam feugiat rutrum lectus, sed auctor ex malesuada id. Orci varius
                                        natoque
                                        penatibus et
                                        magnis dis parturient montes.</p>
                                    <a href="#contact"
                                        class="btn btn-outline-light py-2 px-4 animated slideInRight">Contact
                                        Us</a>
                                </div>
                                <div class="col-lg-6">
                                    <img class="img-fluid animated pulse infinite" src="./assets/image/food.png" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <div class="d-flex">
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h3 class="fw-light text-white animated slideInRight">Natural & Organic</h3>
                                    <h1 class="display-4 text-white animated slideInRight">Hair <span
                                            class="fw-light text-dark">Shampoo</span> For Healthy Hair</h1>
                                    <p class="text-white mb-4 animated slideInRight">Lorem ipsum dolor sit amet,
                                        consectetur
                                        adipiscing
                                        elit. Etiam feugiat rutrum lectus, sed auctor ex malesuada id. Orci varius
                                        natoque
                                        penatibus et
                                        magnis dis parturient montes.</p>
                                    <a href="" class="btn btn-outline-light py-2 px-4 animated slideInRight">Contact
                                        Us</a>
                                </div>
                                <div class="col-lg-6">
                                    <img class="img-fluid animated pulse infinite" src="./assets/image/shaampoo-1.png"
                                        alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

     <!-- About Start -->
     <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="./assets/image/supermarket.jpg">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="text-primary mb-4">SuperMarket <span class="fw-light text-dark">is a self-service shop</span></h1>
                    <p class="mb-4">offering a wide variety of food, beverages and household products,
                         organized into sections. This kind of store is larger and has a wider selection
                          than earlier grocery stores.</p>
                    <p class="mb-4">but is smaller and more limited in the range of merchandise than a hypermarket or big-box market</p>
                    <a class="btn btn-primary py-2 px-4" href="#contact">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="contact">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-5"><span class="fw-light text-dark">If You Have Any Query,</span> Please
                    Contact Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7 wow fadeIn" data-wow-delay="0.1s">
                    <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae fuga eum expedita
                        distinctio nobis voluptas provident inventore?</p>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message"
                                            style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <iframe class="w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-white footer">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.html" class="d-inline-block mb-3">
                        <h1 class="text-primary">SuperMarket</h1>
                    </a>
                    <p class="mb-0">offering a wide variety of food, beverages and household products, organized into sections. 
                        This kind of store is larger and has a wider selection than earlier grocery stores.</p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <h5 class="mb-4">Our Products</h5>
                    <a class="btn btn-link" href="">Hair Shining Shampoo</a>
                    <a class="btn btn-link" href="">Anti-dandruff Shampoo</a>
                    <a class="btn btn-link" href="">Anti Hair Fall Shampoo</a>
                    <a class="btn btn-link" href="">Hair Growing Shampoo</a>
                    <a class="btn btn-link" href="">Anti smell Shampoo</a>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <h5 class="mb-4">Popular Link</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Career</a>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">SuperMarket</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://github.com/hay12k">Hay12k</a>  -->
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FAQs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/main.js"></script>

</html>