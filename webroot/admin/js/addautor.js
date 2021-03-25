$(document).ready(function () {
    $(document).on('click', '.item', function () {
        if (confirm('are you sure about that?')) {
            let elemet = $(this)[0];
            $('.row').fadeIn('200');
            $('#lata').attr('hidden', true);
            $('#load').removeAttr('hidden');
            var url = $('#exampleNotButtons').attr('data-url');
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    id_autor: $(elemet).attr('data-aid'),
                    id_libro: $(elemet).attr('data-lid')
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                },
                success: function (response) {
                    if (response == null) {
                        $('#load').attr('hidden', true);
                        $('#lata').removeAttr('hidden');
                        toastr.warning("Autor existente", "Cuidado", {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        });

                    } else {
                        $('#load').attr('hidden', true);
                        $('#lata').removeAttr('hidden');
                        toastr.success("Autor agregado", "Exitoso", {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        });
                    }
                }
            });
        }
    });
});