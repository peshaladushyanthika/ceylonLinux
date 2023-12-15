<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <!-- Bootstrap CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <style>
            body {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }

            .login-container {
                max-width: 400px;
                width: 100%;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="login-container mt-4">
            <h2 class="text-center mb-4">Login</h2>

            <form method="POST" action="{{ route('login') }}" class="p-4 border rounded bg-white">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control form-control-sm" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control form-control-sm" required />
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">Login</button>
                </div>
            </form>
        </div>

        <!-- Bootstrap JS and Popper.js CDN (Required for Bootstrap components) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
