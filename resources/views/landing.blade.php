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
    <link rel="stylesheet" href="/css/landing.css">

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
    <header class="masthead">
      <div class="overlay">
        <div >
        <div style="text-align:right;">
            <a href="/login" style="color:white;">Teacher Login</a>
            <a href="/register" type="button" class="btn btn-default">Get Teacher Account</a>
            <a href="{{ url('/hubs/create') }}" type="button" class="btn btn-default">Create Hub</a>
        </div>
        </div>
          <h1>{{env('APP_NAME')}}</h1>
        </div>
    </header>

    <div class="container">
        @include('flash::message')
        <h1 >{{env('APP_NAME')}}</h1>
        <p>{{env('APP_NAME')}} ist ein soziales Netzwerk ähnlich Instagram, welches im Unterricht zu den Themen Informatik und Medien eingesetzt wird. 
        Es dient ausschließlich zu Lehrzwecken. Auch wenn es voll funktionsfähig ist, ist es nicht für den regulären Einsatz gedacht. </p>
        <p>Schüler sind in {{env('APP_NAME')}} nicht Nutzer, sondern selbst Administratoren. Sie haben so vollen Zugriff auf alle Funktionen des sozialen Netzwerks, die in echten Netzwerken verborgen sind. </p>
        <p>Der Vorgänger von {{env('APP_NAME')}} ist die <a href="https://blog.wi-wissen.de/post/friendzone">friendzone</a>. Diese wurde 2017 mit dem <a href="https://www.gi.de/aktuelles/meldungen/detailansicht/article/julian-dorn-erhaelt-unterrichtspreis-2017-der-gesellschaft-fuer-informatik-fuer-friendzone.html">Unterrichtspreis der Gesellschaft für Informatik</a> ausgezeichnet.</p> 
                        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="https://public{{env('SESSION_DOMAIN')}}">public{{env('SESSION_DOMAIN')}}</a></h3>
            </div>
            <div class="panel-body">
                Auf <a href="https://public{{env('SESSION_DOMAIN')}}">public{{env('SESSION_DOMAIN')}}</a> kannst du dir ohne Registrierung einen ersten Eindruck verschaffen. Beachte bitte, dass du zur Sicherheit keine Änderungen vornehmen darfst.
                <div class="row">
                    <div class="col-md-3">
                        <table>
                            <tr>
                                <td style="vertical-align: top;"><b>Admin</b></td>
                                <td>
                                    Benutzer: <br/>
                                    Passwort:
                                </td>
                                <td>
                                    <code>admin</code> <br/>
                                    <code>admin123</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <table>
                            <tr>
                                <td style="vertical-align: top;"><b>Mädchen</b></td>
                                <td>
                                    Benutzer: <br/>
                                    Passwort:
                                </td>
                                <td>
                                    <code>eva125</code> <br/>
                                    <code>eva125</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <table>
                            <tr>
                                <td style="vertical-align: top;"><b>Junge</b></td>
                                <td>
                                    Benutzer: <br/>
                                    Passwort:
                                </td>
                                <td>
                                    <code>adrian211</code> <br/>
                                    <code>adrian211</code>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3" style="text-align:right; padding-top:10px">
                    <a href="https://public{{env('SESSION_DOMAIN')}}" type="button" class="btn btn-primary">public{{env('SESSION_DOMAIN')}}</a>
                    </div>
                </div>
            </div>
        </div>

        <h2>Mehr Informationen</h2>
        <ul class="nav nav-pills nav-justified" id="myNavTabs">
            <li class="active"><a data-toggle="tab" href="#schueler">Schüler</a></li>
            <li><a data-toggle="tab" href="#informatik">Informatiklehrer</a></li>
            <li><a data-toggle="tab" href="#medien">Medienlehrer</a></li>
            <li><a data-toggle="tab" href="#eltern">Eltern</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="informatik">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/dba.png">
                        <img class="media-object" src="/img/screenshots/dba-small.jpg" alt="DBA">
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
                        <a href="https://wi-wissen.github.io/instahub-doc-de/#/" class="btn btn-primary pull-right">Dokumentation</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="medien">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/dba.png">
                        <img class="media-object" src="/img/screenshots/ad-small.jpg" alt="AD">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Liebe Kollegen,</h4>
                        <p>{{env('APP_NAME')}} bietet die Möglichkeit die technischen Möglichkeiten eines sozialen Netzwerks nicht nur zu erklären, sondern auch wirklich zu demonstrieren. 
                            Als Grundlage wird zumindest bei der Lehrkraft SQL-Kenntnisse vorausgesetzt. Es ist möglich ein vereinfachtes Nutzertracking zu beobachten und Werbung zielgruppenspezifisch zu schalten.</p>
                        <p>Die SchülerInnen können alle in einem gemeinsamen oder in einem eigenen soziales Netzwerk arbeiten. Selbstverständlich können Sie jederzeit steuernd korrigeren und helfen.</p>
                        <p>Der Bereich Medien wurde erst Oktober 2018 entwickelt Daher gibt es noch keine Unterrichtserfahrungen und es können noch leichte Überarbeitungen notwendig sein. Sie möchten {{env('APP_NAME')}} besser auf Ihren Untericht anpassen oder für alle weiterentwickeln?
                        <p>Ich freue mich auf Ihre Ideen! Den Quelltext finden Sie bei <a href="https://github.com/wi-wissen/instahub">GitHub</a>.</p>
                        <p>Die ersten Schritte zeige ich in diesem <a href="https://youtu.be/wCj3keNW-74">Video</a>.</p>
                        <br />
                        <a href="{{ url('/register') }}" class="btn btn-primary">Registrieren</a>
                        <a href="{{ url('/login') }}" class="btn btn-default">Anmelden</a>
                        <a href="https://wi-wissen.github.io/instahub-doc-de/#/" class="btn btn-primary pull-right">Dokumentation</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in active" id="schueler">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/sql.png">
                        <img class="media-object" src="/img/screenshots/profile-small.jpg" alt="Profil">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Liebe SchülerInnen,</h4>
                        <p>hier seid ihr der Chef! {{env('APP_NAME')}} erstellt für jeden einzelnen von euch sein eigenes soziales Netzwerk.</p>
                        <p>Mithilfe eines Lehrers könnt ihr euren {{env('APP_NAME')}} zum Leben erwecken. Ihr schaltet immer mehr Funktionen frei.</p>
                        <p>Hier ist nichts aus Pappe! Alles funktioniert. Aber nur, wenn ihr alles richtig macht. Lernt dazu mit eurem Lehrer wichtige Grundlagen über
                        Datenbanken, die Sprache SQL, Werbung, Tracking und erhaltet einen Einblick in Datenschutz  und -sicherheit.</p>
                        <p>Du hast Ideen, Kritik oder Lob? Ich freue mich auf dein <a href="https://wi-wissen.de/contact.php">Feedback</a>.</p>
                        <p><a href="{{ url('/hubs/create') }}" class="btn btn-primary">Erstelle deinen {{env('APP_NAME')}}</a></p>
                        <p>Du erreichst deinen {{env('APP_NAME')}} unter <b><a href="#"><i>hubname</i>{{env('SESSION_DOMAIN')}}</a></b></p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="eltern">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="/img/screenshots/sql.png">
                        <img class="media-object" src="/img/screenshots/profile-small.jpg" alt="Profil">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Liebe Eltern,</h4>
                        <p>Mit {{env('APP_NAME')}} lernen Ihre Kinder im Unterricht soziale Netzwerke fundiert aus technischer Sicht kennen. 
                            Nur durch dieses Wissen ist es möglich fundiert über gesellschaftliche, wirtschaftliche und persönliche AUswirkungen zu sprechen.</p>
                        <p>Eine Nutzung ist nur mit einem Lehrer möglich. Dieser kann auch jederzeit steuernt eingreifen. </p>
                        <p>Sollten Sie Fragen haben wenden Sie sich bitte an den Lehrer ihres Kindes oder bei der 
                            Bitte um Löschung oder Abschaltung einzelner Hubs an den <a href="https://wi-wissen.de/contact.php">Betreiber</a>.</p>
                    </div>
                </div>
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
   <script src="/js/bootstrap.min.js"></script>
   <script>
    $('#myNavTabs a').click(function (evt) {
        evt.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        //new tab
        console.log(e.target);
        
        //previous tab
        console.log(e.relatedTarget);
    })
   </script>
</body>
</html>