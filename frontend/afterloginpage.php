<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
    header("Location: /SE%20Project/backend/patient_login.php");
    exit();
}

$user_name = $_SESSION['username'];
$user_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$user_role = isset($_SESSION['role']) ? $_SESSION['role'] : null;


?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Website HTML</title>
    <link rel="shortcut icon" href="images/fav-icon.png">
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="afterloginpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <section id="hero">
        <nav class="navigation">
            <input type="checkbox" class="menu-btn" id="menu-btn">
            <label for="menu-btn" class="menu-icon">
                <span class="nav-icon"></span>
            </label>
            <a href="afterloginpage.html" class="logo">
                <i class="fa-solid fa-shield-heart"></i>
                <span>Health</span>Sync</a>
                <input type="text" class="location-input" placeholder="Enter Location">
                <input type="text" class="search-bar" placeholder="Search">
                <div class="profile-icon">
                    <div class="profile-initials"><?php echo strtoupper(substr($user_name, 0, 2)); ?></div>
                </div>
        </div>
    </nav>
    <script src="location.js"></script>

    <nav class="secondary-nav">
        <ul class="menu">
            <li><a href="afterloginpage.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="doctors.html">Doctors</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="patient_dashboard.php">Dash Board</a></li>

            
        </ul>
        </nav>

        <div class="hero-content">
            <div class="hero-text">
                <h1>Welcome to Health Sync – Your Health, Simplified!</h1>
                <p>At Health Sync, we bring expert medical advice, easy appointment scheduling, and seamless health management right to your fingertips. Your health journey has never been this simple and accessible. Let’s sync up for better well-being!                </p>
                <div class="hero-text-btns">
                    <a href="doctors.html"><i class="fa-solid fa-magnifying-glass"></i> Find Doctor's</a>
                    <a href="hospitals.html"><i class="fa-solid fa-hospital"></i>Find Hospitals </a>

                </div>
            </div>
            <div class="hero-img">
                <img alt="" src="images/main-bg.png">
            </div>
        </div>

        
    </section>
<section class="features-section">
    <div class="feature-box">
        <i class="fa-solid fa-calendar-check icon"></i>
        <h3>Book Appointment</h3>
        <p>Schedule your appointment with a few simple clicks and manage your bookings effortlessly.</p>
        <div class="hero-text-btns">
        <a href="booking.html"><i class="fa-solid fa-check"></i> Book Appointment</a>
        </div>

    </div>
    <div class="feature-box">
        <i class="fa-solid fa-robot icon"></i>
        <h3>AI-Powered Chatbot</h3>
        <p>Interact with our intelligent chatbot for initial support, answers to common questions, and guidance.</p>
        <div class="hero-text-btns">
        <a href="chat.html"><i class="fa-solid fa-message"></i>Chat Now </a>
        </div>
    </div>
    <div class="feature-box">
        <i class="fa-solid fa-stethoscope icon"></i>
        <h3>Symptom Checker</h3>
        <p>Check your symptoms and get an initial assessment, helping you make informed health decisions.</p>
        <div class="hero-text-btns">
        <a href="symptomchecker.html"><i class="fa-solid fa-stethoscope"></i>Check Your Symptoms </a>
        </div>
    </div>
    <div class="feature-box">
        <i class="fa-solid fa-bell icon"></i>
        <h3>Medication Reminders</h3>
        <p>Receive reminders to take your medication on time, ensuring you stay on track with your treatment.</p>
        <div class="hero-text-btns">
        <a href="medicationremainder.html"><i class="fa-solid fa-bell"></i>Set Up Reminders </a>
        </div>
    </div>
