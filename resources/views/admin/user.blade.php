<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

        <style>
            .required {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5 text-center">
            <h2 class="mb-4">ADD USERS</h2>

            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <form method="post" action="{{ route('admin.user') }}">
                @csrf

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="name" class="col-sm-2 col-form-label text-end">Name <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="name" name="name" required />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="nic" class="col-sm-2 col-form-label text-end">NIC <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="nic" name="nic" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="address" class="col-sm-2 col-form-label text-end">Address <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="address" name="address" required />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="mobile" class="col-sm-2 col-form-label text-end">Mobile <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="mobile" name="mobile" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="email" class="col-sm-2 col-form-label text-end">E-Mail</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="email" name="email" required />
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="gender" class="col-sm-2 col-form-label text-end">Gender</label>
                    <div class="col-sm-2">
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" disabled selected>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="territory_id" class="col-sm-2 col-form-label text-end">Territory <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-select" id="territory_id" name="territory_id" required>
                            <option value="" disabled selected>Select</option>
                            @foreach($territory as $territoryId => $territoryName)
                            <option value="{{ $territoryId }}">{{ $territoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row" style="justify-content: center;">
                    <label for="username" class="col-sm-2 col-form-label text-end">User Name <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="username" name="username" required />
                    </div>
                </div>

                <div class="mb-3 row" style="justify-content: center;">
                    <label for="password" class="col-sm-2 col-form-label text-end">Password <span class="required">*</span></label>
                    <div class="col-sm-2">
                        <input type="password" class="form-control" id="password" name="password" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-left:100px;">SAVE</button>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (Required for Bootstrap components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
