import { showModal } from '../alertModal';
import { showLoader, hideLoader } from '../loader';
import { generateChart } from './chart'


$(document).ready(function() {
    if(window.location.pathname === "/statistics"){

        $(".getStatistics").click(function (e) { 
            const device = $(".deviceSelect").val();
            const deviceText = $(".deviceSelect option:selected").text();
            const interval = $(".intervalSelect").val();
            const intervalText = $(".intervalSelect option:selected").text();

            if(!device || !interval){
                showModal("Kérlek válassz eszközt és intervallumot.");
                return;
            }

            const requestData = {
                title: deviceText,
                subtitle: intervalText,
                yAxisTitleText: deviceText,
                tooltip: '<b> {point.y:.1f} </b>',
                seriesName: deviceText,
                data: getStatisticsData(device, interval)
            }

            if(requestData.data.length == 0){
                showModal("Nincs elérhető adat a kiválasztott eszközről és intervallumról.")
                return;
            }

            generateChart(requestData);
        });

        const getStatisticsData = (device, interval) => {
            let result = [];
            $.ajax({
                type: "GET",
                url: "/getStatistics",
                data: {
                    interval: interval,
                    device: device
                },
                async: false,
                success: function (response) {
                    result = response;
                }
            });
            return result;
        }

    }
});