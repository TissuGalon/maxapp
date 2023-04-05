<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#100DD1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
  <!-- Title -->
  <title>Maxapp</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="../img/icons/icon-72x72.png">
  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" href="../img/icons/icon-96x96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/icon-152x152.png">
  <link rel="apple-touch-icon" sizes="167x167" href="../img/icons/icon-167x167.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/icon-180x180.png">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/brands.min.css">
  <link rel="stylesheet" href="../css/solid.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/nice-select.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../style.css">
  <!-- Web App Manifest -->
  <link rel="manifest" href="../manifest.json">
  </head>
  <body>


    <!-- Preloader-->
    <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only"></div>
    </div>
  </div>




    <!-- <h1>Scan from WebCam:</h1> -->
    <div id="video-container">
      <video id="qr-video" style="width:100%; height:auto;"></video>
    </div>
    <div>
      <label style="display: none">
        Highlight Style
        <select id="scan-region-highlight-style-select">
          <option value="default-style">Default style</option>
          <option value="example-style-1">Example custom style 1</option>
          <option value="example-style-2">Example custom style 2</option>
        </select>
      </label>
      <label style="display: none">
        <input id="show-scan-region" type="checkbox" />
        Show scan region canvas
      </label>
    </div>
    <div style="display: none">
      <select id="inversion-mode-select">
        <option value="original">
          Scan original (dark QR code on bright background)
        </option>
        <option value="invert">
          Scan with inverted colors (bright QR code on dark background)
        </option>
        <option value="both" selected>Scan both</option>
      </select>
      <br />
    </div>
    <b style="display: none">Device has camera: </b>
    <span id="cam-has-camera" style="display: none"></span>
    <br />
    <div style="display: none">
      <b>Preferred camera:</b>
      <select id="cam-list">
        <option value="environment" selected>
          Environment Facing (default)
        </option>
        <option value="user">User Facing</option>
      </select>
    </div>
    <b style="display: none">Camera has flash: </b>
    <span id="cam-has-flash" style="display: none"></span>
    <div class="text-end container">
      <a href="index.php" class="btn btn-light me-5"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
      <button id="flash-toggle" class="btn btn-warning text-light">
        📸 Flash: <span id="flash-state">off</span>
      </button>
      <button id="start-button" class="btn btn-primary">Start</button>
    <button id="stop-button" class="btn btn-danger">Stop</button>
    </div>
    <br />
    <b>Detected QR code: </b>
    <span id="cam-qr-result">None</span>
    <br />
    <!-- <b>Last detected at: </b> -->
    <span id="cam-qr-result-timestamp"></span>
    <br />
    

    <!--<script src="../qr-scanner.umd.min.js"></script>-->
    <!--<script src="../qr-scanner.legacy.min.js"></script>-->
    <script type="module">
      import QrScanner from "./qrscanner/qr-scanner.min.js";

      const video = document.getElementById("qr-video");
      const videoContainer = document.getElementById("video-container");
      const camHasCamera = document.getElementById("cam-has-camera");
      const camList = document.getElementById("cam-list");
      const camHasFlash = document.getElementById("cam-has-flash");
      const flashToggle = document.getElementById("flash-toggle");
      const flashState = document.getElementById("flash-state");
      const camQrResult = document.getElementById("cam-qr-result");
      const camQrResultTimestamp = document.getElementById(
        "cam-qr-result-timestamp"
      );
      const fileSelector = document.getElementById("file-selector");
      const fileQrResult = document.getElementById("file-qr-result");

      function setResult(label, result) {
        console.log(result.data);
        /* -------------DISINI-------------- */
        scanner.stop();
        window.location.href="topup_user.php?id="+result.data;
        label.textContent = result.data;
        camQrResultTimestamp.textContent = new Date().toString();
        label.style.color = "teal";
        clearTimeout(label.highlightTimeout);
        label.highlightTimeout = setTimeout(
          () => (label.style.color = "inherit"),
          100
        );
      }

      // ####### Web Cam Scanning #######

      const scanner = new QrScanner(
        video,
        (result) => setResult(camQrResult, result),
        {
          onDecodeError: (error) => {
            camQrResult.textContent = error;
            camQrResult.style.color = "inherit";
          },
          highlightScanRegion: true,
          highlightCodeOutline: true,
        }
      );

      const updateFlashAvailability = () => {
        scanner.hasFlash().then((hasFlash) => {
          camHasFlash.textContent = hasFlash;
          flashToggle.style.display = hasFlash ? "inline-block" : "none";
        });
      };

      scanner.start().then(() => {
        updateFlashAvailability();
        // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
        // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
        // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
        // start the scanner earlier.
        QrScanner.listCameras(true).then((cameras) =>
          cameras.forEach((camera) => {
            const option = document.createElement("option");
            option.value = camera.id;
            option.text = camera.label;
            camList.add(option);
          })
        );
      });

      QrScanner.hasCamera().then(
        (hasCamera) => (camHasCamera.textContent = hasCamera)
      );

      // for debugging
      window.scanner = scanner;

      document
        .getElementById("scan-region-highlight-style-select")
        .addEventListener("change", (e) => {
          videoContainer.className = e.target.value;
          scanner._updateOverlay(); // reposition the highlight because style 2 sets position: relative
        });

      document
        .getElementById("show-scan-region")
        .addEventListener("change", (e) => {
          const input = e.target;
          const label = input.parentNode;
          label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
          scanner.$canvas.style.display = input.checked ? "block" : "none";
        });

      document
        .getElementById("inversion-mode-select")
        .addEventListener("change", (event) => {
          scanner.setInversionMode(event.target.value);
        });

      camList.addEventListener("change", (event) => {
        scanner.setCamera(event.target.value).then(updateFlashAvailability);
      });

      flashToggle.addEventListener("click", () => {
        scanner
          .toggleFlash()
          .then(
            () => (flashState.textContent = scanner.isFlashOn() ? "on" : "off")
          );
      });

      document.getElementById("start-button").addEventListener("click", () => {
        scanner.start();
      });

      document.getElementById("stop-button").addEventListener("click", () => {
        scanner.stop();
      });

      // ####### File Scanning #######

      fileSelector.addEventListener("change", (event) => {
        const file = fileSelector.files[0];
        if (!file) {
          return;
        }
        QrScanner.scanImage(file, { returnDetailedScanResult: true })
          .then((result) => setResult(fileQrResult, result))
          .catch((e) =>
            setResult(fileQrResult, { data: e || "No QR code found." })
          );
      });
    </script>

    <style>
      div {
        margin-bottom: 16px;
      }

      #video-container {
        line-height: 0;
      }

      #video-container.example-style-1 .scan-region-highlight-svg,
      #video-container.example-style-1 .code-outline-highlight {
        stroke: #64a2f3 !important;
      }

      #video-container.example-style-2 {
        position: relative;
        width: max-content;
        height: max-content;
        overflow: hidden;
      }
      #video-container.example-style-2 .scan-region-highlight {
        border-radius: 30px;
        outline: rgba(0, 0, 0, 0.25) solid 50vmax;
      }
      #video-container.example-style-2 .scan-region-highlight-svg {
        display: none;
      }
      #video-container.example-style-2 .code-outline-highlight {
        stroke: rgba(255, 255, 255, 0.5) !important;
        stroke-width: 15 !important;
        stroke-dasharray: none !important;
      }

      #flash-toggle {
        display: none;
      }

      hr {
        margin-top: 32px;
      }
      input[type="file"] {
        display: block;
        margin-bottom: 16px;
      }
    </style>


<!-- Internet Connection Status-->
<div class="internet-connection-status" id="internetStatus"></div>


<!-- All JavaScript Files-->
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/waypoints.min.js"></script>
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/jquery.counterup.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.passwordstrength.js"></script>
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/theme-switching.js"></script>
<script src="../js/no-internet.js"></script>
<script src="../js/active.js"></script>
<script src="../js/pwa.js"></script>

  </body>
</html>
