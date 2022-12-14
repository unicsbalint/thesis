import { getCloudFileHTML } from "./cloudFile";
import { showLoader, hideLoader } from "../loader";
export default class cloudMethod {
    constructor(cloudContainer){
        this.cloudContainer = cloudContainer;
        this.cloudLocation = "/";
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

        let directory = [];
        if(this.cloudLocation !== "/"){
            directory = [{
                name: "\\",
                extension: "folder",
                path: "/"
            }];
        }
            

        $.ajax({
            type: "GET",
            async: false,
            data: {
                directory: path
            },
            url: "/getCloudFiles",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                directory = [...directory,...response]
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

    removeFile(fileData, object){
        $.ajax({
            type: "POST",
            url: "/removeFile",
            async: false,
            data: {
                path: fileData.path
            },
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                object.remove();
            }
        });
    }

    uploadFile(addEventListeners, removeEventListeners){
        if(!$('#file')[0].files[0]) return;
        showLoader();
        const formData = new FormData();
        formData.append('file', $('#file')[0].files[0]);
        formData.append('path', this.cloudLocation)

        const thisClass = this;
        $.ajax({
            url : '/uploadFile',
            type : 'POST',
            data : formData,
            processData: false,
            contentType: false,
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success : function() {
                $("#file").val("");
                $(".modalClose").trigger("click");
                thisClass.openDirectory(thisClass.cloudLocation, addEventListeners, removeEventListeners)
                hideLoader();
            },
            error: function() {
                hideLoader();
            },
            complete: function() {
                hideLoader();
                $(".modalClose").trigger("click");
            }
        });
    }

    createDirectory(directoryName, addEventListeners, removeEventListeners){
        const thisClass = this;

        $.ajax({
            type: "POST",
            url: "/createDirectory",
            async: false,
            data: {
                path: this.cloudLocation + "/" + directoryName
            },
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                $("#directoryName").val("");
                $("#directoryModalClose").trigger("click");
                thisClass.openDirectory(thisClass.cloudLocation, addEventListeners, removeEventListeners)
            }
        });
    }

    setCloudLocation(location){
        this.cloudLocation = location;
        $(".cloudLocation").text(location);
    }
}