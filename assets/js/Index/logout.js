'use strict';

$(document).ready(function ()
{
    $('[data-action="logout"]').on('click', function()
    {
        $.ajax({
            type: 'POST',
            processData: false,
            cache: false,
            dataType: 'json',
            success: function(response)
            {
                if (response.status == 'success')
                    window.location.href = response.path;
                else if (response.status == 'error')
                    alert(response.message);
            }
        });
    });
});
