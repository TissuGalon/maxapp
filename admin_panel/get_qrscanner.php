<div id="canvas">

    <!-- <h1>Scan from WebCam:</h1> -->
    <div id="video-container">
        <video id="qr-video" style="width: 100%; height: auto;"></video>
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
    <div>
        <b>Gunakan camera:</b>
        <select id="cam-list" class="form-control">
            <option value="environment" selected>
                Environment Facing (default)
            </option>
            <option value="user">User Facing</option>
        </select>
    </div>

    <div style="display:none;">
        <b>Detected QR code: </b>
        <span id="cam-qr-result">None</span>
    </div>

    <br />


    <b style="display: none">Camera has flash: </b>
    <span id="cam-has-flash" style="display: none"></span>
    <div>
        <button id="flash-toggle" class="btn btn-outline-primary">
            📸 Flash: <span id="flash-state">off</span>
        </button>
        <div class="float-right">
            <button id="start-button" class="btn btn-outline-primary">Start</button>
            <button id="stop-button" class="btn btn-outline-danger">Stop</button>
        </div>

    </div>

    <!-- <b>Last detected at: </b> -->
    <span id="cam-qr-result-timestamp"></span>
    <br />


</div>




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
        scanner.stop();

        /* Swal.fire('data :' + String(result.data)); */

        let cek = scanmeja(String(result.data));
        if (cek) {


            Swal.fire({
                title: 'Meja No : ' + String(sessionStorage.getItem("nomeja")),
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'Ok',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    (async function inputnm() {

                        const { value: nama } = await Swal.fire({
                            title: 'Masukkan Nama',
                            input: 'text',
                            inputLabel: 'Nama Pemesan',
                            inputPlaceholder: 'Nama Anda',
                        });

                        if (nama) {
                            Swal.fire(`Hai ${nama} !`, `Silahkan melakukan pemesanan`);
                            if (nama == null || nama == '') {
                                document.getElementById("pemesan").innerHTML = null;
                                sessionStorage.setItem("pemesan", null);
                            } else {
                                document.getElementById("pemesan").innerHTML = nama;
                                sessionStorage.setItem("pemesan", nama);
                            }
                        } else {
                            Swal.fire({
                                title: 'Info', text: 'Nama tidak boleh kosong', icon: 'info', confirmButtonText: 'Ok', showDenyButton: false,
                                showCancelButton: false, showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    inputnm();
                                } else {
                                    inputnm();
                                }
                                ;

                            })
                        }

                    })()

                } else if (result.isDenied) {
                    Swal.fire('Masukkan nama anda untuk memesan', '', 'info')
                }
            })






        } else {
            Swal.fire('QR Tidak Valid');
        }

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


    scanner.stop();


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