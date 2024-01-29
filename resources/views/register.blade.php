<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTER PAGE!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <h1 class="d-flex justify-content-center">THIS IS REGISTER PAGE!</h1>

    <div class="d-flex justify-content-center">
      <form method="post" action="{{route('register.form')}}">
        @csrf

{{--         @if ($errors->any())
          <div class="alert alert-danger">
              {{ $errors->first() }}
          </div>
        @endif --}}

        <div class="mb-4">
          <label class="form-label">Name</label>
          <input name="name" type="text" class="form-control">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
          <label class="form-label">Email address</label>
          <input name="email" type="email" class="form-control">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
          <label class="form-label">Password</label>
          <input name="password" type="password" class="form-control">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
          <label class="form-label">Re-type Password</label>
          <input name="password_confirmation" type="password" class="form-control">
            @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>