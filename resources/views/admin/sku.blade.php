<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add User</title>

        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

        <style>
            .required {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5 text-center">
            <h2 class="mb-4">ADD SKU</h2>

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form method="post" action="{{ route('admin.product') }}">
                @csrf

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="sku_id" class="col-sm-2 col-form-label text-end">SKU ID <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="sku_id" name="sku_id" required disabled placeholder="Automatically" />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="sku_code" class="col-sm-2 col-form-label text-end">SKU Code <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="sku_code" name="sku_code" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="sku_name" class="col-sm-2 col-form-label text-end">SKU Name <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="sku_name" name="sku_name" required placeholder="Main Product Name/Auto" />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="mrp" class="col-sm-2 col-form-label text-end">MRP <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="mrp" name="mrp" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="distributor_price" class="col-sm-2 col-form-label text-end">Distributor Price</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="distributor_price" name="distributor_price" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="weight" class="col-sm-2 col-form-label text-end">Weight/Volume</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" id="weight" name="weight" required />
                    </div>
                    <div class="col-sm-1">
                        <select class="form-select" id="kg" name="kg">
                            <option value="">Kg</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (Required for Bootstrap components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
