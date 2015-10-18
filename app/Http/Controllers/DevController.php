<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Badcow;
use Faker;

class DevController extends Controller {


  public function getIndex() {
      return view('p3.index');
  }

  public function getLorem() {
      return view('p3.lorem');
  }

  public function postLorem(Request $request) {
      $this->validate($request, [
        'para' => 'required|numeric|min:1|max:20',
      ]);
      $n = $request->input('para');
      $generator = new Badcow\LoremIpsum\Generator();
      $paragraphs = $generator->getParagraphs($n);
      return view('p3.lorem')->with('paragraphs', $paragraphs);
  }

  public function getRandom() {
      return view('p3.random');
  }

  public function postRandom(Request $request) {
      $n = $request->input('users');
      $faker = Faker\Factory::create();
      $users = array();
      for ($i=0; $i < $n; $i++) {
         $name = $faker->name;
         $users[$i]['name'] = $name;
         if ($request->input('mail')) {
            $email = $faker->email;
            $users[$i]['email'] = $email;
         }
         if ($request->input('description')) {
            $desc = $faker->sentence($nbWords = 10);
            $users[$i]['desc'] = $desc;
         }
      }
      return view('p3.random')->with('users', $users);
    }


}


?>
