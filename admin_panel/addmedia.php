<?php
include("shared/connection.php");
include("shared/header.php");
include("shared/nav.php");
include("shared/sidebar.php");

if(isset($_POST["reg_btn"])){
    
    $title = $_POST["title"];
    $type = $_POST["type"];
    $artist_id = $_POST["artist_id"];
    $album_id = $_POST["album_id"];
    $genre_id = $_POST["genre_id"];
    $language_id = $_POST["language_id"];
    $year = $_POST["year"];

    $file_path = "";
    $thumbnail_path = "";
    // Handle song file upload
if (isset($_FILES["file_path"])) {
    $name = $_FILES["file_path"]["name"];
    $tempname = $_FILES["file_path"]["tmp_name"];
    $file_type = $_FILES["file_path"]["type"];
    $file_error = $_FILES["file_path"]["error"];
    
    if ($file_error !== UPLOAD_ERR_OK) {
        echo "<script>alert('File upload error: " . $file_error . "')</script>";
    } elseif ($file_type == "audio/mpeg" || 
            $file_type == "audio/mp3" || 
            $file_type == "audio/mp4" ||
            $file_type == "video/mp4" ||
            $file_type == "video/x-msvideo" ||    // avi
            $file_type == "video/webm" ||
            $file_type == "video/ogg") {
        $file_path = "files/" . basename($name);
        if (move_uploaded_file($tempname, "../user_panel/" . $file_path)) {
            // File moved successfully
        } else {
            echo "<script>alert('Failed to move song file.')</script>";
        }
    } else {
        echo "<script>alert('Invalid audio type.')</script>";
    }
}
 
// Handle thumbnail upload
if (isset($_FILES["thumbnail_path"])) {
    $name = $_FILES["thumbnail_path"]["name"];
    $tempname = $_FILES["thumbnail_path"]["tmp_name"];
    $thumbnail_type = $_FILES["thumbnail_path"]["type"];
    $thumbnail_error = $_FILES["thumbnail_path"]["error"];
    
    if ($thumbnail_error !== UPLOAD_ERR_OK) {
        echo "<script>alert('Thumbnail upload error: " . $thumbnail_error . "')</script>";
    } elseif ($thumbnail_type == "image/jpeg" || $thumbnail_type == "image/jpg" || $thumbnail_type == "image/png") {
        $thumbnail_path = "thumbnails/" . basename($name);
        if (move_uploaded_file($tempname, "../user_panel/" . $thumbnail_path)) {
            // Thumbnail moved successfully
        } else {
            echo "<script>alert('Failed to move thumbnail.')</script>";
        }
    } else {
        echo "<script>alert('Invalid thumbnail type.')</script>";
    }
}


    }
    if (!empty($file_path) && !empty($thumbnail_path)) {
        $query = "INSERT INTO media (title, type, artist_id, album_id, genre_id, language_id, year, file_path, thumbnail_path)
                  VALUES ('{$title}', '{$type}', '{$artist_id}', '{$album_id}', '{$genre_id}', '{$language_id}', '{$year}', '{$file_path}', '{$thumbnail_path}')";
        $run = mysqli_query($conn, $query);
        if ($run) {
            echo "<script>alert('Song uploaded successfully!')</script>";
        } else {
            echo "<script>alert('Database error occurred: " . mysqli_error($conn) . "')</script>";
        } 
}
    
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

<?php include("shared/footer.php"); ?>
