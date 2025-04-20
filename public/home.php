<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="cdn_url" content = "<?=$helper->get_cdn_url()?>">
    <title>Cloudflare Cache Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center flex-column mt-5 border rounded p-4">
                    <div class="d-flex align-items-center justify-content-between w-100 flex-column flex-md-row">
                        <img src="<?=$helper->get_cdn_url()?>/public/assets/img/logo-lorem.png" width="200">
                        <input type="text" name="search" id="" placeholder="Domain Ara" class="form-control" style="max-width: 200px">
                    </div>
                    <h2 class="text-center fw-light my-3">CLOUDFLARE CACHE SERVICE</h2>
                    <table class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <th>Domain</th>
                            <th>İşlem</th>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" >
                                    <nav aria-label="Page navigation example" class="d-flex align-items-center justify-content-center w-100">
                                        <ul class="pagination m-0 p-3" id="pagination">

                                        </ul>
                                    </nav>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="p-3 position-sticky bottom-0 end-0 m-3 d-flex justify-content-end z-3">
                    <div class="toast align-items-center  border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">

                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onclick="$('.toast').fadeOut();"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="<?=$helper->get_cdn_url()?>/public/assets/js/main.js"></script>
<script>$(document).ready(function(){getZones();});</script>
<script>$(document).on('click', '.purge-btn', function(){purgeCache($(this).data('id'), $(this));});</script>
<script>
    $(document).on('keyup', 'input[name="search"]', function(){
        var keys = $(this).val().toLowerCase().trim();
        console.log(keys);
        if (keys.length > 5)
            getZones(1, keys);
        else if (keys.length === 0)
            getZones();
    });
</script>
</html>