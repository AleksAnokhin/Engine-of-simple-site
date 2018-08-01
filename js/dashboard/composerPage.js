function deleteComposer(id) {
    $.ajax({
        data: {
            route: 'dashboard/composer',
            name: 'delete',
            id: id
        },
        success: function (res) {
            if (res) {
                res = JSON.parse(res);
                if (res.response) $('[data-composer=' + id + ']').remove();
            } else {
                $('#alertModal').find('.response-message').text(res.response.status);
                $('#alertModal').modal('show');
                $('[data-autocomplete]').each(function () {
                    prepareAutocompletes.call(this);
                });
            }
        }
    })
}
function createComposer() {
    var fs = new FormService('.new-composer-form');
    $('#newComposerModal').modal('hide');
    fs.submit(function (res) {
        setTimeout(function () {
            if (!res.response.error) {
                $('#composersPage').replaceWith(res.response.message);
            }
            $('#alertModal').find('.response-message').text(res.response.status);
            $('#alertModal').modal('show');
            $('[data-autocomplete]').each(function () {
                prepareAutocompletes.call(this);
            });
        }, 200)
    });
}
function updateComposer() {
    var fs = new FormService('.edit-composer-form');
    fs.submit(function (res) {
        $('#alertModal').find('.response-message').text(res.response.status);
        $('#alertModal').modal('show');
        $('[data-autocomplete]').each(function () {
            prepareAutocompletes.call(this);
        })
    });
}