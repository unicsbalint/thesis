export const showModal = (message) => {
    const statusModal = new bootstrap.Modal(document.getElementById('statusModal'))
    statusModal.show()
    $("#statusModalMessage").html(message);
}