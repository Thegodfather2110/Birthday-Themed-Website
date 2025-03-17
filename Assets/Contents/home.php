<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Happy Birthday Cosmic Celebration</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.5.0/dist/index.umd.js"></script>
  <style>
  
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    html, body {
      height: 100%;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(135deg, #f0f0f0, #e0e0e0); /* Light gradient background */
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
    }
    .top-nav h1 {
      font-size: 2rem;
      font-family: 'Lobster', cursive;
      animation: glow 2s infinite alternate;
      position: relative;
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
      text-align: center;
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
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #fff;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      margin: 20% auto;
      padding: 20px;
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
    #memory-dates {
      list-style: none;
      padding: 0;
    }
    #memory-dates li {
      margin: 10px 0;
      cursor: pointer;
    }
    #memory-image {
      width: 100%;
      max-width: 400px;
      margin-bottom: 10px;
    }
    /* Glass Effect for Popups */
    .modal-content, #memory-popup {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #fff;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }
    /* Shining Headings and Text */
    h2, h3 {
      color: #fff;
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }
    p {
      color: #fff;
    }
    /* Styled Buttons */
    button {
      background: rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.5);
      color: #fff;
      padding: 10px 20px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: rgba(255, 255, 255, 0.4);
    }
    /* Navigation Buttons for Memories */
    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }
    .left { left: 10px; }
    .right { right: 10px; }
    /* Toast Popup */
    .toast {
      position: fixed;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      display: none;
    }
  </style>
