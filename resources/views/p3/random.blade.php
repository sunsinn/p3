@extends('layouts.master')


@section('title')
    Random User Generator
@stop

@section('content')
Generate some random users here!
<form action="/random" method="post">
  <input type='hidden' name='_token' value='{{ csrf_token() }}'>
   Number of users (between 1 and 30):
   <input type="number" name="users" min="1" max="30"><br>
   <input type="checkbox" name="mail" value="mail">
   Email
   <input type="checkbox" name="description" value="description">
   Description <br>
   <input type="submit" value="Get some users!">
</form>

@if ($_POST)
<?php
    for ($i=0; $i<count($users); $i++) {
      echo '<p>Name: '.$users[$i]['name'];
      if ($users[$i]['email']) {
          echo '<br>Email: '.$users[$i]['email'];
      }
      if ($users[$i]['desc']) {
          echo '<br>Description: '.$users[$i]['desc'];
      }
    }
?>
@endif

@stop