</section>



    <section id="our_departments">

        <div class="our-departments-img">
            <img src="images/departments.png" style=" height: 420px;margin-top:100px ; margin-left: 15px; width: 420px;" alt="Departments" />
    
        </div>
        <div class="our-departments-text">
            <h2>Our Departments</h2>
            <p>Health Sync offers a wide range of specialized departments to cater to all your healthcare needs. Our expert doctors are here to provide quality care in their respective fields.</p>
            <div class="departments-container">
                <div class="department-box d-box1">
                    <i class="fa-solid fa-heartbeat"></i>
                    <strong>Cardiology</strong>
                    <p>Heart health and cardiovascular care.</p>
                </div>
                <div class="department-box d-box2">
                    <i class="fa-solid fa-child"></i>
                    <strong>Pediatrics</strong>
                    <p>Comprehensive care for children and adolescents.</p>
                </div>
                <div class="department-box d-box3">
                    <i class="fa-solid fa-clinic-medical"></i>
                    <strong>Dermatology</strong>
                    <p>Expert care for skin, hair, and nails.</p>
                </div>
                <div class="department-box d-box4">
                    <i class="fa-solid fa-female"></i>
                    <strong>Gynecology</strong>
                    <p>Women's health and reproductive care.</p>
                </div>
                <div class="department-box d-box5">
                    <i class="fa-solid fa-bone"></i>
                    <strong>Orthopedics</strong>
                    <p>Bone, joint, and muscle care.</p>
                </div>
                <div class="department-box d-box6">
                    <i class="fa-solid fa-user-md"></i>
                    <strong>Gastroenterology</strong>
                    <p>Digestive health and treatments.</p>
                </div>
                <div class="department-box d-box7">
                    <i class="fa-solid fa-ribbon"></i>
                    <strong>Oncology</strong>
                    <p>Comprehensive cancer care and treatment.</p>
                </div>
                <div class="department-box d-box8">
                    <i class="fa-solid fa-brain"></i>
                    <strong>Neurology</strong>
                    <p>Brain, spinal cord, and nervous system care.</p>
                </div>
            </div>
        </div>
    
    </section>
    
    

    

    <section id="our-services">

        <div class="services-heading">
            <div class="services-heading-text" >
                <strong>Our Services</strong>
                <h2>High Quality Services For You</h2>
            </div>
            <div class="service-slide-btns">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="services-box-container">

            <div class="swiper mySwiperservices">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    <div class="service-box s-box1">
                        <i class="fa-solid fa-tooth"></i>
                        <strong>Dental Care</strong>
                        <p>Our expert dental services ensure healthy teeth and gums for patients of all ages.</p>
                    </div>
                    </div>
                    <div class="swiper-slide">
                    <div class="service-box s-box2">
                        <i class="fa-solid fa-eye"></i>
                        <strong>Eye Care</strong>
                        <p>Comprehensive eye exams and treatments to maintain your vision health.</p>
                    </div>
                    </div>
                    <div class="swiper-slide">
                    <div class="service-box s-box3">
                        <i class="fa-solid fa-face-smile"></i>
                        <strong>Skin Care</strong>
                        <p>Professional dermatology services for treating various skin conditions.</p>
                    </div>
                    </div>
                    <div class="swiper-slide">
                    <div class="service-box s-box4">
                        <i class="fa-solid fa-user-doctor"></i>
                        <strong>Surgical</strong>
                        <p>Advanced surgical procedures performed by our skilled surgeons.</p>
                    </div>
                    </div>
                </div>
            </div>

        </div>

    
    </section>


<section id="health-tips" class="alternating-section" style="background-color: rgba(255, 255, 255, 0.941);">
    <div class="text-section">
        <h3>Health Tips & Resources</h3>
        <p>Explore essential tips on nutrition, fitness, heart health, and mental wellness to maintain a balanced and healthy lifestyle.</p>
        <ul>
            <li><i class="fa-solid fa-apple-whole"></i> Nutrition Tips for Balanced Diet</li>
            <li><i class="fa-solid fa-running"></i> Daily Fitness Routines</li>
            <li><i class="fa-solid fa-heartbeat"></i> Heart Health Guidelines</li>
            <li><i class="fa-solid fa-brain"></i> Mental Wellness Advice</li>
        </ul>
        <a href="blog.html" class="explore-btn">Explore More Tips</a>
    </div>
    <div class="image-section">
        <img src="images/Health tips Image.png" alt="Health Tips Image">
    </div>
</section>

<section id="emergency-info" class="emergency-info-section">
    <div class="image-section">
        <img src="images/emergency-info.png" alt="Emergency Info Image">
    </div>
    <div class="text-section">
        <h3>Need Help? Contact Us</h3>
        <p>If you have any health concerns or need urgent medical assistance, our team is available 24/7 to assist you.</p>
        
        <a href="contact.html" class="contact-btn">Contact Us Now</a>
    </div>
</section>

