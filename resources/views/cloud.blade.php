
@extends('layouts.app')
@section('content')

<div class="container text-center">
        <button class="previousLocation btn btn-light" data-back="/">Vissza</button>
        <div class="cloudLocation">/</div> 
        <div class="cloud">
            <div class="directoryData row">
                No data to display 
            </div>
        </div>

        <button class="uploadButton" data-bs-toggle="modal" data-bs-target="#uploadModal"></button>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Fájl feltöltése</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
             <input id="file" type="file" name="file" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" id="modalClose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success upload">Upload</button>
      </div>
    </div>
  </div>
</div>
@endsection
 