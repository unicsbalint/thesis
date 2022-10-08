export default class cloudMethod {
    getRootDirectoryData(){
        let rootDirectoryData = [];
        $.ajax({
            type: "GET",
            async: false,
            url: "/getCloudFiles",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                rootDirectoryData = response;
            },
            error: function (response){
                console.error(response);
            }
            
        });
    }
}