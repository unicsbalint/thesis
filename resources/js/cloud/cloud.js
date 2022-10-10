import cloudMethod from './cloudMethod';
$(document).ready(function() {
    if(window.location.pathname === "/cloud"){

        const cloudMethods = new cloudMethod(".directoryData");

        const loadCloud = () => {
            let rootDirectoryData = cloudMethods.getRootDirectoryData();
            cloudMethods.displayDirectory(rootDirectoryData);
        }
        
        loadCloud();
    }
});