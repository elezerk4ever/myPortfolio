<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$user->name}}</title>
  <meta content="The portfolio of william galas" name="description">
  <meta content="williamgalas, william, galas, wsg, galas william, william galas" name="keywords">

  <!-- Favicons -->
  <link href="{{$user->about->img}}" rel="icon">
<link href="{{$user->about->img}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav class="nav-menu">
      <ul>
        <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        <li><a href="#portfolio"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <li><a href="#contact"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
    <h1>{{$user->name}}</h1>
    <p>I'm <span class="typed" data-typed-items="Programmer, {{$user->profession->name}}"></span></p>
      <div class="social-links">
        @foreach ($user->socials as $social)
      <a href="{{$social->url}}">
      <i class="fa {{$social->icon}}"></i>
      </a>
        @endforeach
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
        </div>

        <div class="row">
          <div class="col-lg-4">
          <img src="{{$user->about->img}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3>Programmer &amp; {{$user->profession->name}}.</h3>
            <p class="font-italic">
              {{$user->about->intro}}
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> {{$user->about->bdate}}</li>
                <li><i class="icofont-rounded-right"></i> <strong>Website:</strong> {{$user->about->website}}</li>
                <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> {{$user->about->phone}}</li>
                <li><i class="icofont-rounded-right"></i> <strong>City:</strong> {{$user->about->city}}, {{$user->profession->country}}</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="icofont-rounded-right"></i> <strong>Age:</strong> {{$user->about->age}}</li>
                <li><i class="icofont-rounded-right"></i> <strong>Degree:</strong> Bachelor</li>
                  <li><i class="icofont-rounded-right"></i> <strong>PhEmailone:</strong> {{$user->email}}</li>
                <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong> {{$user->about->isFreelance ? "Available" : "Not Available"}}</li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Facts</h2>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
            <span data-toggle="counter-up">{{$user->testimonies()->count()}}</span>
              <p>Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
            <span data-toggle="counter-up">{{$user->works()->count()}}</span>
              <p>Projects</p>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Skills</h2>
        </div>

        <div class="row skills-content">

          @foreach ($user->skills as $skill)
            <div class="col-lg-6">

              <div class="progress">
              <span class="skill">{{$skill->name}} <i class="val">{{$skill->rate}}%</i></span>
                <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$skill->rate}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Resume</h2>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
            <h4>{{$user->name}}</h4>
            <p><em>{{$user->about->objectives}}</em></p>
              <ul>
              <li>{{$user->about->city}}, {{$user->profession->country}}</li>
              <li>{{$user->about->phone}}</li>
                <li>{{$user->email}}</li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            @foreach ($user->educations as $education)
            <div class="resume-item">
            <h4>{{$education->course}}</h4>
            <h5>{{$education->year}}</h5>
            <p><em>{{$education->school}}</em></p>
            <p>{{$education->description}}</p>
            </div>
            @endforeach
          </div>
          <div class="col-lg-6">
            <h3 class="resume-title">Professional Experience</h3>
            @foreach ($user->experiences as $experience)
            <div class="resume-item">
            <h4>{{$experience->position}}</h4>
            <h5>{{$experience->duration}}</h5>
              <p><em>{{$experience->company}} - {{$experience->location}} </em></p>
              <ul>
                @foreach ($experience->tasks as $task)
                    <li>
                      {{$task->description}}
                    </li>
                @endforeach
              </ul>
            </div>
            @endforeach
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach ($user->works as $work)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$work->category}}">
            <div class="portfolio-wrap">
            <img src="{{$work->img}}" class="img-fluid" alt="">
              <div class="portfolio-info">
              <h4>{{$work->title}}</h4>
              <p>{{$work->category}}</p>
                <div class="portfolio-links">
                  <a href="{{$work->img}}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="{{route('works.show',$work->id)}}" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach


        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
        </div>

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

          @foreach ($user->testimonies()->inRandomOrder()->take(10)->get() as $test)
            <div class="testimonial-item">
            <img src="{{$test->img}}" class="testimonial-img" alt="">
            <h3>{{$test->client_name}}</h3>
            <h4>{{$test->client_job}}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{$test->content}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
              <p>{{$user->about->city}}, {{$user->profession->country}}</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
              <p>{{$user->email}}</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
              <p>{{$user->about->phone}}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="{{route('messages')}}" method="post" role="form" class="php-email-form">
            @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
    <h3>{{$user->name}}</h3>
      <p>Thanks for visiting!</p>
      <div class="social-links">
        @foreach ($user->socials as $social)
      <a href="{{$user->url}}"><i class="fa {{$social->icon}}"></i></a>
        @endforeach
      </div>
      <div class="copyright">
      &copy; Copyright <strong><span>Elezerk</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>