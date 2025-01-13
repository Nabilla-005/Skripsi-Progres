<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <h2>Login</h2>
      
      <div class="input-field">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label>Enter your email</label>
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="input-field">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <label>Enter your password</label>
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="forget">
        <label for="remember">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <p>Remember me</p>
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot password?</a>
        @endif
      </div>

      <button type="submit">Log In</button>

    </form>
  </div>

  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
