$( document ).ready(function() {

    $(".initWrapper").fadeIn(2000);

    const processOrder = [
        "#userName",
        "#homeName",
        "#userRegisterProcess"
    ];

    let userName = "";
    let homeName = "";

    const fadeInSpeed = 2000;
    const fadeOutSpeed = 0;
    
    let processOrderState = 0;

    function loadProcess(){
        $(processOrder[processOrderState]).fadeIn(fadeInSpeed);
    }

    function hidePreviousProcess(){
        $(processOrder[processOrderState]).hide();
    }

    function isInputDataVaild(){
        return $(processOrder[processOrderState] + " input").val().length >= 3;
    }

    function loadPreviousProcess(){
        if(processOrderState === 0) return;
        processOrderState--;
        loadProcess();
    }
    function loadNextProcess(){
        if(processOrderState === 2) return;
        processOrderState++;
        loadProcess();
    }

    function disableButtonsIfNeeded(){
        if(processOrderState == 0)
            $("#backBtn").hide();
        else
            $("#backBtn").fadeIn(fadeInSpeed);
        
        if(processOrderState == 2)
            $("#nextBtn").hide();
        else
            $("#nextBtn").fadeIn(fadeInSpeed);
        
    }

    $("#backBtn").click(function () { 
        hidePreviousProcess();
        loadPreviousProcess();
        disableButtonsIfNeeded();
    });

    $("#nextBtn").click(function () { 
        if(!isInputDataVaild()){
            alert("Kérlek adj meg egy legalább 3 karakter hosszú karakterláncot névnek.");
            return;
        }
        hidePreviousProcess();
        loadNextProcess();
        disableButtonsIfNeeded();
    });

    // init process startpoint
    loadProcess();
    disableButtonsIfNeeded();

    // Input handlers

    $("#userName input").change(function() {
        userName = $(this).val();
        $("#userNameInput").val(userName);
    });

    $("#homeName input").change(function() {
        homeName = $(this).val();
        $("#homeNameInput").val(homeName);
    });


    function getRegisterFormData(){
        return {
            'name': userName,
            'homeName': homeName,
            'email': $("input[name=email]").val(),
            'password': $("input[name=password]").val(),
            'password_confirmation': $("input[name=password_confirmation]").val()
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validateRegisterForm(formData){
        if(formData.password !== formData.password_confirmation){
            return [false, 'A két jelszó nem egyezik.'];
        }
        else if(formData.password.length < 8){
            return [false, 'A jelszónak legalább 8 karakter hosszúnak kell lennie.'];
        }
        else if(!validateEmail(formData.email)) {
            return [false, 'Helytelen e-mail'];
        }

        return [true, 'Nincs hiba'];
    }

    $("#finalize").click(function() {
        let formData = getRegisterFormData();
        let formValidationResult = validateRegisterForm(formData);
        let isFormDataValid = formValidationResult[0];

        if(isFormDataValid){
            $.ajax({
                type: "POST",
                url: "/register",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function (response) {
                    location.reload();
                },
                error: function(response){
                    alert("Az e-mail cím már foglalt.")
                }
            });
        }
        else{
            alert(formValidationResult[1]);
        }
    } );


});
