@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Welcome {{ Auth::user()->fname }} {{ Auth::user()->lname }}
        </div>
        Last Login was - {{ Auth::user()->last_login_at->format('l jS \\of F Y h:i:s A') }}
    </div>
</div>
@endsection
