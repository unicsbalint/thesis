import { showModal } from '../alertModal';
$(document).ready(function() {
    if(window.location.pathname === "/settings"){

        $("#backupBtn").click(function () {
            console.log($("#backupSelect").val());
            $.ajax({
                type: "POST",
                url: "/changeBackupInterval",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    backupInterval: $("#backupSelect").val()
                },
                success: function (response) {
                    showModal(response)
                },
                error: function(response) {
                    showModal(response);
                }
            });
        });

    }
});