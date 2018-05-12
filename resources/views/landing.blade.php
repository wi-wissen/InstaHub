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
    <link rel="stylesheet" href="/css/landing.css">
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
    <header class="masthead">
      <div class="overlay">
        <div class="container">
          <h1>{{env('APP_NAME')}}</h1>
          <p>Create your own social network and master computer science!</p>
        </div>
      </div>
    </header>

    <div class="container">
	@include('flash::message')
            <div class="col-md-10 col-md-offset-1">
            <ul class="media-list">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/profile.png">
                        <img class="media-object" src="/img/screenshots/profile-small.png" alt="userprofile">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{env('APP_NAME')}}</h4>
                        <p>{{env('APP_NAME')}} ist ein soziales Netzwerk, welches im Informatikunterricht eingesetzt wird. 
                        Es dient ausschließlich zu Lehrzwecken. Auch wenn es voll funktionsfähig ist, ist es nicht für den regulären Einsatz gedacht. </p>
                        <p>Schüler sind in {{env('APP_NAME')}} nicht Nutzer, sondern selbst Datenbankadministratoren. So erstellt jeder Schüler nach und nach die Datenbank für sein eigenes soziales Netzwerk. Mit jeder neuen Tabelle wachsen auch die Möglichkeiten im Webbrowser um etwa Photos zu posten oder anderen Mitgliedern zu folgen. </p>
                        <p>Der Vorgänger von {{env('APP_NAME')}} ist die <a href="https://blog.wi-wissen.de/post/friendzone">friendzone</a>. Diese wurde 2017 mit dem <a href="https://www.gi.de/aktuelles/meldungen/detailansicht/article/julian-dorn-erhaelt-unterrichtspreis-2017-der-gesellschaft-fuer-informatik-fuer-friendzone.html">Unterrichtspreis der Gesellschaft für Informatik</a> ausgezeichnet.</p> 
                    </div>
                </div>
                
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/sql.png">
                        <img class="media-object" src="/img/screenshots/sql-small.png" alt="SQL">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Liebe SchülerInnen,</h4>
                        <p>hier seid ihr der Chef! {{env('APP_NAME')}} erstellt für jeden einzelnen von euch sein eigenes soziales Netzwerk.
                        <p>Mithilfe eines Lehrers könnt ihr euren {{env('APP_NAME')}} zum Leben erwecken. Ihr schaltet immer mehr Funktionen frei.</p>
                        <p>Hier ist nichts aus Pappe! Alles funktioniert. Aber nur, wenn ihr alles richtig macht. Lernt dazu mit eurem Lehrer wichtige Grundlagen über
                        Datenbanken, die Sprache SQL und erhaltet einen Einblick in Datenschutz  und -sicherheit.</p>
                        <p>Du hast Ideen, Kritik oder Lob? Ich freue mich auf dein <a href="https://wi-wissen.de/contact.php">Feedback</a>.</p>

                        <p><a href="{{ url('/hubs/create') }}" class="btn btn-primary">Erstelle deinen {{env('APP_NAME')}}</a><br />
                        Du erreichst deinen {{env('APP_NAME')}} unter <b><a href="#"><i>hubname</i>{{env('SESSION_DOMAIN')}}</a></b></p>
                    </div>
                </div>

                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/dba.png">
                        <img class="media-object" src="/img/screenshots/dba-small.png" alt="DBA">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Liebe Kollegen,</h4>
                        <p>{{env('APP_NAME')}} bietet einen motivierenden Rahmen, um den SchülerInnen das Themengebiet Datenbanken mit der Sprache SQL zu erläutern. Daneben bietet es Motivation für Grundlagen von Drei-Schichten-Architektur im Internet, Datenbanken, Datensicherheit und Big Data.</p>
                        <p>Die SchülerInnen erschaffen dabei ihr eigenes soziales Netzwerk. Selbstverständlich können Sie jederzeit steuernd korrigeren und helfen.</p>
                        <p>Sie erhalten von mir eine vollständige Umgebung zum direkten Durchstarten. Aufgabenblätter und Präsentationen sind ebenfalls verfügbar. Sie möchten {{env('APP_NAME')}} besser auf Ihren Untericht anpassen oder für alle weiterentwickeln?
                        <p>Ich freue mich auf Ihre Ideen! Den Quelltext finden Sie bei <a href="https://github.com/wi-wissen/instahub">GitHub</a>. Unterrichtsmaterial erhalten Sie in bearbeitbarer Form.</p>
                        <p>Der Vorgänger von {{env('APP_NAME')}} ist die <a href="https://blog.wi-wissen.de/post/friendzone">friendzone</a>. Diese wurde 2017 mit dem <a href="https://www.gi.de/aktuelles/meldungen/detailansicht/article/julian-dorn-erhaelt-unterrichtspreis-2017-der-gesellschaft-fuer-informatik-fuer-friendzone.html">Unterrichtspreis der Gesellschaft für Informatik</a> ausgezeichnet.</p>  
                        <p>Die ersten Schritte zeige ich in diesem <a href="https://youtu.be/wCj3keNW-74">Video</a>.</p>
                        <br />
                        <a href="{{ url('/register') }}" class="btn btn-primary">Registrieren</a>
                        <a href="{{ url('/login') }}" class="btn btn-default">Anmelden</a>
                    </div>
                </div>
        </ul>
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
</body>
</html>