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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">address</th>
                    <th scope="col">email</th>
                    <th scope="col">telephone</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Suppliers as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['telepon'] }}</td>
                        <td>
                            <a href=" {{ route('supplier.edit',$item->id) }}" class="btn btn-primary">Sửa</a>

                            <a href="{{ route('supplier.destroy',$item->id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
