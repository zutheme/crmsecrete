@extends('admin.general')
@section('other_styles')
    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/production/css/custom.css?v=0.1.3') }}" rel="stylesheet">  
@stop
@section('content')

   <div class="col-md-12 col-sm-12 col-xs-12 text-center">

        <div>

        <h5>Login success</h5>

        </div>

</div>
@stop
@section('other_scripts')
    <script src="{{ asset('gentelella/build/js/custom.js') }}"></script>
   
@stop