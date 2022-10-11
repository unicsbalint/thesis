import cloudMethod from './cloudMethod';
$(document).ready(function() {
    if(window.location.pathname === "/cloud"){

        const cloudMethods = new cloudMethod(".directoryData");

        const loadCloud = () => {
            let rootDirectoryData = cloudMethods.getRootDirectoryData();
            cloudMethods.displayDirectory(rootDirectoryData);
        }

        let locationHistory = ['/'];
        
        loadCloud();
        addEventListenerToCloudFiles();

        // A dinamikus generáltatás miatt az event listenereket is mindig hozzá kell adni vagy törölni kell.
        function addEventListenerToCloudFiles(){
            $(".cloudFile").click(function(){ 
                const fileData = $(this).data();
                if(fileData.extension == "folder"){
                    cloudMethods.openDirectory(fileData.path, addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
                    cloudMethods.setCloudLocation(fileData.path);
                    locationHistory.push(fileData.path);
                }
                else{
                    cloudMethods.downloadFile(fileData);
                }
            });
        }

        function removeEventListenerFromCloudFiles(){
            $('.cloudFile').unbind('click');
            $('.cloudFile').off('click');
        }

        $(".previousLocation").click(function() {
            const previousLocation = locationHistory[locationHistory.length-1];

            if(previousLocation == '/'){
                removeEventListenerFromCloudFiles();
                loadCloud();
                addEventListenerToCloudFiles();
            }
            else{
                cloudMethods.openDirectory(previousLocation, addEventListenerToCloudFiles, removeEventListenerFromCloudFiles);
                cloudMethods.setCloudLocation(previousLocation);
                locationHistory.pop();
            }
            cloudMethods.setCloudLocation(previousLocation);
        });


    }
});