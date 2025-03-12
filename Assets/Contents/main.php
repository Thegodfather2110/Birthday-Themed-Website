<div class="video-container">
    <video autoplay muted loop>
        <source src="Assets/video-bg/bg.webm" type="video/webm">
        Your browser does not support the video tag.
    </video>
</div>


<div class="wishing-container">
    <h1>Happy Birthday NAME!</h1>
    <p>"Wishing you a day filled with love, joy, and unforgettable moments."</p>
    <span class="material-icons">celebration</span>
    <br>
    <button class="polymorphic-button" id="continue-button">
        Click & Continue
    </button>

</div>


<div class="gift-container" id="gift-container">
    <p class="gift-message">I have a gift for you!</p>
    <img src="Assets/images/christmas-gift.png" alt="Gift Image">
    <br>
    <button class="open-gift-button" id="open-gift-button">Open Gift</button>
</div>

<div class="offer-container" id="offer-container">
    <h1>GIFT</h1>
    <p>Offer for a movie</p>
    <p>Let's watch any movie together ? : )</p>
    <ul>
        <li><span class="material-icons">fastfood</span> We will cook popcorn</li>
        <li><span class="material-icons">local_drink</span> We will have cold drinks</li>
        <li><span class="material-icons">music_note</span> We will play music</li>
        <li><span class="material-icons">music_video</span> We will play & sing songs</li>
        <li><span class="material-icons">face</span> Rest whatever you say Mam</li>
    </ul>
    <div class="offer-buttons">
        <button class="yes-button">Yes</button>
        <button class="no-button">No</button>
    </div>
</div>
<div id="popup" class="popup">
    <div class="popup-content">
        <span class="popup-close" id="popup-close">&times;</span>
        <h2>Thanks for accepting!</h2>
        <p>Now please message me in regards to this 😊</p>
        <a href="https://wa.me/7470726731?text=HA%20CHAL%20MOVIE%20DEKH%20LENGE" target="_blank"
            class="whatsapp-button">
            Message on WhatsApp
        </a>
    </div>
</div>


<script>
    document.getElementById('continue-button').addEventListener('click', function () {
        document.querySelector('.wishing-container').style.display = 'none'; // Hide wishing container
        document.getElementById('gift-container').style.display = 'block'; // Show gift container
    });
    document.getElementById('open-gift-button').addEventListener('click', function () {
        document.getElementById('gift-container').style.display = 'none'; // Hide gift container
        document.getElementById('offer-container').style.display = 'block'; // Show offer container
    });

    document.querySelector('.offer-buttons .yes-button').addEventListener('click', function () {
        document.getElementById('popup').style.display = 'flex';
    });

    document.getElementById('popup-close').addEventListener('click', function () {
        document.getElementById('popup').style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === document.getElementById('popup')) {
            document.getElementById('popup').style.display = 'none';
        }
    });


    document.querySelector('.offer-buttons .no-button').addEventListener('click', function () {
        const button = this;

        button.classList.remove('move-button');

        const buttonWidth = button.offsetWidth;
        const buttonHeight = button.offsetHeight;
        const maxX = window.innerWidth - buttonWidth - 10;
        const maxY = window.innerHeight - buttonHeight - 10;

        const randomX = Math.random() * maxX;
        const randomY = Math.random() * maxY;

        button.style.position = 'absolute';
        button.style.left = `${randomX}px`;
        button.style.top = `${randomY}px`;

        button.classList.add('fixed-position');
    });



</script>