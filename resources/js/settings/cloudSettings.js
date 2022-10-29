import { showModal } from '../alertModal';
import { showLoader, hideLoader } from '../loader';

$(document).ready(function() {
    if(window.location.pathname === "/settings"){

        $("#backupBtn").click(function () {
            $.ajax({
                type: "POST",
                url: "/changeBackupInterval",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    backupInterval: $("#backupSelect").val()
                },
                beforeSend: () => showLoader(),
                success: function (response) {
                    showModal(response)
                },
                error: function(response) {
                    showModal(response);
                },
                complete: () => hideLoader()
            });
        });

    }
});