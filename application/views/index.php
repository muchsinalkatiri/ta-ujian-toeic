<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JTI.TOEIC</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/vendor/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
  </head>

  <body id="body">

  <!--==========================
    Top Bar
    ============================-->

  <!--==========================
    Header
    ============================-->
    <header id="header">
      <div class="container">

        <div id="logo" style="float: left; ">
          <h1><a href="#body" class="scrollto">JTI.<span>TOEIC</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="#body">Home</a></li>
            <li><a href="#about">About </a></li>
            <li><a href="#services">Feature</a></li>
            <li><a href="#portfolio">Table Convertion</a></li>
            <li><a href="#team">Level of competent</a></li>
            <li><a href="#contact">Contact</a></li>
            <?php if($this->session->userdata('level') == '2' ){ ?>
           	<li ><a href=""><?php echo $this->session->userdata('username') ?> <i class="fa fa-caret-down"></i></a>
            	<ul>
            		<li><a href="<?php echo base_url('mahasiswa/ujian'); ?>">Dashboard</a></li>
            		<li><a href="<?php echo base_url('user/login/logout'); ?>">Logout</a></li>
            	</ul>
            </li>
            <?php }elseif($this->session->userdata('level') == '1' || $this->session->userdata('level') == '0' ){ ?>
           	<li ><a href=""><?php echo $this->session->userdata('username') ?></a>
            	<ul>
            		<li><a href="<?php echo base_url('mahasiswa/ujian'); ?>">Dashboard</a></li>
            		<li><a href="<?php echo base_url('user/login/logout'); ?>">Logout</a></li>
            	</ul>
            </li>
            <?php }else{ ?>	
            <li><a href="<?php echo base_url('user/login'); ?>">Login</a></li>
            <?php } ?>
          </ul>
        </nav><!-- #nav-menu-container -->
      </div>
    </header><!-- #header -->

  <!--==========================
    Intro Section
    ============================-->
    <section id="intro">

      <div class="intro-content">
        <h2>Sistem Informasi  <span> Ujian Online </span><br>TOEIC JTI</h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">About</a>
          <?php if(!$this->session->userdata('logged_in')){ ?>
	        <a href="<?php echo base_url('user/login'); ?>" class="btn-projects scrollto">Lets Start</a>
        <?php } ?>
        </div>
      </div>

      <div id="intro-carousel" class="owl-carousel" >
        <div class="item" style="background-image: url('<?php echo base_url(); ?>img/intro-carousel/1.jpg');"></div>
        <div class="item" style="background-image: url('<?php echo base_url(); ?>img/intro-carousel/2.jpg');"></div>
        <div class="item" style="background-image: url('<?php echo base_url(); ?>img/intro-carousel/3.jpg');"></div>
        <div class="item" style="background-image: url('<?php echo base_url(); ?>img/intro-carousel/4.jpg');"></div>
        <div class="item" style="background-image: url('<?php echo base_url(); ?>img/intro-carousel/5.jpg');"></div>
      </div>

    </section><!-- #intro -->

    <main id="main">

    <!--==========================
      About Section
      ============================-->
      <section id="about" class="wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 about-img">
              <img src="<?php echo base_url();?>assets/img/about-img.jpg" alt="">
            </div>

            <div class="col-lg-6 content">
              <h2>Sistem Informasi Ujian TOEIC JTI</h2>
              <h3>Is a system of assessing and implementing TOEIC online exams to achieve quality, and test efficiency. </h3>

              <ul>
                <li><i class="fa fa-check-circle"></i> No longer using paper or stationery as a test.</li>
                <li><i class="fa fa-check-circle"></i> The system immediately corrects the answer and converts the value automatically.</li>
                <li><i class="fa fa-check-circle"></i> Students will immediately get the results of the exam when the exam is finished.</li>
              </ul>

            </div>
          </div>

        </div>
      </section><!-- #about -->

    <!--==========================
      Services Section
      ============================-->
      <section id="services">
        <div class="container">
          <div class="section-header">
            <h2>MAIN FEATURE</h2>
          </div>

          <div class="row">

            <div class="col-lg-6">
              <div class="box wow fadeInLeft">
                <div class="icon"><i class="fab fa-whatsapp"></i></div>
                <h4 class="title"><a href="">Shipping by Whatsapp</a></h4>
                <p class="description">After the user conducts an online exam, the system will immediately send the test results to the WhatsApp account of each student.</p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="box wow fadeInRight">
                <div class="icon"><i class="fa fa-envelope"></i></div>
                <h4 class="title"><a href="">Shipping by Email</a></h4>
                <p class="description">If the user has not received the test results via whatsapp message, the user can send via email.</p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="box wow fadeInLeft" data-wow-delay="0.2s">
                <div class="icon"><i class="fa fa-map"></i></div>
                <h4 class="title"><a href="">User Friendly</a></h4>
                <p class="description">This Information System is made with a design that is as attractive and easy as possible for users who take the exam.</p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="fa fa-lock"></i></div>
                <h4 class="title"><a href="">Secure</a></h4>
                <p class="description">When things happen that are not desired, such as the lights are off or the internet is broken, the user can continue the test.</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- #services -->


    <!--==========================
      Our Portfolio Section
      ============================-->
      <section id="portfolio" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Table Convertion</h2>
            <p>Answers that have been answered correctly by the user will be directly converted by the system into the TOEIC scoring standard.</p>
          </div>
        </div>

        <div class="container" style="font-size: .7rem; ">

          <div class="row">
            <div class="col-md-3">
              <table class="table table-striped table-bordered text-center" id="dataTable"  cellspacing="0">
                <thead>
                 <tr>
                  <th>Correct Answer</th>
                  <th>Listening Score</th>
                  <th>Reading Score</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>5</td><td>5</td></tr>
                <tr><td>2</td><td>5</td><td>5</td></tr>
                <tr><td>3</td><td>5</td><td>5</td></tr>
                <tr><td>4</td><td>5</td><td>5</td></tr>
                <tr><td>5</td><td>5</td><td>5</td></tr>
                <tr><td>6</td><td>5</td><td>5</td></tr>
                <tr><td>7</td><td>10</td><td>5</td></tr>
                <tr><td>8</td><td>15</td><td>5</td></tr>
                <tr><td>9</td><td>20</td><td>5</td></tr>
                <tr><td>10</td><td>25</td><td>5</td></tr>
                <tr><td>11</td><td>30</td><td>5</td></tr>
                <tr><td>12</td><td>35</td><td>5</td></tr>
                <tr><td>13</td><td>40</td><td>5</td></tr>
                <tr><td>14</td><td>45</td><td>5</td></tr>
                <tr><td>15</td><td>50</td><td>5</td></tr>
                <tr><td>16</td><td>55</td><td>10</td></tr>
                <tr><td>17</td><td>60</td><td>15</td></tr>
                <tr><td>18</td><td>65</td><td>20</td></tr>
                <tr><td>19</td><td>70</td><td>25</td></tr>
                <tr><td>20</td><td>75</td><td>30</td></tr>
                <tr><td>21</td><td>80</td><td>35</td></tr>
                <tr><td>22</td><td>85</td><td>40</td></tr>
                <tr><td>23</td><td>90</td><td>45</td></tr>
                <tr><td>24</td><td>95</td><td>50</td></tr>
                <tr><td>25</td><td>100</td><td>60</td></tr>
              </tbody>
            </table>
          </div>


        <div class="col-md-3">
          <table class="table table-striped table-bordered text-center" id="dataTable"  cellspacing="0">
            <thead>
             <tr>
              <th>Correct Answer</th>
              <th>Listening Score</th>
              <th>Reading Score</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>26</td><td>110</td><td>65</td></tr>
            <tr><td>27</td><td>115</td><td>70</td></tr>
            <tr><td>28</td><td>120</td><td>80</td></tr>
            <tr><td>29</td><td>125</td><td>85</td></tr>
            <tr><td>30</td><td>130</td><td>90</td></tr>
            <tr><td>31</td><td>135</td><td>95</td></tr>
            <tr><td>32</td><td>140</td><td>100</td></tr>
            <tr><td>33</td><td>145</td><td>110</td></tr>
            <tr><td>34</td><td>150</td><td>115</td></tr>
            <tr><td>35</td><td>160</td><td>120</td></tr>
            <tr><td>36</td><td>165</td><td>125</td></tr>
            <tr><td>37</td><td>170</td><td>130</td></tr>
            <tr><td>38</td><td>175</td><td>140</td></tr>
            <tr><td>39</td><td>180</td><td>145</td></tr>
            <tr><td>40</td><td>185</td><td>150</td></tr>
            <tr><td>41</td><td>190</td><td>160</td></tr>
            <tr><td>42</td><td>195</td><td>165</td></tr>
            <tr><td>43</td><td>200</td><td>170</td></tr>
            <tr><td>44</td><td>210</td><td>175</td></tr>
            <tr><td>45</td><td>215</td><td>180</td></tr>
            <tr><td>46</td><td>220</td><td>190</td></tr>
            <tr><td>47</td><td>230</td><td>195</td></tr>
            <tr><td>48</td><td>240</td><td>200</td></tr>
            <tr><td>49</td><td>245</td><td>210</td></tr>
            <tr><td>50</td><td>250</td><td>215</td></tr>
          </tbody>
        </table>
      </div>

          <div class="col-md-3">
            <table class="table table-bordered table-striped text-center" id="dataTable"  cellspacing="0">
              <thead>
               <tr>
                <th>Correct Answer</th>
                <th>Listening Score</th>
                <th>Reading Score</th>
              </tr>
            </thead>
          </thead>
          <tbody>
            <tr><td>51</td><td>255</td><td>220</td></tr>
            <tr><td>52</td><td>260</td><td>225</td></tr>
            <tr><td>53</td><td>265</td><td>230</td></tr>
            <tr><td>54</td><td>270</td><td>235</td></tr>
            <tr><td>55</td><td>275</td><td>240</td></tr>
            <tr><td>56</td><td>280</td><td>250</td></tr>
            <tr><td>57</td><td>290</td><td>255</td></tr>
            <tr><td>58</td><td>295</td><td>260</td></tr>
            <tr><td>59</td><td>300</td><td>265</td></tr>
            <tr><td>60</td><td>305</td><td>270</td></tr>
            <tr><td>61</td><td>315</td><td>280</td></tr>
            <tr><td>62</td><td>320</td><td>285</td></tr>
            <tr><td>63</td><td>325</td><td>290</td></tr>
            <tr><td>64</td><td>330</td><td>300</td></tr>
            <tr><td>65</td><td>335</td><td>305</td></tr>
            <tr><td>66</td><td>340</td><td>310</td></tr>
            <tr><td>67</td><td>345</td><td>320</td></tr>
            <tr><td>68</td><td>350</td><td>325</td></tr>
            <tr><td>69</td><td>355</td><td>330</td></tr>
            <tr><td>70</td><td>360</td><td>335</td></tr>
            <tr><td>71</td><td>365</td><td>340</td></tr>
            <tr><td>72</td><td>370</td><td>350</td></tr>
            <tr><td>73</td><td>375</td><td>355</td></tr>
            <tr><td>74</td><td>380</td><td>360</td></tr>
            <tr><td>75</td><td>380</td><td>365</td></tr>
          </tbody>
          </table>
        </div>


      <div class="col-md-3">
        <table class="table table-bordered table-striped text-center" id="dataTable"  cellspacing="0">
              <thead>
               <tr>
                <th>Correct Answer</th>
                <th>Listening Score</th>
                <th>Reading Score</th>
              </tr>
            </thead>
          </thead>
          <tbody>
            <tr><td>76</td><td>390</td><td>370</td></tr>
            <tr><td>77</td><td>395</td><td>380</td></tr>
            <tr><td>78</td><td>400</td><td>385</td></tr>
            <tr><td>79</td><td>405</td><td>390</td></tr>
            <tr><td>80</td><td>410</td><td>395</td></tr>
            <tr><td>81</td><td>415</td><td>400</td></tr>
            <tr><td>82</td><td>420</td><td>405</td></tr>
            <tr><td>83</td><td>425</td><td>410</td></tr>
            <tr><td>84</td><td>430</td><td>415</td></tr>
            <tr><td>85</td><td>435</td><td>420</td></tr>
            <tr><td>86</td><td>440</td><td>425</td></tr>
            <tr><td>87</td><td>445</td><td>430</td></tr>
            <tr><td>88</td><td>450</td><td>435</td></tr>
            <tr><td>89</td><td>460</td><td>445</td></tr>
            <tr><td>90</td><td>465</td><td>450</td></tr>
            <tr><td>91</td><td>470</td><td>455</td></tr>
            <tr><td>92</td><td>475</td><td>465</td></tr>
            <tr><td>93</td><td>480</td><td>470</td></tr>
            <tr><td>94</td><td>485</td><td>480</td></tr>
            <tr><td>95</td><td>390</td><td>485</td></tr>
            <tr><td>96</td><td>495</td><td>490</td></tr>
            <tr><td>97</td><td>495</td><td>495</td></tr>
            <tr><td>98</td><td>495</td><td>495</td></tr>
            <tr><td>99</td><td>495</td><td>495</td></tr>
            <tr><td>100</td><td>495</td><td>495</td></tr>
          </tbody>
          </table>
    </div>
  </div>

