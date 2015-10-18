@extends('layouts.master')


@section('title')
    XKCD-Style Password Generator
@stop


@section('content')

<div id="form">
  <form method="POST" action="/password">
    <fieldset>
      <legend> XKCD-Style Password Generator </legend>
        <input type='hidden' name='_token' value='{{ csrf_token() }}'>
        Number of words:<select name="wordsnum">
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
        </select><br>
      Type of word separation: <input type="radio" name="separator" value="hyphen" checked>Hyphen
        <input type="radio" name="separator" value="space">Space
        <input type="radio" name="separator" value="camel">CamelCase<br>
      Include number: <input type="checkbox" name="number" value="yes"><br>
      Include symbol: <input type="checkbox" name="symbol" value="yes"><br>
      Include capital: <input type="checkbox" name="capital" value="yes"><br>

      <input type="submit" value="Give me a password!">
    </form>
  </div><br><br>

  @if ($_POST)
  <div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Your Secure Password</h3>
    </div>
    <div class="panel-body">
      <?php echo $passphrase ?>
    </div>
  </div>
  <br>
  @endif

  <div>
    Inspired by <a href = "http://xkcd.com/936/">Randall Munroe's XKCD</a><br>
    <img src = "/img/password_strength.png" alt="XKCD comic"/><br>
    Word list from <a href = "http://www.rupert.id.au/resources/1000-words.php">http://www.rupert.id.au/resources/1000-words.php</a>
  </div>

@stop
