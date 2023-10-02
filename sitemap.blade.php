@extends('layouts.default-nav')
@section('title','Site map')
@section('content')
<div class="container">  
   <iframe  src="https://www.google.com/maps/?q=@foreach($site as  $map){{$map->address}} @endforeach&output=embed" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> 
</div>
@endsection