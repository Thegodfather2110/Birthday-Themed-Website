
<head>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.5.0/dist/index.umd.js"></script>
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body {
      height: 100%;
      font-family: 'Arial', sans-serif;
      background: #000;
      color: #fff;
    }
    
    .galaxy-bg {
      background: linear-gradient(135deg, #000000, #0d1b2a);
      position: relative;
      overflow: hidden;
    }
    .top-nav {
      width: 100%;
      padding: 20px;
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      overflow: hidden;
    }
    .top-nav h1 {
      font-size: 2rem;
      font-family: 'Lobster', cursive;
      animation: glow 2s infinite alternate;
      position: relative;
      outline: 1px #000;
      z-index: 3;
    }
    @keyframes glow {
      from { text-shadow: 0 0 5px rgba(255,255,255,0.7); }
      to { text-shadow: 0 0 15px rgba(255,255,255,1); }
    }
    
    #fireworks-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
    }
    #stars-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
      pointer-events: none;
    }
    
    .bottom-nav {
      width: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      z-index: 1000;
      overflow: hidden;
    }
    .bottom-nav a {
      text-decoration: none;
      color: #fff;
      text-align: center;
      flex: 1;
      transition: transform 0.3s, box-shadow 0.3s;
      padding: 5px;
      position: relative;
      z-index: 2;
    }
    .bottom-nav a:hover,
    .bottom-nav a:active {
      transform: perspective(500px) rotateX(10deg) scale(1.1);
      box-shadow: 0 4px 10px rgba(0,0,0,0.5);
    }
    .bottom-nav a.active .material-icons {
      color: yellow;
    }
    .nav-icon {
      font-size: 1.8rem;
      display: block;
      margin-bottom: 4px;
    }
    
    .content {
      padding-top: 90px;
      padding-bottom: 60px;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 2000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.8);
    }
    .modal-content {
      background-color: #111;
      margin: 20% auto; 
      padding: 20px;
      border: 1px solid #444;
      width: 90%;
      max-width: 600px;
      border-radius: 10px;
      position: relative;
      animation: slideDown 0.5s;
    }
    @keyframes slideDown {
      from { top: -300px; opacity: 0; }
      to { top: 0; opacity: 1; }
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }
    .song-list {
      margin-top: 20px;
    }
    .song-entry {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      cursor: pointer;
      padding: 10px;
      border-bottom: 1px solid #333;
    }
    .song-thumbnail {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 15px;
      position: relative;
    }
    .song-thumbnail img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .song-thumbnail .song-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none; 
      font-size: 36px;
      color: yellow;
    }
    .song-info {
      flex: 1;
    }
    .song-info h3 {
      margin: 0 0 5px 0;
      font-size: 18px;
    }
    .song-info p {
      margin: 0;
      font-size: 14px;
      color: #ccc;
    }
    .open-library {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #0d1b2a;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    @keyframes rotation {
      from { transform: translate(-50%, -50%) rotate(0deg); }
      to { transform: translate(-50%, -50%) rotate(360deg); }
    }
    .rotate {
      animation: rotation 3s linear infinite;
    }
    .nav-icon.rotate {
      animation: rotationNav 3s linear infinite;
    }
    @keyframes rotationNav {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .star {
      position: absolute;
      background: white;
      border-radius: 50%;
      opacity: 0.5;
      animation: twinkle linear infinite;
    }
    @keyframes twinkle {
      0%, 100% { opacity: 0.2; }
      50% { opacity: 1; }
    }
  </style>
</head>
<body>
  <nav class="top-nav galaxy-bg">
    <h1>Happy Birthday  <span class="birthday-name"></span>! 🐌</h1>
    <div id="fireworks-container"></div>
    <div id="stars-container"></div>
  </nav>
  
  <nav class="bottom-nav galaxy-bg">
    <div id="bottom-stars-container"></div>
    <a href="#home" id="nav-home">
      <i class="material-icons nav-icon">home</i>
      <span class="nav-label">Home</span>
    </a>
    <a href="#memories" id="nav-memories">
      <i class="material-icons nav-icon">photo_library</i>
      <span class="nav-label">Our Memories</span>
    </a>
    <a href="#songs" id="nav-songs">
      <i class="material-icons nav-icon">music_note</i>
      <span class="nav-label">Songs</span>
    </a>
    <a href="#dates" id="nav-dates">
      <i class="material-icons nav-icon">event</i>
      <span class="nav-label">Important Dates</span>
    </a>
  </nav>
  
  <div id="songs-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Songs</h2>
      <div class="song-list">
        <div class="song-entry" data-song-index="0">
          <div class="song-thumbnail">
            <img src="https://via.placeholder.com/150?text=Song+1" alt="Song 1">
            <span class="song-icon material-icons">music_note</span>
          </div>
          <div class="song-info">
            <h3 class="song-title">Song of the Stars</h3>
            <p class="song-duration">Duration: 3:45</p>
            <p class="song-artist">By: Celestial Voices</p>
          </div>
          <audio class="song-audio">
            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mp3">
          </audio>
        </div>
        <div class="song-entry" data-song-index="1">
          <div class="song-thumbnail">
            <img src="https://via.placeholder.com/150?text=Song+2" alt="Song 2">
            <span class="song-icon material-icons">music_note</span>
          </div>
          <div class="song-info">
            <h3 class="song-title">Cosmic Dreams</h3>
            <p class="song-duration">Duration: 4:10</p>
            <p class="song-artist">By: Galactic Beats</p>
          </div>
          <audio class="song-audio">
            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3" type="audio/mp3">
          </audio>
        </div>
        <div class="song-entry" data-song-index="2">
          <div class="song-thumbnail">
            <img src="https://via.placeholder.com/150?text=Song+3" alt="Song 3">
            <span class="song-icon material-icons">music_note</span>
          </div>
          <div class="song-info">
            <h3 class="song-title">Nebula Nights</h3>
            <p class="song-duration">Duration: 5:05</p>
            <p class="song-artist">By: Space Ensemble</p>
          </div>
          <audio class="song-audio">
            <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3" type="audio/mp3">
          </audio>
        </div>
      </div>
      <a href="#" class="open-library">Open Music Library</a>
    </div>
  </div>
  
  <script>
    const birthdayName = "Snail";
    document.querySelectorAll('.birthday-name').forEach(el => {
      el.textContent = birthdayName;
    });
    
    function initFireworks() {
      const container = document.getElementById('fireworks-container');
      if (window.Fireworks && window.Fireworks.Fireworks) {
        const fireworks = new Fireworks.Fireworks(container, {
          speed: 2,
          acceleration: 1.05,
          friction: 0.96,
          gravity: 1.5,
          particles: 150,
          trace: 3,
          explosion: 5,
          intensity: 30,
          autoresize: true,
          boundaries: {
            top: 0,
            bottom: container.clientHeight,
            left: 0,
            right: container.clientWidth,
          },
        });
        fireworks.start();
      } else {
        console.error("Fireworks library is not loaded or not available as expected.");
      }
    }
    
    function createStars(container, numberOfStars = 50) {
      for (let i = 0; i < numberOfStars; i++) {
        const star = document.createElement('div');
        star.classList.add('star');
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        const size = Math.random() * 2 + 1;
        star.style.width = size + 'px';
        star.style.height = size + 'px';
        star.style.animationDelay = Math.random() * 3 + 's';
        star.style.animationDuration = (2 + Math.random() * 2) + 's';
        container.appendChild(star);
      }
    }
    
    function initBottomNav() {
      const navLinks = document.querySelectorAll('.bottom-nav a');
      navLinks.forEach(link => {
        link.addEventListener('click', () => {
          navLinks.forEach(el => el.classList.remove('active'));
          link.classList.add('active');
          sessionStorage.setItem('activeNav', link.id);
        });
      });
      const activeNavId = sessionStorage.getItem('activeNav');
      if (activeNavId) {
        const activeLink = document.getElementById(activeNavId);
        if (activeLink) {
          activeLink.classList.add('active');
        }
      }
    }
    
    document.getElementById('nav-songs').addEventListener('click', function(e) {
      e.preventDefault();
      document.getElementById('songs-modal').style.display = 'block';
    });
    
    document.querySelector('#songs-modal .close').addEventListener('click', function() {
      document.getElementById('songs-modal').style.display = 'none';
    });
    
    let currentAudio = null;
    const songEntries = document.querySelectorAll('.song-entry');
    
    function updateNavSongsIcon() {
      const navSongsIcon = document.querySelector('#nav-songs .material-icons');
      if (currentAudio && !currentAudio.paused) {
        navSongsIcon.classList.add('rotate');
      } else {
        navSongsIcon.classList.remove('rotate');
      }
    }
    
    songEntries.forEach(entry => {
      entry.addEventListener('click', function() {
        const audio = entry.querySelector('.song-audio');
        const thumbnail = entry.querySelector('.song-thumbnail');
        const icon = thumbnail.querySelector('.song-icon');
        const img = thumbnail.querySelector('img');
        
        if (currentAudio && currentAudio !== audio) {
          currentAudio.pause();
          let prevThumbnail = currentAudio.parentElement.querySelector('.song-thumbnail');
          prevThumbnail.querySelector('.song-icon').classList.remove('rotate');
          prevThumbnail.querySelector('.song-icon').style.display = 'none';
          prevThumbnail.querySelector('img').style.display = 'block';
          currentAudio = null;
        }
        
        if (audio.paused) {
          audio.play();
          img.style.display = 'none';
          icon.style.display = 'block';
          icon.classList.add('rotate');
          currentAudio = audio;
        } else {
          audio.pause();
          img.style.display = 'block';
          icon.style.display = 'none';
          icon.classList.remove('rotate');
          currentAudio = null;
        }
        updateNavSongsIcon();
      });
    });
    document.addEventListener('DOMContentLoaded', () => {
      initFireworks();
      const topStarsContainer = document.getElementById('stars-container');
      const bottomStarsContainer = document.getElementById('bottom-stars-container');
      createStars(topStarsContainer);
      createStars(bottomStarsContainer);
      initBottomNav();
    });
  </script>
</body>