</head>
<body>
  <nav class="top-nav galaxy-bg">
    <h1>Happy Birthday <span class="birthday-name"></span>! 🐌</h1>
    <div id="fireworks-container"></div>
    <div id="stars-container"></div>
  </nav>

  <!-- Home Page -->
  <div id="home" class="content">
    <h2>Happy Birthday to my special one!</h2>
    <p>Wishing you a day filled with love, joy, and all the happiness in the universe! May every moment sparkle like the stars above.</p>
    <p>Do you remember all those memories that we have spent together?</p>
    <button onclick="showMemoriesQuestion('Yes')">Yes</button>
    <button onclick="showMemoriesQuestion('No')">No</button>
  </div>

  <!-- Memories Page -->
  <div id="memories" class="content" style="display: none;">
    <h2>Our Memories</h2>
    <ul id="memory-dates"></ul>
  </div>

  <!-- Memory Popup -->
  <div id="memory-popup" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideMemoryPopup()">×</span>
      <img id="memory-image" src="" alt="Memory Image">
      <h3 id="memory-date"></h3>
      <p id="memory-description"></p>
      <button class="nav-btn left" onclick="prevMemory()">←</button>
      <button class="nav-btn right" onclick="nextMemory()">→</button>
    </div>
  </div>

  <!-- Midway Popup -->
  <div id="midway-popup" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideMidwayPopup()">×</span>
      <p>Don’t you feel enough? Want to play a song?</p>
      <button onclick="playSong()">Play Song</button>
    </div>
  </div>

  <!-- Fireworks Popup -->
  <div id="fireworks-popup" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideFireworksPopup()">×</span>
      <p>Want to see fireworks together?</p>
      <button onclick="startFireworks()">Yes</button>
    </div>
  </div>

  <!-- Final Popup -->
  <div id="final-popup" class="modal">
    <div class="modal-content">
      <span class="close" onclick="hideFinalPopup()">×</span>
      <p>Stay with me forever, will you...??</p>
    </div>
  </div>

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
  </nav>

  <!-- Songs Modal -->
  <div id="songs-modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="document.getElementById('songs-modal').style.display='none'">×</span>
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

  <!-- Toast Popup -->
  <div id="toast" class="toast"></div>

  <script>
    const birthdayName = "Snail";
    document.querySelectorAll('.birthday-name').forEach(el => {
      el.textContent = birthdayName;
    });

    // Sample memories data
    const memories = [
      { date: '2023-01-01', image: 'https://vedahaven.shop/Assets/Gallery/67d7580354d89.jpg', description: 'Our first date.' },
      { date: '2023-02-14', image: 'https://via.placeholder.com/150?text=Memory+2', description: 'Valentine’s Day surprise.' },
      { date: '2023-06-10', image: 'https://via.placeholder.com/150?text=Memory+3', description: 'Summer picnic.' },
      { date: '2023-12-25', image: 'https://via.placeholder.com/150?text=Memory+4', description: 'Christmas together.' }
    ];

    let currentMemoryIndex = 0;

    // Navigation and content display
    function showContent(id) {
      document.querySelectorAll('.content').forEach(content => content.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }

    function initBottomNav() {
      const navLinks = document.querySelectorAll('.bottom-nav a');
      navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          navLinks.forEach(el => el.classList.remove('active'));
          link.classList.add('active');
          const targetId = link.getAttribute('href').substring(1);
          if (targetId !== 'songs') showContent(targetId);
          if (targetId === 'songs') document.getElementById('songs-modal').style.display = 'block';
          sessionStorage.setItem('activeNav', link.id);
        });
      });
      const activeNavId = sessionStorage.getItem('activeNav') || 'nav-home';
      const activeLink = document.getElementById(activeNavId);
      if (activeLink) {
        activeLink.classList.add('active');
        const targetId = activeLink.getAttribute('href').substring(1);
        if (targetId !== 'songs') showContent(targetId);
      }
    }

    // Memories Question
    function showMemoriesQuestion(answer) {
      const message = answer === 'Yes' ? 'You wanna see them?' : 'You must remember all those memories!';
      alert(message);
      showContent('memories');
      document.getElementById('nav-memories').classList.add('active');
      document.getElementById('nav-home').classList.remove('active');
    }

    // Display Memories
    function displayMemories() {
      const memoryList = document.getElementById('memory-dates');
      memories.forEach((memory, index) => {
        const listItem = document.createElement('li');
        listItem.textContent = memory.date;
        listItem.onclick = () => {
          currentMemoryIndex = index;
          updateMemoryPopup();
        };
        memoryList.appendChild(listItem);
      });
    }

    let memoryCount = 0;
    function updateMemoryPopup() {
      const memory = memories[currentMemoryIndex];
      document.getElementById('memory-image').src = memory.image;
      document.getElementById('memory-date').textContent = memory.date;
      document.getElementById('memory-description').textContent = memory.description;
      document.getElementById('memory-popup').style.display = 'block';
      memoryCount++;
      if (memoryCount === Math.floor(memories.length / 2)) {
        setTimeout(showMidwayPopup, 1000);
      } else if (memoryCount === memories.length) {
        setTimeout(showFireworksPopup, 1000);
      }
    }

    function hideMemoryPopup() {
      document.getElementById('memory-popup').style.display = 'none';
    }

    function prevMemory() {
      if (currentMemoryIndex > 0) {
        currentMemoryIndex--;
        updateMemoryPopup();
        showToast('Previous memory');
      }
    }

    function nextMemory() {
      if (currentMemoryIndex < memories.length - 1) {
        currentMemoryIndex++;
        updateMemoryPopup();
        showToast('Next memory');
      }
    }

    function showToast(message) {
      const toast = document.getElementById('toast');
      toast.textContent = message;
      toast.style.display = 'block';
      setTimeout(() => toast.style.display = 'none', 2000);
    }

    // Midway Popup
    function showMidwayPopup() {
      document.getElementById('midway-popup').style.display = 'block';
    }

    function hideMidwayPopup() {
      document.getElementById('midway-popup').style.display = 'none';
    }

    // Songs Autoplay
    function playSong() {
      hideMidwayPopup();
      document.getElementById('songs-modal').style.display = 'block';
      const songEntries = document.querySelectorAll('.song-entry');
      let currentIndex = 0;

      function playNextSong() {
        if (currentIndex < songEntries.length) {
          const entry = songEntries[currentIndex];
          const audio = entry.querySelector('.song-audio');
          const thumbnail = entry.querySelector('.song-thumbnail');
          const icon = thumbnail.querySelector('.song-icon');
          const img = thumbnail.querySelector('img');

          if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            const prevThumbnail = currentAudio.parentElement.querySelector('.song-thumbnail');
            prevThumbnail.querySelector('.song-icon').classList.remove('rotate');
            prevThumbnail.querySelector('.song-icon').style.display = 'none';
            prevThumbnail.querySelector('img').style.display = 'block';
          }

          audio.play();
          img.style.display = 'none';
          icon.style.display = 'block';
          icon.classList.add('rotate');
          currentAudio = audio;
          updateNavSongsIcon();

          audio.onended = () => {
            img.style.display = 'block';
            icon.style.display = 'none';
            icon.classList.remove('rotate');
            currentIndex++;
            if (currentIndex < songEntries.length) {
              playNextSong();
            } else {
              document.getElementById('songs-modal').style.display = 'none';
              showContent('memories');
            }
          };
        }
      }
      playNextSong();
    }

    let currentAudio = null;
    function updateNavSongsIcon() {
      const navSongsIcon = document.querySelector('#nav-songs .material-icons');
      if (currentAudio && !currentAudio.paused) {
        navSongsIcon.classList.add('rotate');
      } else {
        navSongsIcon.classList.remove('rotate');
      }
    }

    // Fireworks
    function showFireworksPopup() {
      document.getElementById('fireworks-popup').style.display = 'block';
    }

    function hideFireworksPopup() {
      document.getElementById('fireworks-popup').style.display = 'none';
    }

    function initFireworks() {
      const container = document.getElementById('fireworks-container');
      if (window.Fireworks && window.Fireworks.Fireworks) {
        const fireworks = new window.Fireworks.Fireworks(container, {
          speed: 2,
          acceleration: 1.05,
          friction: 0.96,
          gravity: 1.5,
          particles: 150,
          trace: 3,
          explosion: 5,
          intensity: 30,
          autoresize: true,
          boundaries: { top: 0, bottom: container.clientHeight, left: 0, right: container.clientWidth },
        });
        fireworks.start();

        const wishes = [
          "Tum life me hamesha khush raho!",
          "Apna kaam padhai sab ache se karo!",
          "Apna naam apne parivar ka naam roshan karo!"
        ];
        let wishIndex = 0;
        const wishInterval = setInterval(() => {
          if (wishIndex < wishes.length) {
            alert(wishes[wishIndex]);
            wishIndex++;
          } else {
            clearInterval(wishInterval);
            fireworks.stop();
            showFinalPopup();
          }
        }, 2000);

        setTimeout(() => {
          if (wishIndex < wishes.length) {
            clearInterval(wishInterval);
            fireworks.stop();
            showFinalPopup();
          }
        }, 10000);
      }
    }

    function startFireworks() {
      hideFireworksPopup();
      initFireworks();
    }

    // Final Popup
    function showFinalPopup() {
      document.getElementById('final-popup').style.display = 'block';
    }

    function hideFinalPopup() {
      document.getElementById('final-popup').style.display = 'none';
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
      const topStarsContainer = document.getElementById('stars-container');
      const bottomStarsContainer = document.getElementById('bottom-stars-container');
      createStars(topStarsContainer);
      createStars(bottomStarsContainer);
      initBottomNav();
      displayMemories();
    });

    // Create twinkling stars
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
  </script>
</body>
</html>