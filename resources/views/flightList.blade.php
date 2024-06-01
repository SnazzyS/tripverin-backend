<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centered Table</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3f4f6;
    }
    table {
      width: 100%;
      max-width: 600px;
      background-color: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-collapse: collapse;
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 8px 16px;
      border-bottom: 1px solid #e5e7eb;
    }
    th {
      background-color: #3b82f6;
      color: white;
      text-align: left;
    }
  </style>
</head>
<body>
    <h1>Trip: {{ $title }}</h1>
    <h2>Flight: {{ $flight }}</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>ID Number</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $index => $customer)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->id_number }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
