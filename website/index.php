<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MSHMS for Health Care</title>

        <!-- css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">
        <!--link href="css/nivo-lightbox.css" rel="stylesheet" />
        <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" /-->
        <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
        <link href="css/owl.theme.css" rel="stylesheet" media="screen" /-->
              <link href="css/animate.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
 
        <!-- boxed bg -->
        <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
        <!-- template skin -->
        <link id="t-colors" href="color/default.css" rel="stylesheet">

        <!-- =======================================================
          Theme Name: Medicio
          Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
          Author: BootstrapMade
          Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <!-- statusModal -->  
        <div class="modal fade" id="statusModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modal-open">
                    <div class="modal-header"><h1>Appointment Status</h1></div>
                    <div class="modal-body">
                        <p>* Enter your appointment Reference sent to you by email</p>
                        <form action="../src/queue_handler/appointment_status.php" method="post" role="form">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Appointment Code*</label>
                                                <input type="text" name="appointment_code" id="appointment_code" class="form-control input-md" data-rule="minlen:8" data-msg="Enter 8 Character Ref Code">
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                        
                    </div>
                        
                </div>
                    
            </div>
                
        </div> 
        <!-- /statusModal --> 
        <!-- bookingModal -->
        <div class="modal fade" id="bookingModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content modal-open">
                    <div class="modal-body">
                        <div class="panel panel-skin">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Make an appoinment <small>(It's free!)</small></h3>
                            </div>
                            <div class="panel-body">
                                <div id="sendmessage">Your message has been sent. Thank you!</div>
                                <div id="errormessage"></div>

                                <form action="../src/queue_handler/save_appointment.php" method="post" role="form" class="contactForm lead">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" id="first_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                                <div class="validation"></div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" name="middle_name" id="middle_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                                <div class="validation"></div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email_id" name="email_id" id="email_id" class="form-control input-md" data-rule="email" data-msg="Please enter a valid email_id">
                                                <div class="validation"></div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Mobile number</label>
                                                <input type="text" name="mobile_nos" id="mobile_nose" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md46">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                                                <div class="validation"></div>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Select Consultant</label>
                                                <select id="deparment_sought" name="deparment_sought">
                                                    <?php
                                                    include_once 'connection.php';
                                                    $dept_query = "SELECT dept_id,dept_name FROM departments WHERE visible_on_website='1'";
                                                    $dept_query_result = mysqli_query($con, $dept_query);
                                                    echo "<option value='0'>Select Consultant</option>";
                                                    while ($dept_row = mysqli_fetch_array($dept_query_result)) {
                                                        echo "<option value=\"" . $dept_row['dept_id'] . "\">" . $dept_row['dept_name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-8 col-sm-8 col-md-8">
                                            <div class="form-group">
                                                <label>Reason For Appointment</label>
                                                <textarea name="reason_for_appointment" id="reason_for_appointment" class="form-control" rows="5" placeholder="Enter Reason for Appointment (Optional)" ></textarea>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md46">
                                            <div class="form-group">
                                                <label>Date for Visit</label>
                                                <input type="date" name="request_date" id="request_date" class="form-control input-md" data-rule="required" data-msg="The  number is required">
                                                <div class="validation"></div>
                                            </div>  
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Select Time Slot</label>
                                                <select id="time_slot" name="time_slot">
                                                    <option value="09-10">09:00 AM - 10:00 AM</option>
                                                    <option value="10-11">10:00 AM - 11:00 AM</option>
                                                    <option value="11-12">11:00 AM - 12:00 AM</option>
                                                    <option value="12-13">12:00 AM - 01:00 PM</option>
                                                    <option value="16-17">04:00 PM - 05:00 PM</option>
                                                    <option value="17-18">05:00 PM - 06:00 PM</option>
                                                    <option value="18-19">06:00 PM - 07:00 PM</option>
                                                    <option value="19-20">07:00 PM - 08:00 PM</option>
                                                </select>              
                                            </div>
                                        </div>
                                        <div class="col-md-offset-2 col-md-2">
                                            <br>
                                            <input type="submit" value="Submit" class="btn btn-skin btn-sm btn-flat">
                                        </div>
                                    </div>

                                    <p class="lead-footer text-right">* We'll contact you by phone & email later</p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /bookingModal -->  
        <div id="wrapper">

            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-left">Working Hours: Monday-Saturday, 9:00 to 20:00</p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-right">Helpline: +91-233-1234-567/8/9</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container navigation">

                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img src="../assets/images/logo-hospital.png" alt="" width="150" height="40" />
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#intro">Home</a></li>
                            <li><a href="#service">Services</a></li>
                            <li><a href="#doctor">Specialists</a></li>
                            <li><a href="#facilities">Facilities</a></li>
                            <li><a href="#testimonial">Testimonials</a></li>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bookingModal">Seek Appointment</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#statusModal">Appointment Status</button>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>

            <!-- Section: intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h2 class="h-ultra">Praxis medical group</h2>
                                </div>
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h4 class="h-light">Provide best quality healthcare for you</h4>
                                </div>
                                <div class="well well-trans">
                                    <div class="wow fadeInRight" data-wow-delay="0.1s">

                                        <ul class="lead-list">
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Affordable monthly premium packages</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your favourite doctor</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Only use friendly environment</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                        </ul>
                                        <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                            <a href="#" class="btn btn-skin btn-lg">Learn more <i class="fa fa-angle-right"></i></a>
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <div class="col-lg-6">
                                <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <img src="img/dummy/img-1.png" class="img-responsive" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- /Section: intro -->

            <!-- Section: boxes -->
            <section id="boxes" class="home-section paddingtop-80">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-check fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Make an appoinment</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Choose your package</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">
                                    <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Help by specialist</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Get diagnostic report</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /Section: boxes -->


            <section id="callaction" class="home-section paddingtop-40">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="callaction bg-gray">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="cta-text">
                                                <h3>In an emergency? Need help now?</h3>
                                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                            <div class="cta-btn">
                                                <a href="#" class="btn btn-skin btn-lg">Book an appoinment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Section: services -->
            <section id="service" class="home-section nopadding paddingtop-60">

                <div class="container">

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <img src="img/dummy/img-1.jpg" class="img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">

                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-stethoscope fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Medical checkup</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="wow fadeInRight" data-wow-delay="0.2s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-wheelchair fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Nursing Services</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wow fadeInRight" data-wow-delay="0.3s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-plus-square fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Pharmacy</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-sm-3 col-md-3">

                            <div class="wow fadeInRight" data-wow-delay="0.1s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-h-square fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Gyn Care</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="wow fadeInRight" data-wow-delay="0.2s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-filter fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Neurology</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wow fadeInRight" data-wow-delay="0.3s">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-user-md fa-3x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5 class="h-light">Sleep Center</h5>
                                        <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
            <!-- /Section: services -->


            <!-- Section: team -->
            <section id="doctor" class="home-section bg-gray paddingbot-60">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="section-heading text-center">
                                    <h2 class="h-bold">Doctors</h2>
                                    <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
                                </div>
                            </div>
                            <div class="divider-short"></div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div id="filters-container" class="cbp-l-filters-alignLeft">
                                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (
                                    <div class="cbp-filter-counter"></div>)</div>
                                <div data-filter=".cardiologist" class="cbp-filter-item">Cardiologist (
                                    <div class="cbp-filter-counter"></div>)</div>
                                <div data-filter=".psychiatrist" class="cbp-filter-item">Psychiatrist (
                                    <div class="cbp-filter-counter"></div>)</div>
                                <div data-filter=".neurologist" class="cbp-filter-item">Neurologist (
                                    <div class="cbp-filter-counter"></div>)</div>
                            </div>

                            <div id="grid-container" class="cbp-l-grid-team">
                                <ul>
                                    <li class="cbp-item psychiatrist">
                                        <a href="doctors/member1.html" class="cbp-caption cbp-singlePage">
                                            <div class="cbp-caption-defaultWrap">
                                                <img src="img/team/1.jpg" alt="" width="100%">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="doctors/member1.html" class="cbp-singlePage cbp-l-grid-team-name">Alice Grue</a>
                                        <div class="cbp-l-grid-team-position">Psychiatrist</div>
                                    </li>
                                    <li class="cbp-item cardiologist">
                                        <a href="doctors/member2.html" class="cbp-caption cbp-singlePage">
                                            <div class="cbp-caption-defaultWrap">
                                                <img src="img/team/2.jpg" alt="" width="100%">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="doctors/member2.html" class="cbp-singlePage cbp-l-grid-team-name">Joseph Murphy</a>
                                        <div class="cbp-l-grid-team-position">Cardiologist</div>
                                    </li>
                                    <li class="cbp-item cardiologist">
                                        <a href="doctors/member3.html" class="cbp-caption cbp-singlePage">
                                            <div class="cbp-caption-defaultWrap">
                                                <img src="img/team/3.jpg" alt="" width="100%">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="doctors/member3.html" class="cbp-singlePage cbp-l-grid-team-name">Alison Davis</a>
                                        <div class="cbp-l-grid-team-position">Cardiologist</div>
                                    </li>
                                    <li class="cbp-item neurologist">
                                        <a href="doctors/member4.html" class="cbp-caption cbp-singlePage">
                                            <div class="cbp-caption-defaultWrap">
                                                <img src="img/team/4.jpg" alt="" width="100%">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body">
                                                        <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="doctors/member4.html" class="cbp-singlePage cbp-l-grid-team-name">Adam Taylor</a>
                                        <div class="cbp-l-grid-team-position">Neurologist</div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /Section: team -->



            <!-- Section: works -->
            <section id="facilities" class="home-section paddingbot-60">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="section-heading text-center">
                                    <h2 class="h-bold">Our facilities</h2>
                                    <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
                                </div>
                            </div>
                            <div class="divider-short"></div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="wow bounceInUp" data-wow-delay="0.2s">
                                <div id="owl-works" class="owl-carousel">
                                    <div class="item"><a href="img/photo/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="img/photo/1.jpg" class="img-responsive" alt="img"></a></div>
                                    <div class="item"><a href="img/photo/2.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="img/photo/2.jpg" class="img-responsive " alt="img"></a></div>
                                    <div class="item"><a href="img/photo/3.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="img/photo/3.jpg" class="img-responsive " alt="img"></a></div>
                                    <div class="item"><a href="img/photo/4.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                                    <div class="item"><a href="img/photo/5.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="img/photo/5.jpg" class="img-responsive " alt="img"></a></div>
                                    <div class="item"><a href="img/photo/6.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="img/photo/6.jpg" class="img-responsive " alt="img"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Section: works -->


            <!-- Section: testimonial -->
            <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

                <div class="carousel-reviews broun-block">
                    <div class="container">
                        <div class="row">
                            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Emergency Contraception</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                                                                                                                                                                                        class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/1.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Anna</a>
                                                <span>Chicago, Illinois</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Orthopedic Surgery</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                                                        <span
                                                            data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/2.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Matthew G</a>
                                                <span>San Antonio, Texas</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Medical consultation</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                                                                                                                                                                                        class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/3.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Scarlet Smith</a>
                                                <span>Dallas, Texas</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Birth control pills</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                                                                                                                                                                                        class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/4.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Lucas Thompson</a>
                                                <span>Austin, Texas</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Radiology</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                                                        <span
                                                            data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/5.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Ella Mentree</a>
                                                <span>Fort Worth, Texas</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Cervical Lesions</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                                                                                                                                                                                                        class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                                                </div>
                                                <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/6.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Suzanne Adam</a>
                                                <span>Detroit, Michigan</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Section: testimonial -->

            <footer>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="widget">
                                    <h5>About Praxis Med+</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                                    </p>
                                </div>
                            </div>
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="widget">
                                    <h5>Information</h5>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Laboratory</a></li>
                                        <li><a href="#">Medical treatment</a></li>
                                        <li><a href="#">Terms & conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="widget">
                                    <h5>Health Center</h5>
                                    <p>
                                        Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                                    </p>
                                    <ul>
                                        <li>
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                            </span> Monday - Saturday, 8am to 10pm
                                        </li>
                                        <li>
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                            </span> +91 (233)230-5194
                                        </li>
                                        <li>
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                            </span> hello@medicio.com
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="widget">
                                    <h5>Our location</h5>
                                    <p>Praxis HealthCare+. Vishrambag, SANGLI 416415 MS India</p>

                                </div>
                            </div>
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="widget">
                                    <h5>Follow us</h5>
                                    <ul class="company-social">
                                        <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                        <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sub-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="text-left">
                                        <p>&copy;Copyright - Medicio Theme. All rights reserved.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">
                                    <div class="text-right">
                                        <div class="credits">
                                            <!--
                                              All the links in the footer should remain intact. 
                                              You can delete the links only if you purchased the pro version.
                                              Licensing information: https://bootstrapmade.com/license/
                                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                                            -->
                                            <a href="https://bootstrapmade.com/bootstrap-education-templates/">Bootstrap Education Templates</a> by BootstrapMade
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

        <!-- Core JavaScript Files -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/stellar.js"></script>
        <script src="js/jquery.cubeportfolio.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/nivo-lightbox.min.js"></script>
        <script src="js/custom.js"></script>

    </body>

</html>
