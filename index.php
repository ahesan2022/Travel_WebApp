<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: login.php");
        exit;
    } 

    $msuccess = false;
    $merror = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
  
        include 'partials/dbconnect.php';
        $email = $_POST["email"];

    $sql = "INSERT INTO `subscribers` (`email`) VALUES ('$email')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $msuccess = true;
    }
    else{
        $merror = true;
    }



    }

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Travel</title>
    </head>
    <body>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        $loggedin= true;
      }
      else{
        $loggedin = false;
      }
        echo '<header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">Unique Travel</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">About</a>
                        </li>
                        <li class="nav__item">
                            <a href="#discover" class="nav__link">Discover</a>
                        </li>
                        <li class="nav__item">
                            <a href="#place" class="nav__link">Places</a>
                        </li>';
                        if(!$loggedin){

                        echo '<li class="nav__item">
                            <a href="/travel1/travelweb/login.php" class="nav__link" >Login</a>
                        </li>
                        <li class="nav__item">
                            <a href="/travel1/travelweb/signup.php" class="nav__link" >signup</a>
                        </li>';
                        }
                        if($loggedin){

                        echo '<li class="nav__item">
                        <a  href="/travel1/travelweb/logout.php" class="nav__link">Logout</a>
                        </li>';
                    }   

                    echo '
                    <div class="nav__item">
                    <p style="color: black; font-size: 16px;">Hello!!!  '.$_SESSION['username'].'&#128512; </p>
                    </div>
                    
                    </ul>

                    <div class="nav__dark">
                        <!-- Theme change button -->
                        <span class="change-theme-name">Dark mode</span>
                        <i class="ri-moon-line change-theme" id="theme-button"></i>
                    </div>

                    <i class="ri-close-line nav__close" id="nav-close"></i>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-function-line"></i>
                </div>

            </nav>
        </header>';     

        ?>

        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <img src="assets/img/home111.jpg" alt="" class="home__img">

                <div class="home__container container grid">
                    <div class="home__data">
                        <span class="home__data-subtitle">Discover your place</span>
                        <h1 class="home__data-title">Explore The <br> Best <b>Beautiful <br> India</b></h1>
                        <a href="#" class="button">Explore</a>

                    </div>

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>

                    <div class="home__info">
                        <div>
                            <span class="home__info-title">5 best places to visit</span>
                            <a href="" class="button button--flex button--link home__info-button">
                                More <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>

                        <div class="home__info-overlay">
                            <img src="assets/img/home22.jpg" alt="" class="home__info-img">
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">More Information <br> About The Best City</h2>
                        <p class="about__description">You can find the most beautiful and pleasant places at the best 
                            prices with special discounts, you choose the place we will guide you all the way to wait, get your 
                            place now.
                        </p>
                        <a href="#" class="button">Show City</a>
                    </div>

                    <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="assets/img/about11.jpg" alt="" class="about__img-one">
                        </div>

                        <div class="about__img-overlay">
                            <img src="assets/img/about22.jpg" alt="" class="about__img-two">
                        </div>
                    </div>
                </div>
            </section>
            
            <!--==================== DISCOVER ====================-->
            <section class="discover section" id="discover">
                <h2 class="section__title">Discover the most <br> attractive places</h2>
                
                <div class="discover__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== DISCOVER 1 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="assets/img/discover11.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Manali</h2>
                                <span class="discover__description">7 Days Available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 2 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="assets/img/discover22.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Kedarnath</h2>
                                <span class="discover__description">8 Days Available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 3 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="assets/img/discover33.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Taj Mahal</h2>
                                <span class="discover__description">5 Days Available</span>
                            </div>
                        </div>

                        <!--==================== DISCOVER 4 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="assets/img/discover44.jpg" alt="" class="discover__img">
                            <div class="discover__data">
                                <h2 class="discover__title">Goa</h2>
                                <span class="discover__description">12 days Available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== EXPERIENCE ====================-->
            <section class="experience section">
                <h2 class="section__title">With Our Experience <br> We Will Serve You</h2>

                <div class="experience__container container grid">
                    <div class="experience__content grid">
                        <div class="experience__data">
                            <h2 class="experience__number">20</h2>
                            <span class="experience__description">Year <br> Experience</span>
                        </div>

                        <div class="experience__data">
                            <h2 class="experience__number">75</h2>
                            <span class="experience__description">Complete <br> tours</span>
                        </div>

                        <div class="experience__data">
                            <h2 class="experience__number">650+</h2>
                            <span class="experience__description">Tourist <br> Destination</span>
                        </div>
                    </div>

                    <div class="experience__img grid">
                        <div class="experience__overlay">
                            <img src="assets/img/experience111.jpg" alt="" class="experience__img-one">
                        </div>
                        
                        <div class="experience__overlay">
                            <img src="assets/img/experience22.jpg" alt="" class="experience__img-two">
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== VIDEO ====================-->
            <section class="video section">
                <h2 class="section__title">Video Tour</h2>

                <div class="video__container container">
                    <p class="video__description">Find out more with our video of the most beautiful and 
                        pleasant places for you and your family.
                    </p>

                    <div class="video__content">
                        <video id="video-file">
                            <source src="assets/video/video11.mp4" type="video/mp4">
                        </video>

                        <button class="button button--flex video__button" id="video-button">
                            <i class="ri-play-line video__button-icon" id="video-icon"></i>
                        </button>
                    </div>
                </div>
            </section>

            <!--==================== PLACES ====================-->
            <section class="place section" id="place">
                <h2 class="section__title">Choose Your Place</h2>

                <div class="place__container container grid">
                    <!--==================== PLACES CARD 1 ====================-->
                    <div class="place__card">
                        <img src="assets/img/place11.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">4,8</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">Manali</h3>
                                <span class="place__subtitle">Himachal Pradesh</span>
                                <span class="place__price">₹8000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                        <a href="/travel1/travelweb/manali.php" style="color: white;">Visit</a>
                        </button>
                    </div>

                    <!--==================== PLACES CARD 2 ====================-->
                    <div class="place__card">
                        <img src="assets/img/place22.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">5,0</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">Leh Ladakh</h3>
                                <span class="place__subtitle">Road Ladakh</span>
                                <span class="place__price">₹12000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                        <a href="/travel1/travelweb/lehladakh.php" style="color: white;">Visit</a>
                        </button>
                    </div>

                    <!--==================== PLACES CARD 3 ====================-->
                    <div class="place__card">
                        <img src="assets/img/place33.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">4,9</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">Kashmir</h3>
                                <span class="place__subtitle">heaven on earth</span>
                                <span class="place__price">₹15000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                        <a href="/travel1/travelweb/kashmir.php" style="color: white;">Visit</a>
                        </button>
                    </div>

                    <!--==================== PLACES CARD 4 ====================-->
                    <div class="place__card">
                        <img src="assets/img/place44.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">4,8</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">Dalhousie</h3>
                                <span class="place__subtitle">Himachal Pradesh</span>
                                <span class="place__price">₹10000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                        <a href="/travel1/travelweb/dalhousie.php" style="color: white;">Visit</a>
                        </button>
                    </div>

                    <!--==================== PLACES CARD 5 ====================-->
                    <div class="place__card">
                        <img src="assets/img/place55.jpg" alt="" class="place__img">
                        
                        <div class="place__content">
                            <span class="place__rating">
                                <i class="ri-star-line place__rating-icon"></i>
                                <span class="place__rating-number">4,8</span>
                            </span>

                            <div class="place__data">
                                <h3 class="place__title">jaisalmer</h3>
                                <span class="place__subtitle">Rajasthan</span>
                                <span class="place__price">₹14000</span>
                            </div>
                        </div>

                        <button class="button button--flex place__button">
                            <a href="/travel1/travelweb/jaisalmer.php" style="color: white;">Visit</a>
                        </button>
                    </div>
                </div>
            </section>

            

            <!--==================== SUBSCRIBE ====================-->
            <section class="subscribe section">
                <div class="subscribe__bg">
                    <div class="subscribe__container container">
                        <?php
                        if($msuccess){
                            echo "<center>Thank you for Subscibe our channel!!! <center>";
                        }
                        if($merror){
                            echo "Please enter a valid email";
                        }
                        ?>
                        <h2 class="section__title subscribe__title">Subscribe Our <br> Newsletter</h2>
                        <p class="subscribe__description">Inform our daily Information About Page.
                        </p>
    
                        <form action="/travel1/travelweb/index.php" class="subscribe__form" method="POST">
                            <input type="email" placeholder="Enter email" class="subscribe__input" name="email" id="email">
    
                            <button class="button" type="submit">
                                Subscribe
                            </button>
                        </form>
                        
                    </div>
                </div>
            </section>
            
            <!--==================== SPONSORS ====================-->
            <section class="sponsor section">
                <div class="sponsor__container container grid">
                    <div class="sponsor__content">
                        <img src="assets/img/sponsors1.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="assets/img/sponsors2.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="assets/img/sponsors3.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="assets/img/sponsors4.png" alt="" class="sponsor__img">
                    </div>
                    <div class="sponsor__content">
                        <img src="assets/img/sponsors5.png" alt="" class="sponsor__img">
                    </div>
                </div>
            </section>
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">Unique Travel</h3>
                        <p class="footer__description">Travel you choose the <br> destination, 
                            we offer you the <br> experience.
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">About</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Features</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">New & Blog</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Company</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">Team</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Plan y Pricing</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Become a member</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Support</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">FAQs</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Support Center</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer__rights">
                    <p class="footer__copy">&#169; 2021 Bedimcode. All rigths reserved.</p>
                    <div class="footer__terms">
                        <a href="#" class="footer__terms-link">Terms & Agreements</a>
                        <a href="#" class="footer__terms-link">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>

         <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

        <!--=============== SCROLL REVEAL===============-->
        <script src="assets/js/scrollreveal.min.js"></script>
        
        <!--=============== SWIPER JS ===============-->
        <script src="assets/js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
    </body>
</html>