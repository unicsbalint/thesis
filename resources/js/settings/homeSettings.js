import { showModal } from '../alertModal';
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
                success: function (response) {
                    showModal(response)
                    setTimeout(function() {
                        location.reload();
                    }, 4000);
                },
                error: function(response) {
                    showModal(response);
                }
            });
        })

    }
});