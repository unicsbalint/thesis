function allowDrop(ev) {
    ev.preventDefault();
}
  
function drag(ev) {
  // Mikor drageljük a html egységet akkor eltüntetjük azt, gyerekét, szülőjét.
  if(!ev.target.classList.contains('cloudFile')){
      ev.target.parentElement.classList.add('hide');
  }
  else{
     ev.target.classList.add('hide');
  }

    const fileData = {
      path: ev.target.getAttribute('data-path'),
      extension: ev.target.getAttribute('data-extension')
    }
    if(fileData.extension == "folder") return;

    ev.dataTransfer.setData("fileData", fileData.path);
}
  
function drop(ev) {
    ev.preventDefault();

    const directoryData = {
      folderPath: ev.target.getAttribute('data-path'),
      extension: ev.target.getAttribute('data-extension')
    }

    if(directoryData.extension !== "folder"){
        alert("Csak mappába másolhatsz!");
        return;
    }

    const fileToMove = ev.dataTransfer.getData("fileData");   
    console.log(fileToMove)
    $.ajax({
      type: "POST",
      url: "/moveFile",
      data: {
        fileToMove: fileToMove,
        targetDirectory: directoryData.folderPath
      },
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      success: function (response) {
          $(`[data-path="${fileToMove}"]`).each(function(){
                $(this).remove();
          });
      }
    });
}

function endDrag(ev){
    if(!ev.srcElement.classList.contains('cloudFile')){
      ev.srcElement.parentElement.classList.remove('hide');
    }
    else{
      ev.srcElement.classList.remove('hide');
    }
  
}