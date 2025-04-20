function getZones(page = 1, search = ''){
    $.ajax({
        url: '/CloudflareApiPurgeZones/route/api.php?page='+page+'&name='+search,
        method : 'GET',
        dataType: 'json',
        beforeSend: function () {
            loading();
        },
        success: function (response) {
            var results = response;

            if(results.success === true) {
                pagination(results.result_info);
                setTable(results.result);
            } else{
                toasterror(results.message);
                $('.table').find('tbody').html('<tr><td colspan="2" class="text-center">No Result</td></tr>');
            }
        },
        error: function (response) {
            toasterror('Error occurred while processing your request. Please try again later.');
            $('.table').find('tbody').html('<tr><td colspan="2" class="text-center">No Result</td></tr>');
        }
    });
}

function purgeCache($zoneId, btn){
    $.ajax({
        url: '/CloudflareApiPurgeZones/route/api.php',
        method : 'POST',
        data:{'zone_id' : $zoneId},
        dataType: 'json',
        beforeSend: function () {
            btn.prop('disabled', true);
        },
        success: function (response) {
            btn.prop('disabled', false);
            var results = response;
            if(results.success === true) {
                toastsuccess('Cache Purge Successfully.');
            } else{
                toasterror(results.message);
            }
        },
        error: function (response) {
            btn.prop('disabled', false);
            toasterror('Error occurred while processing your request. Please try again later.');
        }
    });
}

function loading(){
    const table = $('.table');
    table.find('tbody').html('<tr><td colspan="2" class="text-center">Loading...</td></tr>');
}

function login()
{
    $(document).on('submit', '.login-form', function (e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: '/CloudflareApiPurgeZones/route/api.php',
            method: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                $('button[type="submit"]').prop('disabled', true).html('Loading...');
            },
            success: function (response) {
                var message = response.message;
                if (response.status === 'success')
                {
                    $('.alert').addClass('alert-success').html(message).show();
                    setTimeout(function () {window.location.href = '/CloudflareApiPurgeZones';}, 2000);
                } else {
                    $('.alert').addClass('alert-danger').html(message).show();
                }
            },
            error: function (response) {
                $('button[type="submit"]').prop('disabled', false).html('Login');
                $('.alert').addClass('alert-danger').html('Error occurred while processing your request. Please try again later.').show();
            }
        });
    });
}

function pagination(data)
{
    const $pagination = $('#pagination');
    $pagination.empty();

    const currentPage = data.page;
    const totalPages = data.total_pages;

    const prevDisabled = currentPage === 1 ? 'disabled' : '';
    $pagination.append(`
            <li class="page-item ${prevDisabled}">
                <a class="page-link" href="#" onclick="getZones(${currentPage - 1})">&lt;</a>
            </li>
        `);

    for (let i = 1; i <= totalPages; i++) {
        const active = i === currentPage ? 'active' : '';
        $pagination.append(`
                <li class="page-item ${active}">
                    <a class="page-link" href="#" onclick="getZones(${i})">${i}</a>
                </li>
            `);
    }

    const nextDisabled = currentPage === totalPages ? 'disabled' : '';
    $pagination.append(`
            <li class="page-item ${nextDisabled}">
                <a class="page-link" href="#" onclick="getZones(${currentPage + 1})">&gt;</a>
            </li>
        `);
}

function setTable(results)
{
    const cdnUrl = $('meta[name="cdn_url"]').attr('content');
    const table = $('.table');
    table.find('tbody').html('');
    $.each(results, function (key, value) {
        var row = `<tr>
                        <td>${value.name}</td>
                        <td><button class="btn btn-info purge-btn" data-id = "${value.id}"><img src="${cdnUrl}/public/assets/img/broom.svg" width="24" height="24"></button></td>`;
        table.find('tbody').append(row);
    });
}

function toasterror(message)
{
   $('.toast-body').html(message);
   $('.toast').addClass('text-bg-danger').fadeIn();
    setTimeout(function () {$('.toast').fadeOut();}, 3000);
}

function toastsuccess(message)
{
    $('.toast-body').html(message);
    $('.toast').addClass('text-bg-success').fadeIn();
    setTimeout(function () {$('.toast').fadeOut();}, 3000);
}
