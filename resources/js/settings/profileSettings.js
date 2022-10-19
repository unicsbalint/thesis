import { showModal } from '../alertModal';
$(document).ready(function() {
    if(window.location.pathname === "/settings"){

        const isGivenDetailsValid = (details) => {
            if(details.newPassword !== details.newPasswordConfirm){
                showModal("A két jelszó nem egyezik.");
                return false;
            }
            else if(details.newPassword.length < 6){
                showModal("Az új jelszó nem elég hosszú.");
                return false;
            }
            else if(details.oldPassword.length === 0){
                showModal("Kérlek add meg a régi jelszót.");
                return false;
            }
            return true;
        }

        $("#changePassword").click(function () {
            const oldPassword = $("#oldPassword").val();
            const newPassword = $("#newPassword").val();
            const newPasswordConfirm = $("#newPasswordConfirm").val();

            if(isGivenDetailsValid({oldPassword, newPassword, newPasswordConfirm})){
                $.ajax({
                    type: "POST",
                    url: "/changePassword",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        oldPassword: oldPassword,
                        newPassword: newPassword,
                        newPasswordConfirm: newPasswordConfirm
                    },
                    success: function (response) {
                        showModal(response);
                        $("#oldPassword").val("");
                        $("#newPassword").val("");
                        $("#newPasswordConfirm").val("");

                    },
                    error: function(response) {
                        showModal(response.responseJSON.message);
                    }
                });
            }
        });

    }
});