<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #product-in {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #product-in td, #product-in th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #product-in tr:nth-child(even){background-color: #f2f2f2;}

        #product-in tr:hover {background-color: #ddd;}

        #product-in th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <table id="product-in" width="100%">
        <tr>
          <th>ID</th>
          <th>product_name</th>
          <th>customer_name</th>
          <th>qty</th>
          <th>date</th>
        </tr>
        @foreach ($product_out as $item)
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
