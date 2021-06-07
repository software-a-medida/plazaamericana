'use strict';

$(document).ready(function ()
{
    var edit = false;
    var token = null;

    $('[data-modal="create_business"] [button-cancel]').on('click',  function()
    {
        edit = false;
        token = null;

        $('[name="background"]').parent().find('figure').addClass('d-none');
        $('[name="cover"]').parent().find('figure').addClass('d-none');
        $('[name="logotype"]').parent().find('figure').addClass('d-none');

        $('[name="create_business"]')[0].reset();

        $('[data-modal="create_business"]').removeClass('view');
    });

    $('[name="create_business"]').on('submit', function(e)
    {
        e.preventDefault();

        var form = $(this);
        var data = new FormData(form[0]);

        if (edit == false)
            data.append('action', 'create_business');
        else if (edit == true)
        {
            data.append('token', token);
            data.append('action', 'update_business');
        }

        $.ajax({
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                    location.reload();
                else if (response.status == 'error')
                {
                    var errors = '';

                    if (response.message)
                        errors = '- ' + response.message;
                    else
                    {
                        for (var i = 0; i < response.errors.length; i++)
                            errors = errors + '- ' + response.errors[i] + '\n';
                    }

                    alert(errors);
                }
            }
        });
    });

    $('[data-action="update_business"]').on('click', function()
    {
        edit = true;
        token = $(this).data('token');

        $.ajax({
            type: 'POST',
            data: 'token=' + token + '&action=read_business',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                {
                    $('[name="name"]').val(response.data.name);
                    $('[name="description_es"]').val(response.data.description.es);
                    $('[name="description_en"]').val(response.data.description.en);
                    $('[name="turn_es"]').val(response.data.turn.es);
                    $('[name="turn_en"]').val(response.data.turn.en);
                    $('[name="local"]').val(response.data.local);
                    $('[name="email"]').val(response.data.email);
                    $('[name="phone"]').val(response.data.phone);
                    $('[name="whatsapp"]').val(response.data.whatsapp);
                    $('[name="facebook"]').val(response.data.facebook);
                    $('[name="instagram"]').val(response.data.instagram);
                    $('[name="website"]').val(response.data.website);
                    $('[name="background"]').parent().find('figure > img').attr('src', '../../../uploads/' + response.data.background);
                    $('[name="cover"]').parent().find('figure > img').attr('src', '../../../uploads/' + response.data.cover);
                    $('[name="logotype"]').parent().find('figure > img').attr('src', '../../../uploads/' + response.data.logotype);

                    $('[name="background"]').parent().find('figure').removeClass('d-none');
                    $('[name="cover"]').parent().find('figure').removeClass('d-none');
                    $('[name="logotype"]').parent().find('figure').removeClass('d-none');

                    $('[data-modal="create_business"]').addClass('view');
                }
                else if (response.status == 'error')
                    alert(response.message);
            }
        });
    });

    $('[data-action="delete_business"]').on('click', function()
    {
        token = $(this).data('token');

        $('[data-modal="delete_business"]').addClass('view');
    });

    $('[data-modal="delete_business"] [button-cancel]').on('click', function()
    {
        token = null;

        $('[data-modal="delete_business"]').removeClass('view');
    });

    $('[data-modal="delete_business"] [button-success]').on('click', function()
    {
        $.ajax({
            type: 'POST',
            data: 'token=' + token + '&action=delete_business',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                    location.reload();
                else if (response.status == 'error')
                    alert(response.message);
            }
        });
    });
});
