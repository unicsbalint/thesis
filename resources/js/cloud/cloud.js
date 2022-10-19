import cloudMethod from './cloudMethod';
$(document).ready(function() {
    if(window.location.pathname === "/cloud"){
        const cloudMethods = new cloudMethod(".directoryData");

        const loadCloud = () => {
            let rootDirectoryData = cloudMethods.getRootDirectoryData();
            cloudMethods.displayDirectory(rootDirectoryData);
        }

        
        loadCloud();
        addEventListenerToCloudFiles();

        let locationHistory = ['/'];

        // A dinamikus generáltatás miatt az event listenereket is mindig hozzá kell adni vagy törölni kell.
        function addEventListenerToCloudFiles(){
            $(".cloudFile").click(function(){ 
                const fileData = $(this).data();
                if(fileData.extension == "folder"){
                    cloudMethods.setCloudLocation(fileData.path);
                    cloudMethods.openDirectory(fileData.path, addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
                    locationHistory.push(fileData.path);
                }
            });

            $(".download").click(function () {
                const fileData = $(this).parents().eq(2).data();
                cloudMethods.downloadFile(fileData);
            });

            $(".remove").click(function (){
                const fileData = $(this).data();
                cloudMethods.removeFile(fileData,  $(this).parents().eq(2));
            });
            
        }

        function removeEventListenerFromCloudFiles(){
            $('.cloudFile').unbind('click');
            $('.cloudFile').off('click');

            $('.download').unbind('click');
            $('.download').off('click');

            $('.remove').unbind('click');
            $('.remove').off('click');
        }

        $(".previousLocation").click(function() {
            if(locationHistory.length == 1){
                return;
            }
            const previousLocation = locationHistory[locationHistory.length - 2];
            if(previousLocation == '/'){
                removeEventListenerFromCloudFiles();
                loadCloud();
                addEventListenerToCloudFiles();
                locationHistory.pop();
            }
            else{
                cloudMethods.openDirectory(previousLocation, addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
                cloudMethods.setCloudLocation(previousLocation);
                locationHistory.pop();
            }
        });

        // Backspace-el vissza lehet ugrani az előző pozícióra.
        // $(document).keydown(function(e) {
        //     if(e.which == 8) {
        //         $(".previousLocation").trigger("click");
        //     }
        // });

        $(".upload").click(function () {
            cloudMethods.uploadFile(addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
        });

        function validateDirectoryName(directoryName) {
            var re = /^[^\s^\x00-\x1f\\?*:"";<>|\/.][^\x00-\x1f\\?*:"";<>|\/]*[^\s^\x00-\x1f\\?*:"";<>|\/.]+$/g;
            return re.test(directoryName);
        }

        $("#createDirectoryButton").click(function () {
            const directoryName = $("#directoryName").val();
            if(!validateDirectoryName(directoryName)){
                alert("Nem érvényes mappa név. Ne használj speciális karaktereket a mappa nevében.");
                return;
            }
            cloudMethods.createDirectory(directoryName, addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
        })

    }
});