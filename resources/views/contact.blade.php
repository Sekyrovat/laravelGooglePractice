{{-- Entonces aqui estamos extendiendo todo app.blade.php --}}
@extends('layouts.app')


@section('footer')
    <script type="text/javascript">alert('Does organization matter? Ohh btw. Hi, im the footer provided by the section of contact.')</script>
    {{-- No it doesn't --}}
    {{-- Mientras tu layout tenga el orden adecuado las secciones que elabores --}}
    {{-- aqui reemplzaran donde se esta haciendo el yield correspondiente. --}}
    {{-- Aunado a eso, puedes ignorar secciones si no son necesarias o no corresponden. --}}
@stop

{{-- Debemos poner como nombre de la section el nombre que pusimos en el yield --}}
@section('content')
    
    <h1>Contact page</h1>

    @if(count($people))
    	@foreach($people as $person)
    		<li>{{$person}}</li>
    	@endforeach
    @endif

{{-- Para terminarlo debemos decir @endsection o @stop --}}
@stop