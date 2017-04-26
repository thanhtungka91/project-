$(document).ready(function(){
    $(function () {
        'use strict';
        var url = 'http://localhost/admin/course/uploadfile';
        $('#thumbnail').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                alert('not done');
                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
});