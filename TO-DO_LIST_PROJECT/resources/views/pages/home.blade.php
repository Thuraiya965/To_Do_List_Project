<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <head>
   <link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body>
    <!-- to split the page into two sections -->
 <span class="border"></span>
    <div class="row">
        <div class="column";>
<!--- home page -->
        <img src="{{ asset('assets/home.png') }}" alt="Home Image" style="width: 100%; height: 100%; border-radius: 10px; ">   
         </div>
        <div class="column" style="background-color: white;">
        <div class="text">
            <h2>Productive mind</h2>
            <p>We are team of talented designers making websites with Bootstrap</p>
            <a href="{{ route('register') }}" class="button-link">
                <!-- get started button -->
                <button class="sqs-block-button-element--medium" style="background-color: #FDDA0D;">Get started</button>
            </a>
            <!-- linking it to the login page -->
            <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
        </div>
     </div>
 </body>
</html>