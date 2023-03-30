<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Hóa đơn bán hàng</h1>

<table id="customers">
  <tr>
    <th>ID</th>
    <th>product_name</th>
    <th>customer_name</th>
    <th>qty</th>
    <th>date</th>
  </tr>
  @foreach ($invoice_data as $item)
  <tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->product->name }}</td>
    <td>{{ $item->customer->name }}</td>
    <td>{{ $item->qty }}</td>
    <td>{{ $item->date }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
