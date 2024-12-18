<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Listing, Add Character</title>
</head>

<body>
    <div id="movie-listing"></div>

    <form id="add_character" method="post" action="../api/add-character.php">
        <input type="text" name="movie_title" placeholder="Title" required>
        <input type="text" name="character_name" placeholder="Character" required>
        <input type="submit" name="add_character" value="add character">
    </form>

    <script src="../js/utils.js"></script>
    <script>
        function loadFragmentMovieListing() {
            loadFragmentInto('../fragment/movie-listing.php', 'div#movie-listing');
        }

        loadFragmentMovieListing();

        $sel('form#add_character').onsubmit = onSubmit(() => loadFragmentMovieListing());
    </script>
</body>

</html>