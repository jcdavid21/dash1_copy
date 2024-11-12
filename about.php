<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <title>About Us</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <style>
      .map {
        height: 500px;
        position: relative;
      }

      .map iframe {
        width: 100%;
      }

      .map .map-inside {
        position: absolute;
        left: 50%;
        top: 160px;
        -webkit-transform: translateX(-175px);
        -ms-transform: translateX(-175px);
        transform: translateX(-175px);
      }

      .map .map-inside i {
        font-size: 48px;
        color: #7fad39;
        position: absolute;
        bottom: -75px;
        left: 50%;
        -webkit-transform: translateX(-18px);
        -ms-transform: translateX(-18px);
        transform: translateX(-18px);
      }

      .map .map-inside .inside-widget {
        width: 350px;
        background: #ffffff;
        text-align: center;
        padding: 23px 0;
        position: relative;
        z-index: 1;
        -webkit-box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
        box-shadow: 0 0 20px 5px rgba(12, 7, 26, 0.15);
      }

      .map .map-inside .inside-widget:after {
        position: absolute;
        left: 50%;
        bottom: -30px;
        -webkit-transform: translateX(-6px);
        -ms-transform: translateX(-6px);
        transform: translateX(-6px);
        border: 12px solid transparent;
        border-top: 30px solid #ffffff;
        content: "";
        z-index: -1;
      }

      .map .map-inside .inside-widget h4 {
        font-size: 22px;
        font-weight: 700;
        color: #1c1c1c;
        margin-bottom: 4px;
      }

      .map .map-inside .inside-widget ul li {
        text-align: center;
        list-style: none;
        font-size: 16px;
        color: #666666;
        line-height: 26px;
      }

      .icon-badge-group .icon-badge-container {
          display: inline-block;
        
        }
        .icon-badge-container {
          
          position: absolute;
        }
        .icon-badge-icon {
          font-size: 30px;
          color: rgb(0 0 0 / 50%);
          position: relative;
        }
        .icon-badge {
          background-color: #979797;;
          font-size: 10px;
          color: white;
          text-align: center;
          width: 15px;
          height: 15px;
          border-radius: 49%;
          position: relative;
          top: -35px;
          left: 17px;
        }     



    </style>






  </head>
  <body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_nav.php';?>
 
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
    <div class="container">

        
        
      <!-- Contact Section Begin -->
      <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <i class="icofont-phone"></i>
                        <h4>Phone</h4>
                        <p>+639 9139 7537</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                      <i class="icofont-location-pin"></i>
                        <h4>Address</h4>
                        <p>047 San Mateo St. Fatima 3,<br>Area E CSJDM Bulacan</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                      <i class="icofont-clock-time"></i>
                        <h4>Open time</h4>
                        <p>5:30 am to 10:30 am<br>for pickup</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                    <i class="icofont-send-mail"></i>
                        <h4>Email</h4>
                        <p>rechellefrilles@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- Contact Section End -->
    </section>
    <!-- End About Us Section -->

          <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.651887478579!2d121.04221477088164!3d14.844782939408041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397af3239383001%3A0xa06c346a0569a0ed!2s47%20San%20Mateo%20St%2C%20San%20Jose%20del%20Monte%20City%2C%20Bulacan!5e0!3m2!1sen!2sph!4v1728998165753!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>"
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Bulacan</h4>
                <ul>
                    <li>Phone: +639 9139-7537</li>
                    <li>Add: 047 San Mateo St. Fatima 3,<br>Area E CSJDM Bulacan</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

      
  <main id="main">
    

    <!-- ======= Contact Us ======= -->
    <section id="team" class="team">

        <div class="container">
          <div class="row contact-container">
            <div class="col-lg-12">
              <div class="card card-shadow border-0 mb-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="contact-box p-8">
                      <div class="row">
                        <div class="col-lg-9">
                          <h2 class="title">CONTACT US</h2>
                        </div>
                        <?php if($loggedin){ ?>
                          <div class="col-lg-3">
                            <div class="icon-badge-container mx-1" style="padding-left: 167px;">
                              <a href="#" data-toggle="modal" data-target="#adminReply"><i class="far fa-envelope icon-badge-icon"></i></a>
                              <div class="icon-badge"><b><span id="totalMessage">0</span></b></div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                      <?php
                          $passSql = "SELECT * FROM users WHERE id='$userId'"; 
                          $passResult = mysqli_query($conn, $passSql);
                          $passRow=mysqli_fetch_assoc($passResult);
                          $email = $passRow['email'];
                          $phone = $passRow['phone'];
                          
                      ?>
                      <form action="partials/_manageContactUs.php" method="POST">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <b><label for="email">Email:</label></b>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon">+63</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="basic-addon" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" value="<?php echo $phone ?>">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <b><label for="orderId">Order Id:</label></b>
                              <input class="form-control" type="text" id="orderId" name="orderId" placeholder="Order Id" value="0">
                              <small id="orderIdHelp" class="form-text text-muted">If your problem is not related to the order(order id = 0).</small>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <b><label for="password">Password:</label></b>
                              <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" placeholder="Enter Your Password" required data-toggle="password">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group  mt-3">
                                <textarea class="form-control" id="message" name="message" rows="2" required minlength="6" placeholder="How May We Help You ?"></textarea>
                            </div>
                          </div>
                          <?php if($loggedin){ ?>
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-danger mt-3 mb-3 text-white border-0 py-2 px-3"><span> Submit Now <i class="ti-arrow-right"></i></span></button>
                              <button type="button" class="btn btn-danger mt-3 mb-3 text-white border-0 py-2 px-3 mx-2" data-toggle="modal" data-target="#history"><span> History <i class="ti-arrow-right"></i></span></button>
                            </div>
                          <?php }else { ?>
                            <div class="col-lg-12">
                              <button type="submit" class="btn btn-danger-gradiant mt-3 text-white border-0 py-2 px-3" disabled><span> SUBMIT NOW <i class="ti-arrow-right"></i></span></button>
                              <small class="form-text text-muted">First login to Contct with Us.</small>
                            </div>
                          <?php } ?>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Message Modal -->
      <div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="adminReply">Admin Reply</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="messagebd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Reply Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contactreply` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }
                    echo '<script>document.getElementById("totalMessage").innerHTML = "' .$count. '";</script>';
                    if($count==0) {
                      ?><script> document.getElementById("messagebd").innerHTML = '<div class="my-1">you have not recieve any message.</div>';</script> <?php
                    }
                ?>
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>

      <!-- history Modal -->
      <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="history">Your Sent Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="bd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Order Id</th>
                        <th>Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contact` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $orderId = $row['orderId'];
                        $message = $row['message'];
                        $datetime = $row['time'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$orderId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }                
                    if($count==0) {
                      ?><script> document.getElementById("bd").innerHTML = '<div class="my-1">you have not contacted us.</div>';</script> <?php
                    }    
                ?>
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>







      <!-- Message Modal -->
      <div class="modal fade" id="adminReply" tabindex="-1" role="dialog" aria-labelledby="adminReply" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="adminReply">Admin Reply</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="messagebd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Reply Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contactreply` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $message = $row['message'];
                        $datetime = $row['datetime'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }
                    echo '<script>document.getElementById("totalMessage").innerHTML = "' .$count. '";</script>';
                    if($count==0) {
                      ?><script> document.getElementById("messagebd").innerHTML = '<div class="my-1">you have not recieve any message.</div>';</script> <?php
                    }
                ?>
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>

      <!-- history Modal -->
      <div class="modal fade" id="history" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(187 188 189);">
              <h5 class="modal-title" id="history">Your Sent Message</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="bd">
              <table class="table-striped table-bordered col-md-12 text-center">
                <thead style="background-color: rgb(111 202 203);">
                    <tr>
                        <th>Contact Id</th>
                        <th>Order Id</th>
                        <th>Message</th>
                        <th>datetime</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `contact` WHERE `userId`='$userId'"; 
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    while($row=mysqli_fetch_assoc($result)) {
                        $contactId = $row['contactId'];
                        $orderId = $row['orderId'];
                        $message = $row['message'];
                        $datetime = $row['time'];
                        $count++;
                        echo '<tr>
                                <td>' .$contactId. '</td>
                                <td>' .$orderId. '</td>
                                <td>' .$message. '</td>
                                <td>' .$datetime. '</td>
                              </tr>';
                    }                
                    if($count==0) {
                      ?><script> document.getElementById("bd").innerHTML = '<div class="my-1">you have not contacted us.</div>';</script> <?php
                    }    
                ?>
                </tbody>
		          </table>
            </div>
          </div>
        </div>
      </div>




  </main>

  <?php include 'partials/_footer.php';?> 


    <!-- CSS Style -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


  </body>
</html>
