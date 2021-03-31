$(document).ready(function () {
    $('#addcheck').change(function (e) {
        e.preventDefault();
        var element = document.getElementById('addcheck')
        if (element.checked) {
            $('#author-hide').removeAttr('hidden');
            $('#input1-group3').removeAttr('required');
            $('#input-nI').attr('required', 'true');
            $('#input-A').attr('required', 'true');
        } else {
            $('#author-hide').attr('hidden', 'true');
            $('#input-nI').removeAttr('required');
            $('#input-A').removeAttr('required');
            $('#input1-group3').attr('required', 'true');
        }
    });
    var timeout = null;

    $('#input1-group3').keydown(function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            let id = $('#input1-group3').val();
            
            var urltar = "/biblioteca/TblAutor/find" + '/' + id;
            let html = ``;
            $.ajax({
                type: "GET",
                url: urltar,
                success:function (response) {
                    
                    if (response.length > 0) {
                        response.forEach(element => {
                            $('#input-nI').val(element.id);
                            html += `
                                <button type="button" tabindex="0" class="dropdown-item">${element.nombre + " " + element.apellido}</button>
                            `
                        });
                    } else {
                        html = `
                            <button type="button" tabindex="0" class="dropdown-item">ninguno....</button>    
                        `
                    }
                    if (id=="") {
                        $('#dropmenu').removeClass('show');
                        console.log('if');
                    }else{
                        console.log('else');
                        $('#dropmenu').html(html);
                        $('#dropmenu').addClass('show');
                    }
                }
            });
        }, 500);
    });
    $(document).on('click', '.dropdown-item', function () {
        let element = $(this)[0];
        $('#input1-group3').val($(element).text());
        $('#dropmenu').removeClass('show');
    });
});