<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('cdn')
</head>

<body>
    <div>
        @include('template')
        <a href="{{ route('exportPDF') }}" class="btn btn-primary">Export PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">pro_name</th>
                    <th scope="col">sup_name</th>
                    <th scope="col">qty</th>
                    <th scope="col">date</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice_data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <a href=" {{ route('productIn.edit',$item->id )}}" class="btn btn-primary">Sửa</a>

                            <a href=" {{ route('productIn.destroy',$item->id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
