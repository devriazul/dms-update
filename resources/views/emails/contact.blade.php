<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h2>Contact Query</h2>      
  </div>
  <h4>Dear Sir,</h4>      
  <p>{{ $details['message'] }}</p>
  <div class="col-md-12">
    <p>Name: {{ $details['full_name'] }}</p>
    <p>Email: {{ $details['email'] }}</p>
    <p>Phone: {{ $details['phone'] }}</p>
    <p>Country: {{ $details['country'] }}</p>
    <p>Subject: {{ $details['contact_reason'] }}</p>
    @if($details['is_receiving_info']==1)
      <p>Is Recieveing Text Message: Yes</p>
    @endif
  </div>
</div>

</body>
</html>