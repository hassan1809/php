<?php
include("shared/connection.php");
include("shared/navbar.php");
?>

  <style>
    /* Add top padding to avoid overlap with navbar */
    body {
      background:rgb(9, 3, 3);
      color: #000000;
      min-height: 100vh;
      padding-top: 80px; /* Adjust if your navbar height differs */
      display: flex;
      flex-direction: column;
      padding-left: 20px;
      padding-right: 20px;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h1 {
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center;
      color:rgb(246, 248, 250);
      /* subtle text shadow for crispness */
      text-shadow: 0 0 3px #cce5ff;
    }

    #player-container {
      background: #f8f9fa; /* Bootstrap light background */
      border-radius: 0.5rem;
      padding: 16px;
      margin-bottom: 2rem;
      box-shadow: 0 0 15px #0d6efd30;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
    }

    #video-title {
      font-size: 1.7rem;
      font-weight: 700;
      margin-bottom: 0.3rem;
      color: #000;
    }

    #video-artist {
      font-size: 1.1rem;
      color: #444;
      margin-bottom: 1rem;
    }

    video {
      width: 100%;
      max-height: 360px;
      border-radius: 0.5rem;
      background: #000;
      outline: none;
    }

    .video-list .card {
      background: #ffffff;
      border: 1px solid #dee2e6;
      cursor: pointer;
      transition: transform 0.15s ease, box-shadow 0.15s ease;
      box-shadow: none;
    }

    .video-list .card:hover,
    .video-list .card.active {
      transform: scale(1.05);
      box-shadow: 0 0 12px #0d6efd80;
      border-radius: 0.75rem;
      border-color: #0d6efd;
    }

    .video-list img {
      border-radius: 0.75rem 0.75rem 0 0;
      height: 160px;
      object-fit: cover;
      width: 100%;
    }

    .card-body {
      padding: 0.8rem 1rem;
    }

    .card-title,
    .card-text {
      color: #000;
      margin: 0;
    }

    @media (max-width: 576px) {
      .video-list .card {
        margin-bottom: 1rem;
      }
      video {
        max-height: 240px;
      }
    }
  </style>
</head>
<body>
  <?php


// Get artist ID from URL
$artist_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Optional: Fetch artist name for heading
$artist_name = "";
if ($artist_id > 0) {
    $artist_result = mysqli_query($conn, "SELECT name FROM artists WHERE id = $artist_id");
    if ($row = mysqli_fetch_assoc($artist_result)) {
        $artist_name = $row['name'];
    } else {
        echo "<p class='text-danger'>Artist not found.</p>";
        exit;
    }
} else {
    echo "<p class='text-danger'>Invalid artist ID.</p>";
    exit;
}
?>

<style>
/* your existing styles here */
</style>

<body>
  <h1>Videos by <?php echo htmlspecialchars($artist_name); ?></h1>

  <div id="player-container">
    <div id="video-title">Select a video to play</div>
    <div id="video-artist"><?php echo htmlspecialchars($artist_name); ?></div>
    <div id="video-player-wrapper"></div>
  </div>

  <div class="container-fluid">
    <div class="row video-list g-3">
      <!-- Video cards inserted here by JS -->
    </div>
  </div>

<script>
  const videos = [
    <?php
    $sql = "SELECT media.*, artists.name AS artist_name 
            FROM media 
            JOIN artists ON media.artist_id = artists.id 
            WHERE media.artist_id = $artist_id";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        $i = 0;
        while ($data = mysqli_fetch_assoc($run)) {
            echo "{";
            echo "id: " . (++$i) . ",";
            echo "title: " . json_encode($data["title"]) . ",";
            echo "artist: " . json_encode($data["artist_name"]) . ",";
            echo "src: " . json_encode($data["file_path"]) . ",";
            echo "thumbnail: " . json_encode($data["thumbnail_path"]);
            echo "},";
        }
    }
    ?>
  ];

  const videoListEl = document.querySelector(".video-list");
  const videoTitleEl = document.getElementById("video-title");
  const videoArtistEl = document.getElementById("video-artist");
  const videoPlayerWrapper = document.getElementById("video-player-wrapper");

  let currentActiveCard = null;

  function createVideoCard(video) {
    const col = document.createElement("div");
    col.className = "col-sm-6 col-md-4 col-lg-3";

    const card = document.createElement("div");
    card.className = "card";
    card.setAttribute("tabindex", "0");
    card.dataset.src = video.src;
    card.dataset.title = video.title;
    card.dataset.artist = video.artist;

    const img = document.createElement("img");
    img.src = video.thumbnail;
    img.alt = video.title;
    img.loading = "lazy";
    card.appendChild(img);

    const cardBody = document.createElement("div");
    cardBody.className = "card-body";

    const title = document.createElement("h5");
    title.className = "card-title";
    title.textContent = video.title;

    const artist = document.createElement("p");
    artist.className = "card-text";
    artist.textContent = video.artist;

    cardBody.appendChild(title);
    cardBody.appendChild(artist);
    card.appendChild(cardBody);

    card.addEventListener("click", () => loadVideo(video, card));
    card.addEventListener("keyup", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        loadVideo(video, card);
      }
    });

    col.appendChild(card);
    return col;
  }

  function loadVideo(video, card) {
    if (currentActiveCard) currentActiveCard.classList.remove("active");
    currentActiveCard = card;
    card.classList.add("active");

    videoTitleEl.textContent = video.title;
    videoArtistEl.textContent = video.artist;

    videoPlayerWrapper.innerHTML = "";

    const videoEl = document.createElement("video");
    videoEl.controls = true;
    videoEl.src = video.src;
    videoEl.autoplay = true;
    videoEl.setAttribute("playsinline", "playsinline");
    videoPlayerWrapper.appendChild(videoEl);
  }

  videos.forEach((vid) => {
    const card = createVideoCard(vid);
    videoListEl.appendChild(card);
  });
</script>

</body>



  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

   
 
  
</body>
</html>
<?php
include("shared/footer.php");
?>