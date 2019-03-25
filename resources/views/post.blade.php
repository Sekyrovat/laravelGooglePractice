{{-- Entonces aqui estamos extendiendo todo app.blade.php --}}
@extends('layouts.app')

{{-- Debemos poner como nombre de la section el nombre que pusimos en el yield --}}
@section('content')
    
    <h1>You are currently in the content page</h1>

    <div class="content">
        <!--Tener los dos pares de brackets se traduce a un echo de php -->
        <!-- Estos son parte del blade tenmplating engine de php -->
        <h1>Post {{$id}}</h1>
        <h2>New {{$new}}</h2>
        <h2>Old {{$old}}</h2>
    </div>
{{-- Para terminarlo debemos decir @endsection o @stop --}}
@stop

@section('footer')
    <script type="text/javascript">alert('Hi, im the footer provided by the section of post')</script>
@stop