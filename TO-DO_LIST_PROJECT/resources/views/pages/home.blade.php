<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
   <link rel="stylesheet" type="text/css" href="styles.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  

  <!-- Fonts -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


   
 </head>

<!--- home page -->
      <body style="background-color:
#25597F
;">
  <main class="main">
<div class="container">
  <div class="row gy-4">
    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
          <section id="hero" class="hero section dark-background">

    <h1>Welcome to Task Manager</h1>
    <p>Task Manager is your ultimate solution to manage and track your daily tasks efficiently. Keep your tasks organized, set priorities, and never miss a deadline again!</p>
    <div class="d-flex">
      <a href="{{ route('register') }}" class="button-link">
                <!-- get started button -->


                <button class="button" style="background-color: #FFA500;">Get started</button>
            </a>

      </div>

      <div class="d-flex">

            <!-- linking it to the login page -->
            <p>Already have an account? <a href="{{ route('login') }}" style="color: #ffb300;">Sign in</a></p>
       
      </div>

</div>

     
     <div class="col-lg-6 order-1 order-lg-2  d-flex flex-column justify-content-center hero-img aos-init aos-animate " data-aos="zoom-out" data-aos-delay="200">
           
      <img src="assets/task5.png" class="img-fluid animated" alt="">
    </div>


         </div>
         </main>
         <script src="assets/vendor/aos/aos.js"></script>


 </body>
</html>