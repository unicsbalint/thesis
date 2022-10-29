import { showWebcamModal, refreshWebcamModal } from './webcamModal';
import { showModal } from '../alertModal';
import { showLoader , hideLoader } from '../loader';

$(document).ready(function() {
    if(window.location.pathname === "/devices"){

        $("#openStream").click(function () {
            showLoader();
            $.ajax({
                type: "POST",
                keepalive: true,
                url: "/startWebcamServer",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            });

            setTimeout(() => refreshWebcamModal(), 1000);
            setTimeout(() => showWebcamModal(), 2000);
        });
        
        const webcamOnClose = document.getElementById('webcamModal')
        webcamOnClose.addEventListener('hidden.bs.modal', function (event) {
            $.ajax({
                type: "POST",
                url: "/stopWebcamServer",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
            });
        });

        const takePicture = () => {
            showLoader();
            $.ajax({
                type: "POST",
                url: "/takePicture",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function() {
                    showModal("A képet elhelyeztük a felhőtárhelyed gyökérkönyvtárába!")
                },
                error: function() {
                    showModal("Jelenleg használatban van a kamera! Kapcsold ki a streaming szolgáltatást.")
                },
                complete: function() {
                    hideLoader();
                }
            });
        }

        $(".takePicture").click(function () {
            takePicture();
        });
    }
});