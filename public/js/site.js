$('document').ready(function () {
    $('.py-4').on('click', '.admin-view', function(event){
        event.preventDefault();
        var data = $(this).attr('href');
        $('#Modal').modal('show');
        $('.modal-error-1').hide();
        $('#Modal').find('.modal-title').text('Редактирование');
        $('#Modal').find('.modal-body').load(data);
        $('#Modal').find('.btn-success').addClass('select-save');   //Присваиваем кнопке дополнительный класс
    });

    $('.py-4').on('click', '.admin-delete', function(event){
        event.preventDefault();
        var id = $(this).attr('value');
        $.ajax({
            type: "GET",
            url: "admin/delete",
            data: {
                id: id
            },
            success: function (data) {
                var odj = jQuery.parseJSON(data);
                if (odj['code'] = 'success'){
                    console.log('Ура!!!');
                }
            }
        });
    });

    $('.py-4').on('click', '.select-save', function(event){
        event.preventDefault();
        var id = $('.modal-body #id').attr('value');
        var commit = $('#commit').val();
        $.ajax({
            type: "GET",
            url: "admin/save",
            data: {
                id: id,
                commit: commit
            },
            success: function (data) {
                var odj = jQuery.parseJSON(data);
                if (odj['code'] = 'success'){
                    $('#Modal').modal('hide');
                    console.log('Ура!!!');
                }
            }
        });
    });

    $(function(){
        var files = $('#files');
        $('#uploadFile').fileupload({
            url: '/upload',
            dropZone: '#dropZone',
            dataType: 'json',
            autoUpload: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('.progress-bar').css({width: progress + '%'});
            },
            add: function(e, data){
                var fileSize = data.originalFiles[0]['size'];
                if (fileSize > 157286400){
                    $('.alert').removeClass('alert-success').addClass('alert-danger').show().text('Превышен размер 150Мб');
                    return false;
                }
                $('#preview').text(data.files[0]['name']);
                $('#upload').click(function(){
                    var email = $('#email').val();
                    var commit = $('#description').val();
                    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
                    if(!pattern.test(email)){
                        $('.alert').removeClass('alert-success').addClass('alert-danger').show().text('Заполните почту');
                        return false;
                    }
                    if (email === '' || commit === ''){
                        $('.alert').removeClass('alert-success').addClass('alert-danger').show().text('Заполните почту и описание файла');
                        return false;
                    }
                    data.submit();
                });
            },
            submit: function (e, data) {
                var email = $('#email').val();
                var commit = $('#description').val();
                data.formData = {
                    email: email,
                    commit: commit
                };
            },
            done: function(e, data){
                if (data.result['status'] === 0){
                    $('.alert').removeClass('alert-success').addClass('alert-danger').show().text('Файл уже существует');
                    return false;
                }
                $('.alert').removeClass('alert-danger').addClass('alert-success').show().text('В скором времени Вам на почту будет отправлена ссылка на файл');
            }
        });
    });
});