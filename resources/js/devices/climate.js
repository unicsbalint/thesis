import { showModal } from '../alertModal';
import { showLoader , hideLoader } from '../loader';

$(document).ready(function() {
    if(window.location.pathname === "/devices"){
        
        const disableManualSectionIfNeeded = () => {
            const isTemperatureAutomatic = $(".automaticTemperatureSwitch").prop('checked');
            if(isTemperatureAutomatic){
                $(".manualTemperatureSection").addClass("notAvailable");
                $(".manualClimate").attr("disabled","disabled");
                $(".manualHeater").attr("disabled","disabled");
            }
            else{
                $(".manualTemperatureSection").removeClass("notAvailable");
                $(".manualClimate").removeAttr("disabled");
                $(".manualHeater").removeAttr("disabled");
            }
        }

        disableManualSectionIfNeeded();

        if(!$(".automaticTemperatureSwitch").prop('checked')){
            $(".setAutomaticTemperature").attr("disabled","disabled"); 
        }

        $(".automaticTemperatureSwitch").click(function () {
            disableManualSectionIfNeeded();

            const isClimateAutomatic = $(".automaticTemperatureSwitch").prop('checked');

            if(isClimateAutomatic){
                $(".setAutomaticTemperature").removeAttr("disabled"); 
            }
            else{
                $(".setAutomaticTemperature").attr("disabled","disabled"); 
            }
            
            if(!isClimateAutomatic){
                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: "/toggleAutoClimate",
                    data: {
                        state: 0
                    },
                    beforeSend: () => showLoader(),
                    complete: () => hideLoader()
                });
            }
        });
        

        $(".setAutomaticTemperature").click(function() {
            const isTemperatureAutomatic = $(".automaticTemperatureSwitch").prop('checked');
            const isTemperatureValid = $(".targetTemperature").val() >= 15 && $(".targetTemperature").val() <= 35;
            if(isTemperatureAutomatic && isTemperatureValid){
                $.ajax({
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: "/toggleAutoClimate",
                    data: {
                        state: $(".targetTemperature").val()
                    },
                    beforeSend: () => showLoader(),
                    success: function (response) {
                        // isCooling ? showModal("A klíma beindult.") : showModal("A klíma leállt.")
                    },
                    complete: () => hideLoader()
                });
            }
            else{
                showModal("Kérem kapcsolja be az automatikus beállítás funkciót és állítsa be a kívánt értéket 15 és 35 között.")
            }
        })

        $(".targetTemperature").on('input', function(){
            const validNumber = new RegExp(/^\d*\.?\d*$/);
            if(validNumber.test($(this).val())){
                $(this).removeClass('notNumber');
            }
            else{
                $(this).addClass('notNumber');
                let slicedText = $(this).val().slice(0, -1);
                // text.slice(0, -1)
                $(this).val(slicedText)
            } 
        });

        $(".manualClimate").click(function() {
            const isCooling = $(this).prop('checked');

            if(isCooling){
                $(".manualHeater").attr("disabled","disabled");
                $(".setAutomaticTemperature").attr("disabled","disabled");
                $(".targetTemperature").attr("disabled","disabled");
                $(".automaticTemperatureSwitch").attr("disabled","disabled");
                $(".automaticTemperatureSection").addClass("notAvailable");
            }
            else{
                $(".automaticTemperatureSection").removeClass("notAvailable");
                $(".manualHeater").removeAttr("disabled");
                $(".setAutomaticTemperature").removeAttr("disabled");
                $(".automaticTemperatureSwitch").removeAttr("disabled");
                $(".targetTemperature").removeAttr("disabled");
            }

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/toggleCooling",
                data: {
                    state: isCooling ? "on" : "off"
                },
                beforeSend: () => showLoader(),
                complete: () => hideLoader()
            });

        });

        $(".manualHeater").click(function() {
            const isHeating = $(this).prop('checked');
            if(isHeating){
                $(".manualClimate").attr("disabled","disabled");
                $(".setAutomaticTemperature").attr("disabled","disabled");
                $(".targetTemperature").attr("disabled","disabled");
                $(".automaticTemperatureSection").addClass("notAvailable");
            }
            else{
                $(".manualClimate").removeAttr("disabled");
                $(".setAutomaticTemperature").removeAttr("disabled");
                $(".targetTemperature").removeAttr("disabled");
                $(".automaticTemperatureSection").removeClass("notAvailable");
            }
            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "/toggleHeating",
                data: {
                    state: isHeating ? "on" : "off"
                },
                beforeSend: () => showLoader(),
                success: function (response) {
                    // isHeating ? showModal("A fűtés beindult.") : showModal("A fűtés leállt.")
                },
                complete: () => hideLoader()
            });
        });


    }
});