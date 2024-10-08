<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Multi-Photo Upload Form</title>

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="{{ asset('css/sertifikat-test.css') }}" />
  </head>
  <body>
    <div class="container mt-5">
        <x-validasi.validasi></x-validasi.validasi>
      <h2 class="mb-4">Upload Certificates</h2>

    <form action="{{ $page_meta['url'] }}" method="POST" enctype="multipart/form-data">
        @method($page_meta['method'])
        @csrf
        <div id="photo-upload-container" class="d-flex flex-wrap border p-2 mb-3">
          <div id="drop-area">
            <p class="text-center">Drag & Drop Photos Here</p>
          </div>
        </div>

        <input type="file" name="file[]" id="photo-input" class="d-none" multiple accept="image/*,application/pdf"/>
        <button type="button" id="add-photo" class="btn btn-secondary mb-3">
          Add Photos
        </button>

         <!-- Modal for adding details -->
        <div class="modal fade" id="certificateDetailModal" tabindex="-1" aria-labelledby="certificateDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="certificateDetailModalLabel">
                    Detail Dokumen
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <img id="modal-image-preview" class="img-fluid mb-3" style="width: 100%; height: 300px; object-fit: cover; display: none;"/>
                <iframe id="modal-pdf-preview" class="w-100 mb-3" style="height: 300px; display: none" frameborder="0"></iframe>
                <div class="form-group mb-3">
                    <label for="jenis-dokumen">Jenis Dokumen</label> 
                    <select id="jenis-dokumen" class="form-select">
                    <option value="Kompetensi">Kompetensi</option>
                    <option value="Ijazah">Ijazah</option>
                    <option value="MCU">MCU</option>
                    <option value="Dokumen">Dokumen</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal-dokumen">Tanggal Berakhir</label>
                    <input type="date" id="tanggal-dokumen" class="form-control" />
                    <input type="checkbox" id="seumur-hidup" class="me-2"><label for="seumur-hidup">Seumur Hidup</label>
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi-dokumen">Deskripsi</label>
                    <textarea id="deskripsi-dokumen" class="form-control" rows="3" required></textarea>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="save-details">
                    Save Details
                </button>
                </div>
            </div>
            </div>
        </div>

            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        
    </form>
    
        </div>

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>

    <script src="{{ asset('js/sertifikatTest.js') }}"></script>
  </body>
</html>