</section>
    <section id="our-team">

        <div class="our-team-heading">
            <h3>Meet Our Specialist</h3>
            <p>Explore our diverse team of highly skilled doctors ready to provide exceptional care for your health needs.</p>
        </div>

        <div class="team-box-container">
            <div class="swiper mySwiperteam">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                        <div class="team-box">
                        <div class="team-img">
                            <img alt="" src="images/d1.png">
                        </div>
                        <div class="team-text">
                            <strong>Dr.Ravi Sharma</strong>
                            <span>Pediatrician</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                        <div class="team-box">
                        <div class="team-img">
                            <img alt="" src="images/d2.png">
                        </div>
                        <div class="team-text">
                            <strong>Dr.James Carter</strong>
                            <span>Gynacecologist</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                        <div class="team-box">
                        <div class="team-img">
                            <img alt="" src="images/d4.png">
                        </div>
                        <div class="team-text">
                            <strong>Dr. Olivia Patel</strong>
                            <span>Skin Specialist</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                        <div class="team-box">
                        <div class="team-img">
                            <img alt="" src="images/d3.png">
                        </div>
                        <div class="team-text">
                            <strong>Dr.William Adams</strong>
                            <span> ENT Specialist</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                        <div class="team-box">
                        <div class="team-img">
                            <img alt="" src="images/d5.png">
                        </div>
                        <div class="team-text">
                            <strong>Dr.Sophia Chen</strong>
                            <span>Pediatrician</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            </div>

            
        
        </div>

    </section>



    <section id="testimonials">

        <div class="testimonials-heading">
            <h3>Our Patients FeedBack About Us</h3>
            <p></p>
        </div>


        <div class="testimonials-content">

            <div class="testimonials-img">
                <img alt="" src="images/testimonials-img.png">
            </div>

            <div class="testimonials-box-container">

            <div class="swiper mySwipertesti">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="testimonials-box">
                    <div class="t-profile">
                        <div class="t-profile-img">
                            <img alt="" src="images/t1.jpg">
                        </div>
                        <div class="t-profile-text">
                            <strong>Massimo</strong>
                            <span>From Italy</span>
                            <div class="t-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>I had an excellent experience with Health Sync! The symptom checker was easy to use, and I was able to book an appointment with a specialist in just a few clicks. The staff was friendly and professional. Highly recommend!</p>
                    <a href="feedback.html" class="feedback-btn">Feedback Us Now</a>

                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonials-box">
                    <div class="t-profile">
                        <div class="t-profile-img">
                            <img alt="" src="images/t1.jpg">
                        </div>
                        <div class="t-profile-text">
                            <strong>Client Name</strong>
                            <span>From India</span>
                            <div class="t-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>I had an excellent experience with Health Sync! The symptom checker was easy to use, and I was able to book an appointment with a specialist in just a few clicks. The staff was friendly and professional. Highly recommend!</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="testimonials-box">
                    <div class="t-profile">
                        <div class="t-profile-img">
                            <img alt="" src="images/t1.jpg">
                        </div>
                        <div class="t-profile-text">
                            <strong>Client Name</strong>
                            <span>From China</span>
                            <div class="t-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>I had an excellent experience with Health Sync! The symptom checker was easy to use, and I was able to book an appointment with a specialist in just a few clicks. The staff was friendly and professional. Highly recommend!</p>
                </div>
            </div>
            </div>
            <div class="swiper-pagination"></div>
            </div>

            </div>
        
        </div>


    </section>
    <section id="contact" class="contact"> 
        
        <div class="container">
            <div class="mapouter">
                <div class="address" style="margin:16px;margin-right:620px; font-size:25px;">
                    <i class="fa fa-location-dot"></i>
                    <span>Location:</span>
                    <span><a href="https://www.google.com/maps/search/?api=1&query=Hyderabad" target="_blank">Hyderabad</a></span>
                </div>
                <div class="gmap_canvas">
                    <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.8055368048804!2d77.22981385036265!3d28.6655407892513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd0683919c3b%3A0xf5fc331b74c2b9e2!2sIndira%20Gandhi%20Delhi%20Technical%20University%20for%20Women!5e0!3m2!1sen!2sin!4v1679424592719!5m2!1sen!2sin"></iframe>
                    <a href="https://www.fnfgo.com/">FNF Mods</a>
                </div>
            </div>
            
            <br>
            <section class="about">
              <h2 style="color: Black;" class="h">About Healthsync</h2>
              <p style="color: grey;">
                Health Sync is a comprehensive health platform designed to help individuals manage and track their wellness journey. The website offers a range of tools and resources, including personalized health assessments, fitness tracking, meal planning, and wellness tips. By integrating with various health devices and apps, Health Sync allows users to sync their data in one place, providing a holistic view of their health. Whether you're looking to improve fitness, manage a chronic condition, or simply adopt a healthier lifestyle, Health Sync aims to empower users with the insights and support they need to achieve their health goals.</p>
            </section>
            <section class="stats-box">
              <div class="stats-container">
                <h2 style="color: Black">Our Stats</h2>
                <div class="stats">
                  <div class="stat">
                    <h3 id="stat1"style="  color: black;
                    -webkit-text-fill-color: white; 
                    -webkit-text-stroke: 2px black;">0</h3>
                    <b><p style="color: #7c7b7b;" >Checkups Available</p></b>
                  </div>
                  <div class="stat">
                    <h3 id="stat2"style="color: black;
                    -webkit-text-fill-color: white; 
                    -webkit-text-stroke: 2px black;">0</h3>
                    <b><p style="color: #7c7b7b;">Genres Covered</p></b>
                  </div>
                  <div class="stat">
                      <h3 id="stat3" style="color: black;
                      -webkit-text-fill-color: white; 
                      -webkit-text-stroke: 2px black;">0</h3>
                      <b><p style="color: #7c7b7b;">Happy Patients</p></b>
                    </div>
                </div>
              </div>
          
            </section>

    
            <script>
    function animateValue(id, start, end, duration) {
      let range = end - start;
      let current = start;
      let increment = end > start ? 1 : -1;
      let stepTime = Math.abs(Math.floor(duration / range));
      let obj = document.getElementById(id);
      let timer = setInterval(function() {
        current += increment;
        obj.innerHTML = current;
        if (current == end) {
          clearInterval(timer);
        }
      }, stepTime);
    }
    
    // Start the animation when the page loads
    window.onload = function() {
      animateValue("stat1", 0, 1000, 2000); 
      animateValue("stat2", 0, 50, 2000);   
      animateValue("stat3", 0, 5000, 2000);
    }
            </script>

      
  </div>
