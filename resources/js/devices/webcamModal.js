import { hideLoader } from '../loader';

export const showWebcamModal = () => {
    const webcamModal = new bootstrap.Modal(document.getElementById('webcamModal'))
    webcamModal.show()
    hideLoader();
}

export const refreshWebcamModal = () => {
    let container = document.getElementById("webcamModal");
    const content = container.innerHTML;
    container.innerHTML= content; 
}