var total_photos_counter = 0;
Dropzone.options.myDropzone = {
    uploadMultiple: false,
    parallelUploads: 1,
    maxFilesize: 2,
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: false,
    dictRemoveFile: 'Remove file',
    dictCancelUpload: "Cancel",
    dictFileTooBig: 'Image is larger than 2MB',
    timeout: 10000,
    maxFiles: 5,
    acceptedFiles: "image/jpeg,image/png,image/gif,image/bmp",
    init: function () {
        this.on("removedfile", function (file) {
            $.post({
                url: '/images-delete',
                data: {id: file.name, _token: $('[name="_token"]').val()},
                dataType: 'json',
                success: function (data) {
                    total_photos_counter--;
                    $("#counter").text("# " + total_photos_counter);
                }
            });
        });
    },
    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
    }
};







