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
    <a href="{{ route('exportPDFProductOut') }}" class="btn btn-primary">Export PDF</a>
    <a href="{{ route('exportExcelProductOut') }}" class="btn btn-primary">Export Excel</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">pro_name</th>
                <th scope="col">cus_name</th>
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
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        <a href=" {{ route('productOut.edit', $item->id) }}" class="btn btn-primary">Sửa</a>

                        <a href=" {{ route('productOut.destroy', $item->id) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

