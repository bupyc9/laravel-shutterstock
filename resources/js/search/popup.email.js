$(function () {
    $('.send-to-email-js').magnificPopup({
        type: 'ajax'
    });

    $('body')
        .on('submit', '.send-to-email_form-js', function (e) {
            e.preventDefault();

            let $self = $(this);
            let sending = $self.data('sending');

            if (sending) {
                return;
            }



            $self.data('sending', true);
            $.ajax({
                url: $self.attr('action'),
                data: $self.serialize(),
                dataType: 'json',
                type: $self.attr('method'),
                success: function () {
                    $self.data('sending', false);
                    $self.find('.modal-body').html('Сообщения успешно отправлены');
                    $self.find('.modal-footer').remove();
                },
                error: function () {
                    $self.data('sending', false);
                }
            });
        })
        .on('click', '.modal-close', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        })
        .on('click', '.add-email-js', function (e) {
            e.preventDefault();

            let html = '<div class="form-group mb-2">\n' +
                '<input type="emails" class="form-control" placeholder="Email" name="email[]" required>\n' +
                '<button class="btn btn-danger ml-2 delete-email-js">\n' +
                '<span class="fas fa-minus"></span>\n' +
                '</button>\n' +
                '</div>';

            $('.emails-js').append(html);
        })
        .on('click', '.delete-email-js', function (e) {
            e.preventDefault();

            $(this).parent().remove();
        })
    ;
});