</section>
<script src="afterloginpage.js"></script>
        <br>
    


    <footer>
        <div class="footer-container">
            <div class="footer-company-box">
                <a href="afterloginpage.html" class="logo">
                    <i class="fa-solid fa-shield-heart"></i>
                    <span>Health</span>Sync</a>
                <p>At Health Sync, we are committed to delivering exceptional healthcare tailored to your needs. Our expert team is dedicated to supporting your journey to better health with innovative solutions and compassionate care.</p>
                <div class="footer-social">
                    <a href="#" id="facebook-link" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" id="instagram-link" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" id="twitter-link" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" id="youtube-link" target="_blank"><i class="fa-brands fa-youtube"></i></a>
  
                <script>
                    document.getElementById("instagram-link").onclick = function() {
                    window.open("https://www.instagram.com/fortis.healthcare", "_blank");
                    };
                    document.getElementById("facebook-link").onclick = function() {
                    window.open("https://www.facebook.com/WHO", "_blank");
                };

                document.getElementById("twitter-link").onclick = function() {
                    window.open("https://www.twitter.com/CDCgov", "_blank");
                };

                document.getElementById("youtube-link").onclick = function() {
                    window.open("https://www.youtube.com/user/mayoclinic", "_blank");
                };
                </script>

                </div>
            </div>
            <div class="footer-link-box">
                <strong>Main Link's</strong>
                <ul>
                    <li><a href="afterloginpage.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="#">Portfolio</a></li>
                </ul>
            </div>
            <div class="footer-link-box">
                <strong>External Link's</strong>
                <ul>
                    <li><a href="#">Our Product's</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Disclaimer</a></li>
                    <li><a href="#">Term's and Condition's</a></li>
                </ul>
            </div>
            </div>
            
   
        </div>

        <div class="footer-bottom">
           
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".mySwiperservices", {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          700: {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 50,
          },
        },
      });
    /--team--/
    var swiper = new Swiper(".mySwiperteam", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          560: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          950: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1250: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
        },
      });
    /--testimonials--/
      var swiper = new Swiper(".mySwipertesti", {
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>

</body>
</html>