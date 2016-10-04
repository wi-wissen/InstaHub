<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to laragram.</title>
    <style>
        body {
            margin: 0 !important;
        }
    </style>
    <link rel="stylesheet" href="/css/homepage.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div class="homepage-hero-module">
        <div class="video-container">
            <div class="filter"></div>
            <video autoplay loop class="fillWidth">
                <source src="/img/Let-It-Grow.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
                <source src="/img/Let-It-Grow.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
            </video>
            <div class="poster hidden">
                <img src="PATH_TO_JPEG" alt="">
            </div>
        </div>
        <div class="main">
            <h1>Laragram</h1>
            <p>Share the best moments with best people.. Blah Blah..</p>

            <div id="btns">
                <a href="{{ url('/resigter') }}" class="cta">Sign Up</a>
                <a href="{{ url('/login') }}" class="cta cta-sec">Sign In</a>
            </div>

        </div>
    </div>
   <script src="/js/jquery-3.1.1.min.js"></script>
   <script src="/js/homepage.js"></script>

</body>
</html>