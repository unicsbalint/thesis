import { getCloudFileHTML } from "./cloudFile";
export default class cloudMethod {
    constructor(cloudContainer){
        this.cloudContainer = cloudContainer;
    }
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
        return rootDirectoryData;
    }

    displayDirectory(directoryData){
        let htmlContent = "";
        directoryData.forEach(file => {
            htmlContent += getCloudFileHTML(file)
        });
        $(this.cloudContainer).html(htmlContent);
    }

    downloadFile(){

    }
}