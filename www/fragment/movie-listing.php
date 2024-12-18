<?php

require_once "../../lib/db.php";

$movies = R::find('movie', 'true');

echo "<pre>\n";

foreach ($movies as $imovie) {
    echo '--' . $imovie->title . "\n";
    foreach ($imovie->ownCharacterList as $icharacter) {
        echo $icharacter->name . "\n";
    }
}

echo "</pre>\n";
