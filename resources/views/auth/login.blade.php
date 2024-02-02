<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Manajemen Siswa</title>

    @include('components.style')
</head>

<body class="bg-body-tertiary">
    <div class="container">

        <div class="row align-items-center justify-content-center" style="min-height:100vh">
            <div class="col-md-5">
                <h3 class="text-center fw-bold mb-4">
                    Login Manajemen Siswa
                </h3>
                <div class="card border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Masukan Email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>

                                    <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
