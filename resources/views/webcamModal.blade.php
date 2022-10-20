<div class="modal fade" id="webcamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Biztonsági kamera jelenlegi képe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="webcamContainer">
                <iframe scrolling="no" src="http://{{ Request::getHost() }}:9998/index.html" class="webcamImage">
                </iframe>
            </div>

              <div id="webcamModalMessage"></div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-success takePictureInModal">Kép készítése 📷</button>
        <button type="button" id="modalClose" class="btn btn-danger" data-bs-dismiss="modal">Bezárás</button>
      </div>
    </div>
  </div>
</div>