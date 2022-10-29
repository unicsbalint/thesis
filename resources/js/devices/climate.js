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

        $(".automaticTemperatureSwitch").click(function () {
            disableManualSectionIfNeeded();
        });

        $(".setAutomaticTemperature").click(function() {
            const isTemperatureAutomatic = $(".automaticTemperatureSwitch").prop('checked');
            const isTemperatureValid = $(".targetTemperature").val() >= 15 && $(".targetTemperature").val() <= 35;
            if(isTemperatureAutomatic && isTemperatureValid){
                console.log("Hőmérsékelt beállítása")
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
        })
    }
});