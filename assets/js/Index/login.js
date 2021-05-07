'use strict';

$(document).ready(function ()
{
    $('form[name="login"]').on('submit', function(e)
    {
        e.preventDefault();

        var form = $(this);

        $.ajax({
            type: 'POST',
            data: form.serialize(),
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                    window.location.href = response.path;
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
});
