<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Badcow;
use Faker;
use RunMyBusiness\Initialcon\Initialcon;

class DevController extends Controller

{
	public function getIndex()
	{
		return view('p3.index');
	}

	public function getLorem()
	{
		return view('p3.lorem');
	}

	public function postLorem(Request $request)
	{
		$this->validate($request, ['para' => 'required|numeric|min:1|max:20', ]);
		$n = $request->input('para');
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($n);
		return view('p3.lorem')->with('paragraphs', $paragraphs);
	}

	public function getRandom()
	{
		return view('p3.random');
	}

	public function postRandom(Request $request)
	{
		$this->validate($request, ['users' => 'required|numeric|min:1|max:30', ]);
		$n = $request->input('users');
		$faker = Faker\Factory::create();
		$users = array();
		for ($i = 0; $i < $n; $i++) {
			$name = $faker->name;
			$users[$i]['name'] = $name;

      # if the "email" box is checked
			if ($request->input('mail')) {
				$email = $faker->email;
				$users[$i]['email'] = $email;
			}

      # if the "description" box is checked
			if ($request->input('description')) {
				$desc = $faker->sentence($nbWords = 10);
				$users[$i]['desc'] = $desc;
			}

			#if the "picture" box is checked
			if ($request->input('picture')) {

				#turns current name into initials
				$namearray = explode(" ", $users[$i]['name'], 2);
				$init = "";
				foreach ($namearray as $m) {
					$init .= $m[0];
				}

				#generates uri for initialcon
				$initialcon = new Initialcon();
				$imageDataUri = $initialcon->getImageDataUri($init, $users[$i]['name']);
				$users[$i]['image'] = $imageDataUri;
			}
		}

		return view('p3.random')->with('users', $users);
	}

	#Turns the name in String $s into initials
	public function initials (String $s) {
     $namearray = explode(" ", "$s");
		 $return = "";

		 foreach ($namearray as $n) {
			  $return .= $n[0];
		 }

		 return $return;
	}

	public function getPassword()
	{
		return view('p3.password');
	}

	public function postPassword(Request $request)
	{
		$file = fopen("files/4000-most-common-english-words-csv.csv", "r");
		while (!feof($file)) {
			$words[] = fgetcsv($file, 1000, ",");
		}

		fclose($file);

		// Builds an array of special characters

		$chars = array(
			'!',
			'@',
			'#',
			'$',
			'%',
			'^',
			'&',
			'*',
			'(',
			')'
		);

		// adds first random word to password string

		$passphrase = $words[rand(0, 3999) ][0];

		// adds remaining random words to password string

		if (empty($_POST["wordsnum"])) {
			$numwords = 4;
		}
		else {
			$numwords = $_POST["wordsnum"];
		}

		if (empty($_POST["separator"]) || $_POST["separator"] == "hyphen") {
			for ($i = 1; $i < $numwords; $i++) {
				$passphrase.= "-" . $words[rand(0, 3999) ][0];
			}
		}
		elseif ($_POST["separator"] == "space") {
			for ($i = 1; $i < $numwords; $i++) {
				$passphrase.= " " . $words[rand(0, 3999) ][0];
			}
		}
		else {
			for ($i = 1; $i < $numwords; $i++) {
				$passphrase.= ucfirst($words[rand(0, 3999) ][0]);
			}
		}

		// appends a random number if the number box is checked

		if (!empty($_POST["number"])) {
			$passphrase.= rand(1, 99);
		}

		// appends a random character from the chars array if the character box is checked

		if (!empty($_POST["symbol"])) {
			$passphrase.= $chars[rand(0, 9) ];
		}

		// capitalizes first letter if the capital box is checked

		if (!empty($_POST["capital"])) {
			$passphrase = ucfirst($passphrase);
		}

    return view('p3.password')->with('passphrase', $passphrase);
	}
}

?>
