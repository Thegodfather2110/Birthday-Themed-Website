<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Celebrate Pookies special day with this beautifully crafted birthday website, filled with memories, wishes, and joy.">
    <meta name="keywords" content="Pookies Birthday, Birthday Website, Celebration, Special Day, Birthday Wishes, Birthday Memories, Party">
    <meta name="author" content="Mayank Chawdhari">
    
    <meta property="og:title" content="Happy Birthday Pookie! 🎉">
    <meta property="og:description" content="Website bnane ke liye bhot kaam time bcha tha but its good ;)">
    <meta property="og:image" content="https://programmerslife.store/Hidden/Secured-0012/Boss/Birthday/Happy.png">
    <meta property="og:url" content="https://premium-private-server">
    <meta property="og:type" content="website">
    
    
    <meta name="robots" content="noindex, nofollow"> 
    
    <title>Happy Birthday NAME! 🎉</title>
    <link rel="stylesheet" href="Assets/Styles/main.css">
    <link rel="stylesheet" href="Assets/Styles/surprise.css">
    <link rel="stylesheet" href="Assets/Styles/offer.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <?php include "Assets/Contents/main.php"?>
    <audio id="background-music" src="Assets/music/lazylad.mp3" preload="auto"></audio>
    
    <!-- Play button to start audio -->
    <button id="play-audio-button">Play Music</button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var audio = document.getElementById('background-music');
            var playButton = document.getElementById('play-audio-button');
            
            playButton.addEventListener('click', function() {
                audio.currentTime = 10;
                audio.play().catch(function(error) {
                    console.log('Playback failed:', error);
                });
                playButton.style.display = 'none'; 
            });
        });
    </script>

</body>
</html>