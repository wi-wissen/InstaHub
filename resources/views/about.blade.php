@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            	
            <h2>InstaHub</h2>
            <p>InstaHub is a social network for educational purpose only. Students can create their own social network as a database admin. They learn basics about working in a software project, creating and managing a database, querying (SQL SELECT) and editing (SQL INSERT, UPDATE and DELETE).</p>
            <p>This project aims to help students develop a general technical understanding of social networks. As result, they will be able to discuss sinjects as big data and information privacy.</p>
            <p>Read more (only in German): <a href='https://blog.wi-wissen.de/' target='_blank' >https://blog.wi-wissen.de/</a></p>
            
            <h3>Hosting</h3>
            <p>InstaHub ist hosted by <a href="https://www3.sachsen.schule/sbs/startseite/">Sächsischer Bildungsserver</a></p>

            <h3>Standing on the shoulders of giants</h3>
            <p>Many thanks and respect to:</p>
            <ul>
            <li><a href='https://www.mysql.com/'>MySQL</a>
            </li>
            <li><a href='http://php.net/'>php</a>
            </li>
            <li><a href='https://laravel.com/'>Laravel</a>
            <ul>
            <li><a href='https://github.com/laracasts/flash'>laracasts/flash</a>
            <ul>
            <li><a href='https://github.com/orangehill/iseed'>orangehill/iseed</a></li>
            <li><a href='https://github.com/graham-campbell/exceptions'>graham-campbell/exceptions</a></li>
            
            </ul>
            </li>
            <li><a href='https://github.com/rap2hpoutre/laravel-log-viewer'>rap2hpoutre/laravel-log-viewer</a>
            </li>
            <li><a href='https://github.com/barryvdh/laravel-debugbar'>barryvdh/laravel-debugbar</a>
            </li>
            
            </ul>
            </li>
            <li><a href='http://bootstrap.com/'>Bootstrap</a>
            </li>
            <li><a href='https://jquery.com/'>jQuery</a> with <a href='https://github.com/jquery-backstretch/jquery-backstretch'>Backstretch</a>
            </li>
            <li>Photos by <a href='https://pixabay.com/'>pixabay</a> (CC0)
            </li>
            <li>Splash images by <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            <li>Face images by <a href='https://www.flickr.com/photos/gregpc/'>Greg Peverill-Conti</a> (CC BY-NC-SA 2.0)
            </li>
            
            </ul>

            <h3>Contributing</h3>
            <p>Thank you for considering contributing to the InstaHub! Source is available at <a href="https://github.com/wi-wissen/instahub">GitHub</a>.</p>

            <h3>Contributers</h3>
            <p>InstaHub used parts of <a href='https://github.com/itsshady101/Laragram'>Laragram</a> from <a href='https://github.com/itsshady101'>itsshady101</a> </p>

            <h3>License</h3>
            <p><a href='https://creativecommons.org/licenses/by-nc-sa/4.0/'>Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)</a></p>
            <p>Commits up to <a href='https://github.com/wi-wissen/InstaHub/commit/9c21886f1a578bd991fa4ad5d02c2d7033413a34'>9c21886</a> are licenced under MIT License. </p>
            <p>Contact <a href='https://wi-wissen.de/contact.php'>me</a> if you need an other licence. </p>

            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
