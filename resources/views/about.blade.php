@extends('layouts.app')

@section('content')
<div class="container">
		@include('flash::message')
		<div class="row justify-content-center">
			<div class="col-10">
                <div class="card">
                    <div class="card-body">
            	
            <h2>InstaHub</h2>
            <p>InstaHub is a social network for educational purpose only. Students can create their own social network as a database admin. They learn basics about working in a software project, creating and managing a database, querying (SQL <code>SELECT</code>) and editing (SQL <code>INSERT</code>, <code>UPDATE</code> and <code>DELETE</code>).</p>
            <p>This project aims to help students develop a general technical understanding of social networks. As result, they will be able to discuss subjects as big data and information privacy.</p>
            <p>Read more (only in German): <a href='https://blog.wi-wissen.de/' target='_blank' >https://blog.wi-wissen.de/</a></p>
            
            <h3>Hosting</h3>
            <p>InstaHub ist hosted by <a href="https://wi-wissen.de/">wi-wissen.de</a></p>
            <!--<p>InstaHub ist hosted by <a href="https://www3.sachsen.schule/sbs/startseite/">Sächsischer Bildungsserver</a></p>-->

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
            <li><a href='https://github.com/orangehill/iseed'>orangehill/iseed</a></li>
            <li><a href='https://github.com/hisorange/browser-detect'>hisorange/browser-detect</a></li>
            </li>
            <li><a href='https://github.com/rap2hpoutre/laravel-log-viewer'>rap2hpoutre/laravel-log-viewer</a>
            </li>
            <li><a href='https://github.com/barryvdh/laravel-debugbar'>barryvdh/laravel-debugbar</a>
            </li>
            
            </ul>
            </li>
            <li><a href='http://bootstrap.com/'>Bootstrap 3</a>
            </li>
            <li><a href='https://jquery.com/'>jQuery</a> with <a href='https://github.com/jquery-backstretch/jquery-backstretch'>Backstretch</a>
            </li>
            <li>Photos by <a href='https://pixabay.com/'>pixabay</a> (CC0)
            </li>
            <li>Splash images by <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            <li>Face images by <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            <li>Fake Ad images based on <a href='https://unsplash.com/'>unsplash.com</a> (CC0)
            </li>
            
            </ul>

            <h3>Contributing</h3>
            <p>Thank you for considering contributing to the InstaHub! Source is available at <a href="https://github.com/wi-wissen/instahub">GitHub</a>.</p>

            <h3>Contributers</h3>
            <p>InstaHub used parts of <a href='https://github.com/itsshady101/Laragram'>Laragram</a> from <a href='https://github.com/itsshady101'>itsshady101</a> </p>

            <h3>License</h3>
            <p><a href='https://www.mozilla.org/en-US/MPL/2.0/'>Mozilla Public License (MPL)</a></p>

            </div>
        </div>
    
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    
</script>
