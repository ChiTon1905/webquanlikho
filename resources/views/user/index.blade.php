@extends('template')
@section('page_title')
    Danh sách
@endsection
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">type</th>
                <th scope="col">pass</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice_data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                    @if ($item->userType == 1)
                        admin
                    @else
                        user
                    @endif
                    </td>
                    <td>{{ $item->pass }}</td>
                    @if (Auth::user()->userType != $item->userType)
                    <td>
                        <a href=" {{ route('user.edit',$item->id) }}" class="btn btn-primary">Sửa</a>

                        <a href=" {{ route('user.destroy',$item->id) }}" class="btn btn-danger">Xóa</a>
                    </td>
                    @endif
                    
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

