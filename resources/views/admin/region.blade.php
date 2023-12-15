<!-- resources/views/admin/create/region.blade.php -->

<!-- ... (head section) ... -->
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
            <h2 class="mb-4">ADD REGION</h2>

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form method="post" action="{{ route('admin.region') }}">
                @csrf

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="zone_id" class="col-sm-2 col-form-label text-end">Zone</label>
                    <div class="col-sm-2">
                        <select class="form-select" id="zone_id" name="zone_id" required>
                            <option value="" disabled selected>Select a Zone</option>
                            @foreach($zones as $zoneId => $zoneName)
                            <option value="{{ $zoneId }}">{{ $zoneName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="region_code" class="col-sm-2 col-form-label text-end">Region Code</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="region_name" name="region_name" required placeholder="Automatically" disabled />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="region_name" class="col-sm-2 col-form-label text-end">Region Name</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="region_name" name="region_name" required placeholder="Ex: REGION1" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (Required for Bootstrap components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
