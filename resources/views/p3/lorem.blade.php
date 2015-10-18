@extends('layouts.master')


@section('title')
    Lorem Ipsum Generator
@stop


@section('content')
Generate Lorem Ipsum text for your layouts here!
<form action="/lorem" method="post">
  <input type='hidden' name='_token' value='{{ csrf_token() }}'>
   Number of paragraphs (between 1 and 20):
   <input type="text" name="para"><br>
   <input type="submit" value="Get my text!">
</form>
<p>

@if ($_POST)
<?php
  echo implode('<p>', $paragraphs);
?>
@endif

@stop
