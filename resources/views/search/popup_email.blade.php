<div class="modal show" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('searchResultsSendEmail', ['id' => $searchRequest->id])}}"
                  method="post" class="send-to-email_form-js">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Отправить на почту</h5>
                    <button type="button" class="close modal-close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-inline emails-js">
                        <div class="form-group mb-2">
                            <input type="email" class="form-control" placeholder="Email" name="emails[]" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-email-js">
                        <span class="fas fa-plus"></span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Обработать</button>
                </div>
            </form>
        </div>
    </div>
</div>