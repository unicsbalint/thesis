$( document ).ready(function() {

    const processOrder = [
        "#userName",
        "#homeName",
        "#userRegisterProcess"
    ];

    const fadeInSpeed = 2000;
    const fadeOutSpeed = 500;
    
    let processOrderState = 0;

    function loadProcess(){
        $(processOrder[processOrderState]).fadeIn(fadeInSpeed);
    }

    async function hidePreviousProcess(){
        $(processOrder[processOrderState]).fadeOut(fadeOutSpeed);
    }

    function loadPreviousProcess(){
        console.log("prev step")

        if(processOrderState === 0) return;
        processOrderState--;
        loadProcess();
    }
    function loadNextProcess(){
        console.log("next step")
        if(processOrderState === 2) return;
        processOrderState++;
        loadProcess();
    }

    function disableButtonsIfNeeded(){
        if(processOrderState == 0)
            $("#backBtn").fadeOut(fadeOutSpeed);
        else
            $("#backBtn").fadeIn(fadeInSpeed);
        
        if(processOrderState == 2)
            $("#nextBtn").fadeOut(fadeOutSpeed);
        else
            $("#nextBtn").fadeIn(fadeInSpeed);
        
    }

    $("#backBtn").click(function () { 
        hidePreviousProcess();
        loadPreviousProcess();
        disableButtonsIfNeeded();
    });

    $("#nextBtn").click(function () { 
        hidePreviousProcess();
        loadNextProcess();
        disableButtonsIfNeeded();
    });

    // init process startpoint
    loadProcess();
    disableButtonsIfNeeded();

});
