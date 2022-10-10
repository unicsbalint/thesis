 const makeShortFileName = (fileName, extension) => {
    if(fileName.length > 8){
        return fileName.substring(0,8) + "..." + extension;
    }
    return extension === "folder" ? fileName : fileName+"."+extension;
 }

 const getExtensionIcon = (extension) => {
    const nonImageExtensions = ['folder','docx','pdf','docx','txt'];
    const imageExtensions = ['jpeg', 'png' , 'gif' , 'raw', 'svg' , 'heic', 'jpg'];
    if(nonImageExtensions.includes(extension)) return extension;
    if(imageExtensions.includes(extension)) return "image";
    return "unknown";
 }
 
 export const getCloudFileHTML = (file) => {
    const extensionIcon = getExtensionIcon(file.extension);
    const shortFileName = makeShortFileName(file.name, file.extension);
    return `
        <div
            class="cloudFile d-flex flex-column col-sm-3"
            data-extension="${file.extension}"
            data-size="${file.size}"
            data-path="${file.path}"
            data-lastModified="${file.lastModified}"
            title="${file.name}"
        >
            <div class="fileBox d-flex flex-column">
                <img class="fileIcon" src="images/extensions/${extensionIcon}.png">
                <div class="mt-auto border-top"> ${shortFileName} </div>                    
            </div>   
        </div>
    `;
}
