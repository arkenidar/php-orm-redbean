<?php

require_once "../../lib/db.php";

header('Content-Type: text/plain');

if (isset($_REQUEST['movie_title']) && isset($_REQUEST['character_name'])) {
    $movie_title = $_REQUEST['movie_title'];
    $character_name = $_REQUEST['character_name'];

    $movie_bean = R::findOne('movie', 'title = ?', [$movie_title]);
    if ($movie_bean) {
        echo "Movie found\n";
        $character_bean = R::dispense('character');
        $character_bean->name = $character_name;
        $movie_bean->ownCharacterList[] = $character_bean;
        R::store($movie_bean);
        echo "Character added\n";
    } else {
        echo "Movie not found\n";
    }
} else {
    echo "Malformed request, invalid input\n";
}
