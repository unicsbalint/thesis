$(document).ready(function() {
    if(window.location.pathname === "/devices"){
        $(".livingRoomLedToggle").click(function() {
            console.log($(this).prop('checked'))
        });
    }
});