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
                    <th scope="col">cat_id</th>
                    <th scope="col">cat_name</th>
                    <th scope="col" colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Categories as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <a href=" {{ route('category.edit',$item->id) }}" class="btn btn-primary">Sửa</a>

                            <a href="{{ route('category.destroy',$item->id) }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
