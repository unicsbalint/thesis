import { showModal } from '../alertModal'
import { showLoader , hideLoader } from '../loader';

$(document).ready(function() {
    if(window.location.pathname === "/devices"){

        $(".moodLightToggle").click(function() {
            const isLedTurnedOn = $(this).prop('checked');
            const color = $(this).data('color');

            if(isLedTurnedOn){
                turnOnMoodLightWithColor(color);
            }
            else{
                turnOffMoodLight();
            }
        });

        $(".colorPicker").click(function () {
            const isLedTurnedOn = $(".moodLightToggle").prop('checked');
            const colorClicked = $(this).data('color');
            if(isLedTurnedOn){
                turnOnMoodLightWithColor(colorClicked);
            }
            else{
                $(".moodLightToggle").data('color', colorClicked);
            }
        });

        $(".livingRoomLightToggle").click(function () {
            const isLedTurnedOn = $(this).prop('checked');
            if(isLedTurnedOn){
                toggleLivingRoomLight("on")
            }
            else{
                toggleLivingRoomLight("off") 
            }
        });
    }

    const toggleLivingRoomLight = (state) => {
        $.ajax({
            type: "POST",
            url: "/toggleLivingRoomLight",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {
                state: state
            },
            beforeSend: function (){
                showLoader();
            },
            error: function() {
                 showModal("Probléma lépett fel a lámpa lekapcsolása közben!")
            },
            complete: function() {
                hideLoader();
            }
        });
    }

    const turnOffMoodLight = () => {
        $.ajax({
            type: "POST",
            url: "/switchMoodLight",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {
                color: "turnoff"
            },
            beforeSend: function (){
                showLoader();
            },
            error: function() {
                 showModal("Probléma lépett fel a lámpa lekapcsolása közben!")
            },
            complete: function() {
                hideLoader();
            }
        });
    }

    const turnOnMoodLightWithColor = (color) => {
        $.ajax({
            type: "POST",
            url: "/switchMoodLight",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {
                color: color
            },
            beforeSend: function (){
                showLoader();
            },
            error: function() {
                showModal("Probléma lépett fel a lámpa felkapcsolása közben!")
            },
            complete: function() {
                hideLoader();
            }
        });
    }
});