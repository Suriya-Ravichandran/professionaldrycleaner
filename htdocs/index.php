<?php
session_start();
 include 'libs/template.class.php';

 $template = new template();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $template->load_template('template','head');?>
</head>
<body>

  <!-- chat icon end -->
  <?php $template->load_template('template','icon-button');?>
  <!-- <div class="back-to-top"></div> -->
  <!-- chat icon end -->

  <!-- header start -->
  <?php $template->load_template('template','header');?>
  <!-- header end -->

  <!-- ordering and qucik delivery  start-->
  <?php $template->load_template('template','ordering-and-delivery');?>
  <!-- ordering and qucik delivery  end -->


<!-- How We work Start-->
<?php $template->load_template('template','how-we-work');?>

<!-- How We work end-->

  <!-- cout-down-start-->
  <?php $template->load_template('template','cout-down');?>
 <!-- cout-down-start-->

  <!-- our service start -->
  <?php $template->load_template('template','our-service');?>
  <!-- our service end -->

  <!-- why choose start -->
  <?php $template->load_template('template','why-choose');?>

   <!-- why choose end -->

   <!-- google review -->
   <?php $template->load_template('template','google-review');?>

    <!-- google review -->

  <!-- contact us start -->
  <?php $template->load_template('template','contact');?>
 <!-- contact us end  -->

 <!-- footer start -->
 <?php $template->load_template('template','footer');?>
 <!-- footer end -->

<script src="assets/js/jquery-3.5.1.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/google-maps.js"></script>

<script src="assets/vendor/wow/wow.min.js"></script>

<script src="assets/js/theme.js"></script>
<script src="assets/js/coutdown.js"></script>
<script src="assets/js/active.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <!-- alert message -->
 <script>
    var messageText = "<?php echo $_SESSION['Status'] ?? ''; ?>";
    if (messageText !== '') {
        Swal.fire({
            title: "Thank You",
            text: messageText,
            icon: "success"
        });
      <?php unset($_SESSION['Status']); ?>;
    }
  </script>
  
</body>
</html>