</div>
</section><!-- #portfolio -->

    <!--==========================
      Our Team Section
      ============================-->
      <section id="team" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Level Of Competent</h2>
          </div>
          <center >
            <table style="width: 500px; " class="table table-bordered table-striped text-center" id="dataTable"  cellspacing="0">
          <tbody>
            <tr><td>805-990</td><td>High Advance</td></tr>
            <tr><td>655-800</td><td>Advance</td></tr>
            <tr><td>555-650</td><td>High Intermediate</td></tr>
            <tr><td>406-550</td><td>Intermediate</td></tr>
            <tr><td>305-400</td><td>High Beginner</td></tr>
            <tr><td>205-300</td><td>Beginner 2</td></tr>
            <tr><td>10-200</td><td>Beginner 1</td></tr>
          </tbody>
          </table>
          </center>

        </div>
      </section><!-- #team -->

    <!--==========================
      Contact Section
      ============================-->
      <section id="contact" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Contact Us</h2>
          </div>

          <div class="row contact-info">

            <div class="col-md-4">
              <div class="contact-address">
                <i class="fa fa-map-marker"></i>
                <h3>Address</h3>
                <address>Perumahan Patraland c2/01</address>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-phone">
                <i class="fa fa-phone"></i>
                <h3>Phone Number</h3>
                <p><a href="tel:+155895548855">+6287756404524</a></p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="contact-email">
                <i class="fa fa-envelope"></i>
                <h3>Email</h3>
                <p><a href="mailto:info@example.com">taujiantoeic.gmail.com</a></p>
              </div>
            </div>

          </div>
        </div>

      </section><!-- #contact -->

    </main>

  <!--==========================
    Footer
    ============================-->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>Muchsin & Istna</strong>. All Rights Reserved
        </div>
        <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <!-- <script src="lib/jquery/jquery-migrate.min.js"></script> -->
  <!-- <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/vendor/easing/easing.min.js"></script>
  <!-- <script src="lib/superfish/hoverIntent.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/vendor/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/wow/wow.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/owlcarousel/owl.carousel.min.js"></script>
  <!-- <script src="lib/magnific-popup/magnific-popup.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/vendor/sticky/sticky.js"></script>

  <!-- Contact Form JavaScript File -->

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>
