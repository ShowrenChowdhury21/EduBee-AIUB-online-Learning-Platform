<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>EduBee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('asset/css/home.css') }}">
  <script src="{{ asset('asset/js/home.js') }}"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>

<body>
  <nav id="navbar">
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <a class="logo" href="/home">EduBee</a>
    <ul>
      <li><a href="#Home" class="link">Home</a></li>
      <li><a href="#Department" class="link">Department</a></li>
      <li><a href="#About" class="link">About</a></li>
      <li><a href="#FAQ" class="link">FAQ</a></li>
      <li><a href="#Announcement" class="link">Announcement</a></li>
      <li><a href="#Contact" class="link">Contact</a></li>
      <li><a href="/login" class="button">Sign in</a></li>
    </ul>
  </nav>
  <div class="slideshow-container">
    <div class="Slides fade">
      <img src="{{ asset('asset/img/image1.png') }}" style="width:100%">
    </div>
    <div class="Slides fade">
      <img src="{{ asset('asset/img/image2.jpg') }}" style="width:100%">
    </div>
    <div class="Slides fade">
      <img src="{{ asset('asset/img/image3.jpg') }}" style="width:100%">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
  <div class="header">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
    </svg>
  </div>

  <div class="sec-container">
    <div id="Department" class="dep-section">
      <div class="section">
        <h1><span class="sections">Departments</span></h1>
        <hr style="border: 2px solid #0069bb;">
        <div class="dep-container">
          <ul style="padding: 40px;">
            <li><a href="" class="link2">Architecture</a></li>
            <li><a href="" class="link2">Business Administration</a></li>
            <li><a href="" class="link2">Computer Science and Engineering</a></li>
            <li><a href="" class="link2">Electrical and Electronic Engineering</a></li>
            <li><a href="" class="link2">English</a></li>
            <li><a href="" class="link2">Industrial and Production Engineering</a></li>
            <li><a href="" class="link2">LLB</a></li>
          </ul>
        </div>
        <hr style="border: 2px solid #0069bb;">
      </div>
    </div>
    <div id="About" class="abt-section" style="margin-bottom: -10px">
      <div class="section">
        <h1><span class="sections">About</span></h1>
        <hr style="border: 2px solid #0069bb;">
        <div class="abt-container">
          <p style="padding: 40px;margin-left: 100px;margin-right: 100px; font-size: 22px; font-family: Roboto;">EduBee is an university based online learning platform. All online courses are housed on EduBee. This includes lecture videos, documents,
            quizes discussion boards and assignments. Students will access their courses through EduBee and all faculty will post their course materials on EduBee. Online learning is not meant to substitute for in class learning. But, in the period
            when physical classes are not possible, EduBee will try to give as close to a live-class experience as possible. Student discussions on EduBee will occur through discussion boards, interactive assignments and online office hours. The main
            philosophy of EduBee is to enable students to learn wherever they are, whatever their internet connectivity is, and to make learning interactive and lively.</p>
        </div>
        <hr style="border: 2px solid #0069bb;">
      </div>
    </div>
    <div id="FAQ" class="faq-section" style="margin-bottom: -100px">
      <div class="section">
        <h1><span class="sections">FAQ</span></h1>
        <hr style="border: 2px solid #0069bb;">
        <div class="faq-container">
          <div>
            <input type="checkbox" id="question1" name="q" class="questions">
            <div class="plus">+</div>
            <label for="question1" class="question">
              Why should we use EduBee?
            </label>
            <div class="answers">
              <p>EduBee is an university based online learning platform. All online courses are housed on EduBee. This includes lecture videos, documents, quizes discussion boards and assignments. Students will access their courses through EduBee and
                all faculty will post their course materials on EduBee</p>
            </div>
          </div>
          <div>
            <input type="checkbox" id="question2" name="q" class="questions">
            <div class="plus">+</div>
            <label for="question2" class="question">
              Is EduBee open for all?
            </label>
            <div class="answers">
              <p> EduBee is open for the students and Faculties of AIUB. If you are one of them, you can login in EduBee by using your institutional id or official id and password.</p>
            </div>
          </div>
          <div>
            <input type="checkbox" id="question3" name="q" class="questions">
            <div class="plus">+</div>
            <label for="question3" class="question">
              How to signup in EduBee?
            </label>
            <div class="answers">
              <p>There is no need to signup. Students and Faculties of AIUB can only use EduBee by using their institutional id and password. If you are a valid user in AIUB portal you will be able to get access in EduBee.</p>
            </div>
          </div>
        </div>
        <hr style="border: 2px solid #0069bb;">
      </div>
    </div>
    <div id="Announcement" class="announ-section">
      <div class="section">
        <h1><span class="sections">Announcement</span></h1>
        <hr style="border: 2px solid #0069bb;">
        <div class="ann-container">
        
        </div>
        <hr style="border: 2px solid #0069bb;">
      </div>
    </div>
    <div id="Contact" class="con-section" style="height:400px;">
      <div class="section">
        <h1><span class="sections">Contact</span></h1>
        <div class="contact-info">
          <div class="card">
            <i class="card-icon far fa-envelope"></i>
            <p>info@aiub.edu</p>
          </div>

          <div class="card">
            <i class="card-icon fas fa-phone"></i>
            <p>+88 02 841 4046-9; +88 02 841 4050</p>
          </div>

          <div class="card">
            <i class="card-icon fas fa-map-marker-alt"></i>
            <p>408/1, Kuratoli, Khilkhet, Dhaka 1229, Bangladesh</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-container">
      <div class="left-col">
        <label class="logo" style="color: #0082e6;">EduBee</label>
        <br>
        <div class="rounded-social-buttons">
          <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
          <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
          <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div><br>
        <p class="rights-text" style="margin-left: 45px;">© 2020 Created By Team Alphas. All Rights Reserved.</p>
      </div>
      <div class="vl"></div>
      <div class="right-col">
        <h1>Our Newsletter</h1>
        <div class="border" style="margin-bottom: 15px;"></div>
        <p style="margin-bottom: 15px;">Enter Your Email to get our news and updates.</p>
        <form action="" class="newsletter-form">
          <input type="text" class="txtb" placeholder="Enter Your Email">
          <input type="submit" class="btn" value="submit">
        </form>
      </div>
    </div>
  </footer>
 </body>
</html>