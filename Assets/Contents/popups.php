<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customizable Popup Module</title>
    <style>

        /* General Popup Styling */
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    display: none;
}

.popup-content {
    padding: 20px;
    position: relative;
    min-width: 200px;
    min-height: 150px;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

/* Design 1 */
.design1 {
    background: linear-gradient(to right, #ff7e5f, #feb47b);
    border-radius: 10px;
    color: #fff;
}

/* Design 2 */
.design2 {
    background: #fff;
    color: #000;
    border: 2px solid #000;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

/* Design 3 */
.design3 {
    background: #4facfe;
    color: #fff;
    border-radius: 5px;
}

/* Design 4 */
.design4 {
    background: #00f260;
    color: #000;
    border: 1px dashed #000;
}

/* Design 5 */
.design5 {
    background: #d4a5a5;
    color: #fff;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
}

/* Animation Effects */
.fadeIn {
    animation: fadeIn 0.5s ease-in;
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.slideDown {
    animation: slideDown 0.5s ease-in;
}
@keyframes slideDown {
    from { transform: translate(-50%, -150%); }
    to { transform: translate(-50%, -50%); }
}

/* Button Styling */
.buttons button {
    margin: 5px;
    padding: 5px 10px;
}

/* Admin Popup Form Styling */
#edit-form label {
    display: block;
    margin: 10px 0;
}
#edit-form input[type="text"], #edit-form textarea {
    width: 100%;
    max-width: 300px;
}
#edit-form textarea {
    height: 60px;
}
    </style>
</head>
<body>
    <!-- Buttons to open popups -->
    <button onclick="showPopup(1)">Open Popup 1</button>
    <button onclick="showPopup(2)">Open Popup 2</button>
    <button onclick="showPopup(3)">Open Popup 3</button>
    <button onclick="showPopup(4)">Open Popup 4</button>
    <button onclick="showPopup(5)">Open Popup 5</button>
    <button onclick="showAdminPopup()">Edit Popups</button>

    <!-- Popup 1 -->
    <div class="popup design1" id="popup1" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hidePopup(1)">&times;</span>
            <h2 class="heading"></h2>
            <p class="description"></p>
            <div class="buttons"></div>
        </div>
    </div>

    <!-- Popup 2 -->
    <div class="popup design2" id="popup2" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hidePopup(2)">&times;</span>
            <h2 class="heading"></h2>
            <p class="description"></p>
            <div class="buttons"></div>
        </div>
    </div>

    <!-- Popup 3 -->
    <div class="popup design3" id="popup3" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hidePopup(3)">&times;</span>
            <h2 class="heading"></h2>
            <p class="description"></p>
            <div class="buttons"></div>
        </div>
    </div>

    <!-- Popup 4 -->
    <div class="popup design4" id="popup4" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hidePopup(4)">&times;</span>
            <h2 class="heading"></h2>
            <p class="description"></p>
            <div class="buttons"></div>
        </div>
    </div>

    <!-- Popup 5 -->
    <div class="popup design5" id="popup5" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hidePopup(5)">&times;</span>
            <h2 class="heading"></h2>
            <p class="description"></p>
            <div class="buttons"></div>
        </div>
    </div>

    <!-- Admin Popup -->
    <div class="popup" id="admin-popup" style="display: none;">
        <div class="popup-content">
            <span class="close" onclick="hideAdminPopup()">&times;</span>
            <h2>Edit Popups</h2>
            <select id="popup-select">
                <option value="1">Popup 1</option>
                <option value="2">Popup 2</option>
                <option value="3">Popup 3</option>
                <option value="4">Popup 4</option>
                <option value="5">Popup 5</option>
            </select>
            <div id="edit-form" style="display: none;">
                <label>Design:
                    <select id="edit-design">
                        <option value="design1">Design 1</option>
                        <option value="design2">Design 2</option>
                        <option value="design3">Design 3</option>
                        <option value="design4">Design 4</option>
                        <option value="design5">Design 5</option>
                    </select>
                </label><br>
                <label>Heading: <input type="text" id="edit-heading"></label><br>
                <label>Description: <textarea id="edit-description"></textarea></label><br>
                <label>Color: <input type="text" id="edit-color" placeholder="#ffffff"></label><br>
                <label>Width: <input type="text" id="edit-width" placeholder="300px"></label><br>
                <label>Height: <input type="text" id="edit-height" placeholder="200px"></label><br>
                <label>Effects:
                    <label><input type="checkbox" id="effect-fadeIn"> Fade In</label>
                    <label><input type="checkbox" id="effect-slideDown"> Slide Down</label>
                </label><br>
                <label>Button 1 Text: <input type="text" id="edit-button1-text"></label><br>
                <label>Button 1 Action: <input type="text" id="edit-button1-action"></label><br>
                <label>Button 2 Text: <input type="text" id="edit-button2-text"></label><br>
                <label>Button 2 Action: <input type="text" id="edit-button2-action"></label><br>
                <button onclick="saveChanges()">Save</button>
            </div>
        </div>
    </div>

    <script>
        // Popup configurations
let popups = [
    {
        id: 1,
        design: 'design1',
        heading: 'Welcome',
        description: 'This is Popup 1.',
        buttons: [
            { text: 'OK', action: 'closePopup' },
            { text: 'Cancel', action: 'closePopup' }
        ],
        color: '#ffffff',
        size: { width: '300px', height: '200px' },
        effects: ['fadeIn']
    },
    {
        id: 2,
        design: 'design2',
        heading: 'Info',
        description: 'This is Popup 2.',
        buttons: [
            { text: 'Submit', action: 'submitData' },
            { text: 'Close', action: 'closePopup' }
        ],
        color: '#ffffff',
        size: { width: '350px', height: '250px' },
        effects: ['slideDown']
    },
    {
        id: 3,
        design: 'design3',
        heading: 'Alert',
        description: 'This is Popup 3.',
        buttons: [
            { text: 'Yes', action: 'confirmYes' },
            { text: 'No', action: 'closePopup' }
        ],
        color: '#4facfe',
        size: { width: '320px', height: '220px' },
        effects: ['fadeIn']
    },
    {
        id: 4,
        design: 'design4',
        heading: 'Notice',
        description: 'This is Popup 4.',
        buttons: [
            { text: 'Accept', action: 'accept' },
            { text: 'Decline', action: 'closePopup' }
        ],
        color: '#00f260',
        size: { width: '280px', height: '180px' },
        effects: ['slideDown']
    },
    {
        id: 5,
        design: 'design5',
        heading: 'Message',
        description: 'This is Popup 5.',
        buttons: [
            { text: 'Reply', action: 'reply' },
            { text: 'Dismiss', action: 'closePopup' }
        ],
        color: '#d4a5a5',
        size: { width: '310px', height: '210px' },
        effects: ['fadeIn']
    }
];

// Show a popup
function showPopup(id) {
    const popup = popups.find(p => p.id === id);
    if (popup) {
        const popupElement = document.getElementById(`popup${id}`);
        if (popupElement) {
            // Update content
            popupElement.querySelector('.heading').textContent = popup.heading;
            popupElement.querySelector('.description').textContent = popup.description;

            // Update buttons
            const buttonsDiv = popupElement.querySelector('.buttons');
            buttonsDiv.innerHTML = '';
            popup.buttons.forEach(btn => {
                const button = document.createElement('button');
                button.textContent = btn.text;
                button.onclick = function() {
                    if (btn.action === 'closePopup') {
                        hidePopup(id);
                    } else {
                        // Placeholder for backend action
                        console.log(`Button action triggered: ${btn.action}`);
                        // Example: Replace with AJAX call to backend
                        // fetch('/backend-endpoint', { method: 'POST', body: JSON.stringify({ action: btn.action }) });
                    }
                };
                buttonsDiv.appendChild(button);
            });

            // Apply styles
            popupElement.style.backgroundColor = popup.color;
            popupElement.style.width = popup.size.width;
            popupElement.style.height = popup.size.height;

            // Set design class
            popupElement.classList.remove('design1', 'design2', 'design3', 'design4', 'design5');
            popupElement.classList.add(popup.design);

            // Apply effects
            popupElement.classList.remove('fadeIn', 'slideDown');
            popupElement.classList.add(...popup.effects);

            // Display the popup
            popupElement.style.display = 'block';
        }
    }
}

// Hide a popup
function hidePopup(id) {
    const popupElement = document.getElementById(`popup${id}`);
    if (popupElement) {
        popupElement.style.display = 'none';
    }
}

// Show admin popup
function showAdminPopup() {
    document.getElementById('admin-popup').style.display = 'block';
}

// Hide admin popup
function hideAdminPopup() {
    document.getElementById('admin-popup').style.display = 'none';
}

// Populate edit form when a popup is selected
document.getElementById('popup-select').addEventListener('change', function() {
    const selectedId = parseInt(this.value);
    const popup = popups.find(p => p.id === selectedId);
    if (popup) {
        document.getElementById('edit-design').value = popup.design;
        document.getElementById('edit-heading').value = popup.heading;
        document.getElementById('edit-description').value = popup.description;
        document.getElementById('edit-color').value = popup.color;
        document.getElementById('edit-width').value = popup.size.width;
        document.getElementById('edit-height').value = popup.size.height;
        document.getElementById('effect-fadeIn').checked = popup.effects.includes('fadeIn');
        document.getElementById('effect-slideDown').checked = popup.effects.includes('slideDown');
        document.getElementById('edit-button1-text').value = popup.buttons[0].text;
        document.getElementById('edit-button1-action').value = popup.buttons[0].action;
        document.getElementById('edit-button2-text').value = popup.buttons[1].text;
        document.getElementById('edit-button2-action').value = popup.buttons[1].action;
        document.getElementById('edit-form').style.display = 'block';
    }
});

// Save changes to the selected popup
function saveChanges() {
    const selectedId = parseInt(document.getElementById('popup-select').value);
    const popup = popups.find(p => p.id === selectedId);
    if (popup) {
        popup.design = document.getElementById('edit-design').value;
        popup.heading = document.getElementById('edit-heading').value;
        popup.description = document.getElementById('edit-description').value;
        popup.color = document.getElementById('edit-color').value;
        popup.size.width = document.getElementById('edit-width').value;
        popup.size.height = document.getElementById('edit-height').value;

        // Save effects
        popup.effects = [];
        if (document.getElementById('effect-fadeIn').checked) {
            popup.effects.push('fadeIn');
        }
        if (document.getElementById('effect-slideDown').checked) {
            popup.effects.push('slideDown');
        }

        // Save buttons
        popup.buttons[0].text = document.getElementById('edit-button1-text').value;
        popup.buttons[0].action = document.getElementById('edit-button1-action').value;
        popup.buttons[1].text = document.getElementById('edit-button2-text').value;
        popup.buttons[1].action = document.getElementById('edit-button2-action').value;

        alert(`Changes saved for Popup ${selectedId}`);
        // Optionally, refresh the popup if it's open
        if (document.getElementById(`popup${selectedId}`).style.display === 'block') {
            showPopup(selectedId);
        }
    }
}
    </script>
</body>
</html>