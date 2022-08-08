$(".tester").click(function() {
    $.ajax({
        type: "POST",
        url: "/blinkled",
        data: "data",
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        success: function (response) {
            console.log(response);
        },

    });
})