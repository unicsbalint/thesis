import { showModal } from '../alertModal';
import { showLoader, hideLoader } from '../loader';
$(document).ready(function() {
    if(window.location.pathname === "/settings"){
        $("#changeHomeName").click(function () {
            const newHomeName = $("#newHomeName").val();

            if(newHomeName.length < 3){
                showModal("Legalább 3 karakter hosszú nevet adj meg.")
                return;
            }

            $.ajax({
                type: "POST",
                url: "/changeHomename",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    homeName: newHomeName
                },
                beforeSend: () => showLoader(),
                success: function (response) {
                    showModal(response)
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                },
                error: function(response) {
                    showModal(response);
                },
                complete: () => hideLoader()
            });
        })

    }

    $("#sensorSelectBtn").click(function () {
        $.ajax({
            type: "POST",
            url: "/changeSensorDisplayed",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {
                selectedSensor: $("#sensorSelect").val()
            },
            beforeSend: () => showLoader(),
            success: function (response) {
                showModal(response)
                setTimeout(function() {
                    location.reload();
                }, 3000);
            },
            error: function(response) {
                showModal(response);
            },
            complete: () => hideLoader()
            
        });
    });
});