@extends('layouts.master')


@section('title')
    Lorem Ipsum Generator
@stop


@section('content')
Generate Lorem Ipsum text for your layouts here!
<form action="/lorem" method="post" class="form-horizontal">
  <fieldset>
    <legend>Generate Lorem Ipsum text for your layouts here!</legend>
    <div>
      <input type='hidden' name='_token' value='{{ csrf_token() }}'>
      Number of paragraphs (between 1 and 20):
      <input type="text" name="paragraphs"><br>
    </div>
    <input type="submit" value="Get my text!">
 </fieldset>
</form>
<br>

@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if ($_POST)
<?php
  echo implode('<p>', $paragraphs);
?>
@endif

@stop
