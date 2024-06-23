<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receiver</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table thead th {
            background-color: #343a40;
            color: white;
            border: none;
        }
        .table tbody td, .table tbody th {
            border: none;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255,255,255,.75);
        }
        .navbar-dark .navbar-nav .nav-link:hover {
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Receiver <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('EmailSchedule') }}">Email Schedule</a>
            </li>
          </ul>
        </div>
      </nav>
      @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

      <div class="container mt-4">
        <div class="table-responsive">
            <center><h1 style="margin: 2%">Email Receiver</h1></center>
          <form action="{{ url('update') }}" method="POST" >
            @csrf
            @method('PUT')
            <table class="table table-hover">
              <thead style="text-align:center">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody style="text-align:center">
                  @foreach ($receivers as $receiver)
                <tr>
                  <th scope="row">{{ $receiver->id }}</th>
                  <td>{{ $receiver->name }}</td>
                  <td>{{ $receiver->email }}</td>
                  <td>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status[{{ $receiver->id }}]" id="status-active-{{ $receiver->id }}" value="1" {{ $receiver->Active == 1 ? 'checked' : '' }}>
                          <label class="form-check-label" for="status-active-{{ $receiver->id }}">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="status[{{ $receiver->id }}]" id="status-inactive-{{ $receiver->id }}" value="0" {{ $receiver->Active == 0 ? 'checked' : '' }}>
                          <label class="form-check-label" for="status-inactive-{{ $receiver->id }}">Inactive</label>
                      </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Update All</button>
            </div>
          </form>
        </div>
      </div>
</body>
</html>
