<!-- resources/views/admin/create/zone.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add Zone</title>

        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container mt-5 text-center">
            <h2 class="mb-4">ADD ZONE</h2>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form method="post" action="{{ route('admin.zone') }}">
                @csrf

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="zone_code" class="col-sm-2 col-form-label text-end">Zone Code</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="zone_code" name="zone_code" required placeholder="Automatically" disabled />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="zone_long_name" class="col-sm-2 col-form-label text-end">Zone Long Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="zone_long_name" name="zone_long_name" required placeholder="Ex: ZONE1" />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="zone_short_name" class="col-sm-2 col-form-label text-end">Zone Short Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="zone_short_name" name="zone_short_name" required placeholder="Ex: ZO1" />
                    </div>
                </div>

                <div class="row" style="justify-content: center;">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (Required for Bootstrap components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
