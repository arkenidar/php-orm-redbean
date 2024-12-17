<?php

require_once '../lib/rb-sqlite.php';
R::setup('sqlite:../data/dbfile.db');

$movie_data = [
    ['Star Wars', ['Yoda', 'Skywalker', 'Bacca']],
    ['Blues Brothers', ['Joliet Jake', 'Elwood']],
    ['Indiana Jones', ['Indy', 'Short Round', 'Willie']],
];

R::nuke(); // or not

if (true) { // or false

    foreach ($movie_data as $entry) {
        $movie = R::dispense('movie');
        $movie->title = $entry[0];

        foreach ($entry[1] as $name) {
            $character = R::dispense('character');
            $character->name = $name;
            $movie->ownCharacterList[] = $character;
        }
        $movie_id = R::store($movie);
    } // foreach
} // if

$movies = R::find('movie', 'true');

echo "<pre>\n";

foreach ($movies as $imovie) {
    echo '--' . $imovie->title . "\n";
    foreach ($imovie->ownCharacterList as $icharacter) {
        echo $icharacter->name . "\n";
    }
}

echo "</pre>\n";
