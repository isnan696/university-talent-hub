@php $title = 'Login'; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - University Talent Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Inter', sans-serif; }
        .login-card { background: white; border-radius: 20px; padding: 2.5rem; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.15); }
        .form-control { border-radius: 12px; padding: 0.75rem 1rem; border: 1px solid #E5E7EB; }
        .form-control:focus { border-color: #2563EB; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .btn-login { background: #2563EB; color: white; border-radius: 12px; padding: 0.75rem; font-weight: 600; border: none; width: 100%; }
        .btn-login:hover { background: #1D4ED8; }
        .brand { font-size: 1.75rem; font-weight: 700; color: #2563EB; text-align: center; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand mb-3">Talent Hub</div>
        <p class="text-center text-secondary mb-4" style="font-size: 0.9rem;">Masuk ke platform manajemen talenta</p>
        @if($errors->any())
        <div class="alert alert-danger py-2" style="border-radius: 12px;">{{ $errors->first('email') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size: 0.9rem;">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="student@talenthub.ac.id">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold" style="font-size: 0.9rem;">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="password">
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember" style="font-size: 0.9rem;">Ingat saya</label>
            </div>
            <button type="submit" class="btn-login">Masuk</button>
        </form>
        <div class="mt-4 pt-3 border-top text-center">
            <small class="text-secondary">Demo: student@talenthub.ac.id / password</small><br>
            <small class="text-secondary">Admin: admin@talenthub.ac.id / password</small>
        </div>
    </div>
</body>
</html>
