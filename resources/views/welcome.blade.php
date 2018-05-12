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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
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
    <div class="container">
    <div class="jumbotron home">
        <h1>{{env('APP_NAME')}}</h1>
        <p>Share the best moments with your friends!</p>

        <div id="btns">
            <a href="{{ url('/register') }}" class="btn btn-primary btn-xl">Sign Up</a>
            &nbsp;
            <a href="{{ url('/login') }}" class="btn btn-default btn-xl">Sign In</a>
        </div>
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
        var qu;
        var slogan;

        var random = function(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        };  
        qu = random(0, 6);
        
        switch(qu){
            case 1:
                $.backstretch("/img/bg/braden-barwich-188016.jpg", {transitionDuration: 500});
                break;
            case 2:
                $.backstretch("/img/bg/brooke-cagle-39570.jpg", {transitionDuration: 500});
                break;
            case 3:
                $.backstretch("/img/bg/david-200088.jpg", {transitionDuration: 500});
                break;
            case 4:
                $.backstretch("/img/bg/i-m-priscilla-228050.jpg", {transitionDuration: 500});
                break;
            case 5:
                $.backstretch("/img/bg/jordan-mcqueen-1290.jpg", {transitionDuration: 500});
                break;
            case 6:
                $.backstretch("/img/bg/matheus-ferrero-228716.jpg", {transitionDuration: 500});
                break;
            default:
                $.backstretch("/img/bg/ricky-kharawala-194239.jpg", {transitionDuration: 500});
        }
        
    </script>
</body>
</html>