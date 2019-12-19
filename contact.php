<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'inc/head.php';?>
  <title>Krushnai Resort - Contact</title>
  <?php
        $linum = 5;
     ?>
</head>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php include 'inc/navbar.php'; ?>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Breadcumb Area Start ##### -->
  <section class="breadcumb-area-contact bg-img d-flex align-items-center justify-content-center" style="background-image: url(img/krushnai/contact1-banner.jpg);">
    <div class="bradcumbContent">
      <h2>Contact</h2>
    </div>
  </section>


        <section class="light_section" style="padding-top: 1rem;">
          <div class="container">
            <div class="row">
              <div class="col-md-2 text-left"></div>
             
              <div class="col-md-4 text-center margin_top_half">
                <div class="icon_block">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <!-- <i class="icon icon-Phone2"></i> -->
                  <h4>TELEPHONE</h4>
                  <p><br>
                    We are happy to answer your questions or give you directions via phone.
                    <br>
                   <b> 083800 96375 / 8380004198</b>
                  </p>
                </div>
              </div>
              <div class="col-md-4 text-center margin_top_half ">
                <div class="icon_block">
                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <!-- <i class="icon icon-Keyboard"></i> -->
                  <h4>E-mail</h4>
                  <p><br>
                    If you are on the go and still want to ask a question, simply drop us an e-mail. <br>
                    <b>krushnairesort@gmail.com</b>
                  </p>
                </div>
              </div>
               <div class="col-md-2 text-left "></div>

            </div>
            <div class="row mt-3">
              <div class="col-md-12 col-md-offset-2 text-center margin_top margin_bottom_half">
                <div class="text_block">
                  <b><h3 style="padding-top: 1.5rem; font-family: Playfair Display;">KRUSHNAI RESORT LOCATION</h3></b>
                  <p class="text-center" style="padding-bottom: 1rem;">Krushnai Resort is located in the heart of Lonavala. Come visit us and enjoy the beautiful nature of Lonavala and make your family or buisness time a once in a lifetime moment.<br>
                  <a href="https://www.google.com/maps/place/Imperial+Grande/@18.7599648,73.4030509,17z/data=!3m1!4b1!4m5!3m4!1s0x3be8011b5a2a5507:0x493fd47fce927290!8m2!3d18.7599597!4d73.4052396" class="btn btn-link">GET DIRECTIONS</a></p>
                </div>
              </div>
              <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3778.007769531098!2d73.4020873149102!3d18.75318998727393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be801106909869b%3A0x53e64c9492bf8845!2sKrushnai+Resort!5e0!3m2!1sen!2sin!4v1561100009949!5m2!1sen!2sin" width="600" height="450" frameborder="0"style="border:0;width: 100%"  allowfullscreen></iframe>

              </div>

            </div>
          </div>
        </section>
        <section class="white_section" style="padding-top: 4rem;">
          <div class="container">
            <div class="col-md-12 text-center">
              <div class="section_header minimal">
                <h1 style="color: #b58a60;">CONTACT FORM</h1>
                <p>You can still contact us, right here - right now. Use this contact form to send an e-mail. Usually we respond in 1 bussiness day.</p><img src="img/core-img/decoration-1.png" width="20%" style="padding-bottom: 2rem;">
              </div>
            </div>
             <center>
            <div class="col-md-8 col-md-offset-2">
              <div class="contact-quick">
                <div class="screen-reader-response"></div>

                <form id="contact_form" name="contact_form" action="#" method="post" novalidate="novalidate"><span class="your-name">
                    <input type="text" name="name" aria-required="true" aria-invalid="false" placeholder="NAME" class="name form-control"></span><span class="your-phone">
                    <input type="text" name="phone" aria-required="true" aria-invalid="false" placeholder="PHONE" class="phone form-control"></span><span class="your-email">
                    <input type="email" name="email" aria-required="true" aria-invalid="false" placeholder="E-MAIL" class="email form-control"></span><span class="your-subject">
                    <input type="text" name="subject" aria-required="true" aria-invalid="false" placeholder="SUBJECT" class="subject form-control"></span><span class="your-message">
                    <textarea name="message" cols="40" rows="4" aria-invalid="false" placeholder="MESSAGE" class="message form-control"></textarea></span>
                  <button type="submit" name="submit" class="submit_btn btn btn-primary">SUBMIT</button><br><br>

                  <!-- <div class="notice btn btn-metro alert alert-warning alert-dismissable hidden"></div> -->
                  <!-- <img src="img/krushnai/ajax-loader.html" alt="Sending ..." class="ajax-loader not_visible"> -->
                </form>

              </div>
            </div>
              </center>
          </div>
        </section>
      
      </div>
      <br>
  <br>  <!-- ##### Footer Area Start ##### -->
  <?php include 'inc/footer.php'; ?>
  <!-- ##### Footer Area End ##### -->

  <!-- ##### All Javascript Script ##### -->
  <!-- jQuery-2.2.4 js -->
  <script src="js/jquery/jquery-2.2.4.min.js"></script>
  <!-- Popper js -->
  <script src="js/bootstrap/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!-- All Plugins js -->
  <script src="js/plugins/plugins.js"></script>
  <!-- Active js -->
  <script src="js/active.js"></script>
  <?php include 'inc/script.php'; ?>

</body>

</html>
