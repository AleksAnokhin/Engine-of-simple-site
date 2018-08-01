$('div[data-target="target"]').fileupload({
    url: '/verdi/',
    route: 'dashboard/opera',
    sequentialUploads: true,
    type: 'POST',
    maxChunkSize: 100000000,
    autoUpload: true
}).bind('fileuploaddone',function(e, data){
    if (data.textStatus == 'success') {
        var result = JSON.parse(data.result);
        $('#filesList').append(result.response.message);
    }
}).bind('fileuploadchunkfail', function (e, data) {
    var result = JSON.parse(data.result);
    $('#filesList').html(result);
});

$('#validate').mouseover(function () {
    if ($('#indicator').val() == '') {
        $('#message').html("<span class='alert_custom'>Создайте композитора!</span>");
        setTimeout(function () {
            $('#message').html("");
        }, 1500)
    }
})
$(document).on({
    ajaxStart: function () {
        $("body").addClass("loading");
    },
    ajaxStop: function () {
        $("body").removeClass("loading");
    }
});

function createOpera() {
    var fs = new FormService('.opera-form');
    $('#newOperaModal').modal('hide');
    fs.submit(function (res) {
        setTimeout(function () {
            if (!res.response.error) {
                $('#operasPage').replaceWith(res.response.message);
            }
            $('#alertModal').find('.response-message').text(res.response.status);
            $('#alertModal').modal('show');
            $('[data-autocomplete]').each(function () {
                prepareAutocompletes.call(this);
            });
        }, 200)
    });
}

function deleteOpera(id) {
    $.ajax({
        data: {
            route: 'dashboard/opera',
            name: 'delete',
            id: id
        },
        success: function (res) {
            if (res) {
                res = JSON.parse(res);
                if (res.response) $('[data-opera=' + id + ']').remove();
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

function updateOpera() {
    var fs = new FormService('.opera-form');
    fs.submit(function (res) {
        $('#alertModal').find('.response-message').text(res.response.status);
        $('#alertModal').modal('show');
        $('[data-autocomplete]').each(function () {
            prepareAutocompletes.call(this);
        });
    });
}

function removeFile(id,filename, category) {
    $.ajax({
        data: {
            route: 'dashboard/opera',
            name: 'removeFile',
            id: id,
            filename: filename,
            category: category
        },
        success: function (res) {
            if (res) {
                res = JSON.parse(res);
                if (!res.response.error) {
                    //var $parent = $('[data-id=' + id + ']').closest('.list-group');
                    $('[data-id=' + id + ']').remove();
                    /*if ($parent.children('li').length == 0) {
                        $parent.append('<li class="list-group-item">Файлов нет</li>');
                    }*/
                } else {
                    $('#alertModal').find('.response-message').text(res.response.status);
                    $('#alertModal').modal('show');
                }
            }
        }
    });
}


