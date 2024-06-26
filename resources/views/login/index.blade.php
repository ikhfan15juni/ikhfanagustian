<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Bootstrap Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            margin-top: 20px;
        }

        .login-button {
            width: 100%;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
                {{ session('success') }}
        </div>
    @endif

    @if(session('loginError'))
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
    @endif





    <div class="login-container">
        <h2 class="text-center">Login</h2>


        <div class="class="login-form"">
        <form  method="post" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address:</label>

                <input type="email" class="form-control 
                @error ('email') is-invalid 
                @enderror"
                id="email" name="email" placeholder="Email" required value="{{old('email')}}">

                @error ('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary login-button">Login</button>
        </form>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
