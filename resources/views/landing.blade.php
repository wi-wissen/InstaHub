@extends('layouts.base')

@section('css')
<style>
h1{
  font-family: 'Satisfy';
    margin-top: 0px;
    margin-bottom: 0px;
}

h2{
  font-family: 'Satisfy';
  margin-bottom: 0.7em;
  font-size: 1em;
  color: gray;    
}

@media (min-width: 768px) {
.jumbotron {
    padding-top: 8rem;
    padding-bottom: 8rem;
}
}
.jumbotron {
    padding-top: 4rem;
    padding-bottom: 4rem;
    background-color: #fff;
}

.jumbotron-heading {
    font-size: 3.25rem;
}

.lead-small {
    font-size: 1.05rem;
}

td {
    padding: 0 5px;
}
</style>
@endsection

@section('website')
<div id="landing">
<nav class="navbar navbar-expand-sm navbar-light bg-light main-nav sticky-top" style="background-color: #fff;">
    <a v-on:click="active=''" class="navbar-brand w-50" href="#">
        <img src="/clarity/camera-line.svg" width="30" height="30" class="d-inline-block align-middle" alt="">
        &nbsp;
        <div>InstaHub</div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <!-- empty -->
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="{{ env('DOC_URL') }}">{{ __('Documentation') }}</a>
            </li>
            <a href="{{ config('app.url_admin') }}/hubs/create" target="_blank" class="btn btn-success ml-2">{{ __('Create Hub') }}</a>
        </ul>
    </div>
</nav>

<div class="container">

    @if ($errors->has('username'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('username') }}
        </div>
    @endif

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">InstaHub</h1>
            <p class="lead text-muted">
                {{ __('messages.instahub') }}
            </p>
            <p class="lead text-muted">
                {!! __('messages.competitions') !!}
            </p>
            <p>
            <a href="{{ config('app.url_admin') }}" target="_blank" class="btn btn-primary my-2">{{ __('Teacher') }}</a>
            <a v-on:click="showHubUrlPattern = !showHubUrlPattern" href="#" class="btn btn-primary my-2 mx-2">{{ __('Student') }}</a>
            <a href="{{ str_replace('{subdomain}', 'public', config('app.url_hub')) }}" target="_blank" class="btn btn-secondary my-2">{{ __('Guest') }}</a>
            </p>

            <div class="row justify-content-center" :class="{'d-none': !showHubUrlPattern}">
                <div class="col-md-10">
                    <div class="alert alert-info alert-important" role="alert" style="text-align:center;">{!! __('messages.hubdomain') !!}</div>
                </div>
            </div>

        </div>
    </section>
    <section class="features-icons bg-light text-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                    <i class="icon-layers m-auto text-primary"><img src="/clarity/users-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
                </div>
                <h3>{{ __('Data Protection') }}</h3>
                <p class="lead  lead-small mb-0">{{ __('messages.privacy') }}</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                  <i class="icon-layers m-auto text-primary"><img src="/clarity/storage-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
                </div>
                <h3>{{ __('Database') }}</h3>
                <p class="lead  lead-small mb-0">{{ __('messages.database') }}</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                <div class="features-icons-icon d-flex">
                    <i class="icon-layers m-auto text-primary"><img src="/clarity/savings-line.svg" width="90px" height="90px" class="d-inline-block align-middle" alt=""></i>
                </div>
                <h3>{{ __('Open') }}</h3>
                <p class="lead lead-small mb-0">{{ __('messages.openfree') }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>

    @include('layouts.footer')

</div>
@endsection
