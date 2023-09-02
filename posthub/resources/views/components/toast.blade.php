<div wire:ignore>
  <div class="toast-container position-fixed top-0 end-0 px-3 pt-4 mt-5">
    <div id="toast" class="toast fade align-items-center border-0 px-2" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid" id="toast-icon"></i>
                    <div class="d-flex flex-column gap-0">
                        <span id="toast-title" class="fw-bold"></span>
                        <span id="toast-message"></span>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
  </div>
</div>
