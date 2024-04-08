<?php
session_start(); 

if(isset($_SESSION['platform'])) {
    $selected_platform = $_SESSION['platform'];
} else {
    $selected_platform = "spotify";
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['platform'] = $_POST['platform'];
}
?>

<html>
<head></head>
<body>
	<?php
    if(isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
    } else {
        $username = "";
    }
    ?>
	<form action ="viewreview.php" method="POST">
		<label for = "artist">Artist</label>
		<input type="text" name= "artist" id="artist" size = "20"/><br><br>
		<label for = "album">Album Title</label>
		<input type="text" name= "album" id="album" size = "20"/><br><br>
		<label for = "song">Song Title</label>
		<input type="text" name= "song" id="song" size = "20"/><br><br>
		<label for = "username">Reviewer Name</label>
		<input type="text" name= "username" id="username" size = "20" value="<?php echo $username; ?>"/><br><br>
		<label for="platform">Streaming Platform</label>
		<select name="platform" id="platform"><br>
            <option value="apple" <?php if($selected_platform == "apple") echo "selected"; ?>>Apple Music</option>
            <option value="spotify" <?php if($selected_platform == "spotify") echo "selected"; ?>>Spotify</option>
            <option value="youtube" <?php if($selected_platform == "youtube") echo "selected"; ?>>Youtube</option>
        </select><br>
		<p>Rating</p>
		<input type="radio" id="1-stars" name="rating" value="1-stars">
		<label for="1-stars">1 Star</label><br>
		<input type="radio" id="2-stars" name="rating" value="2-stars">
		<label for="2-stars">2 Star</label><br>
		<input type="radio" id="3-stars" name="rating" value="3-stars">
		<label for="3-stars">3 Star</label><br>
		<input type="radio" id="4-stars" name="rating" value="4-stars">
		<label for="4-stars">4 Star</label><br>	
		<input type="radio" id="5-stars" name="rating" value="5-stars">
		<label for="5-stars">5 Star</label>
		<br/><br>
		<label for="review">Review</label><br>
		<textarea id="review" name="review" rows="4" cols="50"></textarea><br><br>
		<input type="submit"/>	
	</form>
</body>
</html>
