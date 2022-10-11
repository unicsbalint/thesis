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

    openDirectory(path, addEventListeners, removeEventListeners){
        removeEventListeners();

        let directory = "";
        $.ajax({
            type: "GET",
            async: false,
            data: {
                directory: path
            },
            url: "/getCloudFiles",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                directory = response;
            },
            error: function (response){
                console.error(response);
            }
        });

        this.displayDirectory(directory)

        addEventListeners();
    }

    downloadFile(fileData){
        window.location = "/downloadFile?path="+fileData.path;             
    }

    setCloudLocation(location){
        $(".cloudLocation").text(location);
    }

    setPreviousLocation(){

    }

}