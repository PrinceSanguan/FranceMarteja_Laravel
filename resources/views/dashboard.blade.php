<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover text-center">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Credits Score</th>
                      <!-- Add more columns as needed -->
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>{{ $users->name ?? 'No information available' }}</td>
                      <td>{{ $users->ingredients ?? '0' }}</td>
                      <!-- Add more cells for other properties as needed -->
                  </tr>
              </tbody>
          </table>
      </div>
  </div>

<a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>