<dialog id="deleteModale">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">@lang('lang.text_delete_modal')</h1>
            </div>
            <div class="modal-body">
                <p>@lang('lang.text_confirm')<span id="nom"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">@lang('lang.text_cancel')</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">@lang('lang.text_delete')</button>
                </form>
            </div>
        </div>
    </div>
</dialog>