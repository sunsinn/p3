@extends('layouts.master')


@section('title')
    Random User Generator
@stop

@section('content')

<form action="/random" method="post" class="form-horizontal">
  <fieldset>
      <legend>Generate some random users here!</legend>
        <div>
          <input type='hidden' name='_token' value='{{ csrf_token() }}'>
          Number of users (between 1 and 30):
          <input type="text" name="users"><br>
          <input type="checkbox" name="mail" value="mail">
          Email
          <input type="checkbox" name="description" value="description">
          Description
          <input type="checkbox" name="picture" value="picture">
          User Pic
        </div>
        <input type="submit" value="Get some users!">
   </fieldset>
</form>
<br>


@if ($_POST)
<?php

    echo count($users);
    for ($i=0; $i<count($users); $i++) {

      echo '<div class="panel panel-success"><div class="panel-heading">';
      if (!empty($users[$i]['image'])) {
        echo '<img src="'.$users[$i]['image'].'" alt="bar Initialcon" />';
      }
      echo '<h3 class="panel-title">Name: '.$users[$i]['name'].'</h3></div>';
      if (!empty($users[$i]['email'])) {
          echo '<br>Email: '.$users[$i]['email'];
      }
      if (!empty($users[$i]['desc'])) {
          echo '<br>Description: '.$users[$i]['desc'];
      }
      echo '</div>';
    }
?>
@endif
</div>
@stop
