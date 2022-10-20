export const showWebcamModal = () => {
    const webcamModal = new bootstrap.Modal(document.getElementById('webcamModal'))
    webcamModal.show()
}

export const refreshWebcamModal = () => {
    var container = document.getElementById("webcamModal");
    var content = container.innerHTML;
    container.innerHTML= content; 
}