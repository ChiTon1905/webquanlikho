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
                    <th scope="col">pro_id</th>
                    <th scope="col">cat_id</th>
                    <th scope="col">pro_name</th>
                    <th scope="col">price</th>
                    <th scope="col">image</th>
                    <th scope="col">qty</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['category_id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <img src="../images/{{ $item->image }}" alt="" height="130px" width="100px">
                        </td>
                        <td>{{ $item['qty'] }}</td>
                        <td>
                            <a href=" {{ route('product.edit',$item->id) }}" class="btn btn-primary">Sửa</a>

                            <a href="{{ route('product.destroy',$item->id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
