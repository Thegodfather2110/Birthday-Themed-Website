
<head>

  <style>
    html, body {
      margin: 0;
      height: 100%;
      overflow: hidden;
      background: #000;
    }
    .background {
      width: 100%;
      height: 100%;
      position: relative;
    }
    canvas {
      display: block;
    }
    #fireworks-icon {
      position: fixed;
      bottom:90px;
      right: 20px;
      z-index: 3000;
      cursor: pointer;
      background: rgba(0, 0, 0, 0.6);
      padding: 8px;
      border-radius: 50%;
      transition: transform 0.3s;
    }
    #fireworks-icon .fw-icon {
      font-size: 36px;
      color: #fff;
    }
    #fireworks-icon .flame-icon {
      position: absolute;
      top: -4px;
      right: -4px;
      font-size: 18px;
      color: orange;
      display: none;
    }
    #fireworks-icon.active {
      animation: pulse 1s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>
  <div class="background"></div>
  
  <div id="fireworks-icon" title="Toggle Fireworks">
    <i class="material-icons fw-icon">local_fire_department</i>
    <span class="material-icons flame-icon">whatshot</span>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.5.0/dist/index.umd.js"></script>
  <script>
    const container = document.querySelector('.background');
    const scene = new THREE.Scene();
    
    const gradientTexture = new THREE.CanvasTexture(createGradientCanvas());
    scene.background = gradientTexture;
    
    const camera = new THREE.PerspectiveCamera(
      75,
      container.clientWidth / container.clientHeight,
      0.1,
      3000
    );
    camera.position.z = 20;
    
    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);
    
    const textureLoader = new THREE.TextureLoader();
    const starTexture = textureLoader.load('https://threejs.org/examples/textures/sprites/disc.png');
    
    const particles = 50000;
    const starGeometry = new THREE.BufferGeometry();
    const positions = new Float32Array(particles * 3);
    const colors = new Float32Array(particles * 3);
    
    for (let i = 0; i < particles; i++) {
      const x = (Math.random() - 0.5) * 2000;
      const y = (Math.random() - 0.5) * 2000;
      const z = (Math.random() - 0.5) * 2000;
      positions[i * 3] = x;
      positions[i * 3 + 1] = y;
      positions[i * 3 + 2] = z;
      
      const color = new THREE.Color(0xffffff);
      color.lerp(new THREE.Color(0x99ccff), Math.random());
      colors[i * 3] = color.r;
      colors[i * 3 + 1] = color.g;
      colors[i * 3 + 2] = color.b;
    }
    
    starGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    starGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    
    const starsMaterial = new THREE.PointsMaterial({
      size: 1.5,
      map: starTexture,
      vertexColors: true,
      transparent: true,
      blending: THREE.AdditiveBlending,
      depthWrite: false
    });
    
    const starField = new THREE.Points(starGeometry, starsMaterial);
    scene.add(starField);
    
    const ambientLight = new THREE.AmbientLight(0x222244);
    scene.add(ambientLight);
    
    const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
    directionalLight.position.set(10, 10, 10);
    scene.add(directionalLight);
    
    function createPlanet(radius, textureURL, position) {
      const texture = textureLoader.load(textureURL);
      const normalMap = textureLoader.load('https://threejs.org/examples/textures/water/Water_1_M_Normal.jpg');
      
      const planetMaterial = new THREE.MeshStandardMaterial({
        map: texture,
        normalMap: normalMap,
        metalness: 0.6,
        roughness: 0.2,
        emissive: 0x112244,
        emissiveIntensity: 0.5
      });
      
      const planetGeometry = new THREE.SphereGeometry(radius, 64, 64);
      const planet = new THREE.Mesh(planetGeometry, planetMaterial);
      planet.position.set(position.x, position.y, position.z);
      scene.add(planet);
      return planet;
    }
    
    const planet1 = createPlanet(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhpE11uDYvmt3bUk-hezCtRB-IB9BKAOeuWA&s', { x: -50, y: 0, z: -100 });
    const planet2 = createPlanet(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT94rbB4pNjSHRZ_YmGknAgRz4Z1EWwCtJAbw&s', { x: 50, y: 0, z: -100 });
    
    function createGradientCanvas() {
      const canvas = document.createElement('canvas');
      canvas.width = 256;
      canvas.height = 256;
      const ctx = canvas.getContext('2d');
      const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
      gradient.addColorStop(0, '#000');
      gradient.addColorStop(1, '#001133');
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      return canvas;
    }
    
    let mouseX = 0, mouseY = 0;
    document.addEventListener('mousemove', (event) => {
      mouseX = (event.clientX / window.innerWidth - 0.5) * 4;
      mouseY = (event.clientY / window.innerHeight - 0.5) * 4;
    });
    
    function animate() {
      requestAnimationFrame(animate);
      
      starField.rotation.y += 0.0002;
      starField.rotation.x += 0.0001;
      
      planet1.rotation.y += 0.001;
      planet2.rotation.y += 0.001;
      
      camera.position.x += (mouseX - camera.position.x) * 0.05;
      camera.position.y += (mouseY - camera.position.y) * 0.05;
      camera.lookAt(scene.position);
      
      renderer.render(scene, camera);
    }
    animate();
    
    window.addEventListener('resize', () => {
      camera.aspect = container.clientWidth / container.clientHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(container.clientWidth, container.clientHeight);
    });
    
    let fwInstance = null;
    let fwContainer = null;
    let fwSound = null;
    let fwTimeout = null;
    
    function toggleFireworks() {
      const fwIcon = document.getElementById('fireworks-icon');
      const flameIcon = fwIcon.querySelector('.flame-icon');
      if (fwInstance) {
        fwInstance.stop();
        fwInstance = null;
        if (fwSound) {
          fwSound.pause();
          fwSound.currentTime = 0;
          fwSound = null;
        }
        if (fwContainer) {
          fwContainer.parentElement.removeChild(fwContainer);
          fwContainer = null;
        }
        if (fwTimeout) {
          clearTimeout(fwTimeout);
          fwTimeout = null;
        }
        fwIcon.classList.remove('active');
        flameIcon.style.display = 'none';
      } else {
        fwContainer = document.createElement('div');
        fwContainer.id = 'fw-container';
        fwContainer.style.position = 'fixed';
        fwContainer.style.top = '0';
        fwContainer.style.left = '0';
        fwContainer.style.width = '100%';
        fwContainer.style.height = '100%';
        fwContainer.style.zIndex = '5000';
        document.body.appendChild(fwContainer);
        
        fwInstance = new Fireworks.Fireworks(fwContainer, {
          speed: 3,
          acceleration: 1.05,
          friction: 0.96,
          gravity: 1.3,
          particles: 200,
          trace: 3,
          explosion: 5,
          intensity: 30,
          autoresize: true,
          boundaries: {
            top: 0,
            bottom: fwContainer.clientHeight,
            left: 0,
            right: fwContainer.clientWidth,
          },
        });
        fwInstance.start();
        
        fwSound = new Audio('Assets/Contents/fireworks.mp3');
        fwSound.loop = true;
        fwSound.play();
        
        fwIcon.classList.add('active');
        flameIcon.style.display = 'block';
        
        fwTimeout = setTimeout(() => {
          toggleFireworks();
        }, 30000);
      }
    }
    
    document.getElementById('fireworks-icon').addEventListener('click', () => {
      toggleFireworks();
    });
  </script>
</body>
