<?php
  include("shared/header.php");
  include("shared/sidebar.php");
  include("shared/nav.php");
  include("shared/connection.php");


  ?>
<?php


include("shared/connection.php");

// Get the song ID from URL
if (!isset($_GET['id'])) {
    echo "<script>alert('No song selected.'); window.location.href='media.php';</script>";
    exit;
}
$id = intval($_GET['id']);

// Fetch existing song data
$result = mysqli_query($conn, "SELECT * FROM media WHERE id = $id");
if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Song not found.'); window.location.href='media.php';</script>";
    exit;
}
$song = mysqli_fetch_assoc($result);

// Fetch dropdown values
$artists = mysqli_query($conn, "SELECT id, name FROM artists");
$albums = mysqli_query($conn, "SELECT id, title FROM albums");
$genre = mysqli_query($conn, "SELECT id, name FROM genre");
$languages = mysqli_query($conn, "SELECT id, name FROM languages");

// Handle update submission
if (isset($_POST["reg_btn"])) {
    $title = $_POST["title"];
    $type = $_POST["type"];
    $artist_id = $_POST["artist_id"];
    $album_id = $_POST["album_id"];
    $genre_id = $_POST["genre_id"];
    $language_id = $_POST["language_id"];
    $year = $_POST["year"];

    // Default to existing paths
    $file_path = $song['file_path'];
    $thumbnail_path = $song['thumbnail_path'];

    // Handle new file upload (optional)
    if (!empty($_FILES["file_path"]["name"])) {
        $name = $_FILES["file_path"]["name"];
        $tempname = $_FILES["file_path"]["tmp_name"];
        $file_path = "files/" . basename($name);
        move_uploaded_file($tempname, "../user_panel/" . $file_path);
    }

    if (!empty($_FILES["thumbnail_path"]["name"])) {
        $name = $_FILES["thumbnail_path"]["name"];
        $tempname = $_FILES["thumbnail_path"]["tmp_name"];
        $thumbnail_path = "thumbnails/" . basename($name);
        move_uploaded_file($tempname, "../user_panel/" . $thumbnail_path);
    }

    // Perform update
    $query = "UPDATE media SET 
                title = '{$title}', 
                type = '{$type}', 
                artist_id = '{$artist_id}', 
                album_id = '{$album_id}', 
                genre_id = '{$genre_id}', 
                language_id = '{$language_id}', 
                year = '{$year}', 
                file_path = '{$file_path}', 
                thumbnail_path = '{$thumbnail_path}' 
              WHERE id = {$id}";

    $run = mysqli_query($conn, $query);
    if ($run) {
        echo "<script>alert('Song updated successfully!'); window.location.href='media.php';</script>";
    } else {
        echo "<script>alert('Error updating song: " . mysqli_error($conn) . "')</script>";
    }
}




?>

<body>
    <?php
// Fetch artists, albums, genres, and languages for the dropdowns
$artists = mysqli_query($conn, "SELECT id, name FROM artists");
$albums = mysqli_query($conn, "SELECT id, title FROM albums");
$genre = mysqli_query($conn, "SELECT id, name FROM genre");
$languages = mysqli_query($conn, "SELECT id, name FROM languages");
?>

<div class="container">
    <h2 class="mb-2">Upload New Song</h2>

    <form action="" method="post" enctype="multipart/form-data" >
       
        
        <div class="mb-3">
            <label class="form-label">Release Year</label>
            <input class="form-control" type="text" name="year" placeholder="e.g. 2024">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Song File</label>
            <input class="form-control" type="file" name="file_path" accept=".mp4,mp3,audio/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Thumbnail Image</label>
            <input class="form-control" type="file" name="thumbnail_path" accept=".jpg,.jpeg,.png" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Song Title</label>
            <input class="form-control" type="text" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <input class="form-control" type="text" name="type" placeholder="e.g. Single, Remix" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Artist</label>
            <select class="form-control" name="artist_id" required>
                <option value="">Select Artist</option>
                <?php while ($row = mysqli_fetch_assoc($artists)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Album</label>
            <select class="form-control" name="album_id">
                <option value="">Select Album</option>
                <?php while ($row = mysqli_fetch_assoc($albums)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select class="form-control" name="genre_id">
                <option value="">Select Genre</option>
                <?php while ($row = mysqli_fetch_assoc($genre)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Language</label>
            <select class="form-control" name="language_id">
                <option value="">Select Language</option>
                <?php while ($row = mysqli_fetch_assoc($languages)): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
<div class="text-center">
            <input class="btn btn-primary" type="submit" name="reg_btn" value="Upload Song">
        </div>
    </form>
   
</div>
</body>
</html>
<?php
include("shared/footer.php");
?>