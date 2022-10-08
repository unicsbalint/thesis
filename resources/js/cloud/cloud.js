import cloudMethod from './cloudMethod';
$( document ).ready(function() {
    if(window.location.pathname === "/cloud"){
        const cloudMethods = new cloudMethod();
        let rootDirectoryData = cloudMethods.getRootDirectoryData();
        


    }
});