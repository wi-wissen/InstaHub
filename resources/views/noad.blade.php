<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{env('APP_NAME')}}</title>
    <style>
        body {
            margin: 0 !important;
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/css/homepage.css">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div class="container">
    <div class="jumbotron home">
        <p>Sorry, but you missed this great opportunity!</p>
    </div>
    </div>

    <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-6 hidden-xs">
                <p class="text-muted">(c) {{env('APP_COPYRIGHT')}}</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="text-muted"><a href="/about">About</a> - <a href="https://wi-wissen.de/contact.php">Contact</a> - <a href="https://wi-wissen.de/agb.html">AGB</a> - <a href="https://wi-wissen.de/datenschutz.html">Privacy</a> - <a href="https://wi-wissen.de/impressum.html">Impress</a></p>
            </div>
        </div>  
       </div>
    </footer>

   <script src="/js/jquery-3.1.1.min.js"></script>

   <script src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/img/bg/freestocks-org-187367-unsplash.jpg", {transitionDuration: 500});
    </script>
</body>
</html>