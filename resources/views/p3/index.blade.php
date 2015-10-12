@extends('layouts.master')

@section('content')
<div id = "lorem">
Generate Lorem Ipsum text for your layouts here!
<form action="lorem.php" method="post">
  Number of paragraphs (between 1 and 30):
   <input type="number" name="paragraphs" min="1" max="30"><br>
   <input type="submit" value="Get my text!">
</form>
</div>
<div id = "random">
Generate some random users here!
<form action="random.php" method="post">
  Number of users (between 1 and 30):
   <input type="number" name="users" min="1" max="30"><br>
   <input type="submit" value="Get some users!">
</form>
</div>
@stop
