@extends('template')
@section('page_title')
    Thêm
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span> Nhập hàng</h4>
        <div class="text-center">
            @if ($errors->any())
            <div class="text-danger h3 text-lg-start fw-bold">
                Something went wrong...
            </div>
            <ul class="list-group list-unstyled">
                @foreach ($errors->all() as $item)
                    <li class="alert alert-danger">{{ $item }}</li>
                @endforeach
            </ul>
        @endif
        </div>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Nhập hàng</h5>
                    {{-- <small class="text-muted float-end">Default label</small> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('productIn.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" name="id"
                                    value="{{ $productIn->id }}" readonly/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Chọn sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="product_id" name="product_id"
                                    aria-label="Default select example">
                                    <option>Chọn sản phẩm</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Chọn sản phẩm</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="supplier_id" name="supplier_id"
                                    aria-label="Default select example">
                                    <option>Chọn nhà cung cấp</option>
                                    @foreach ($suppliers as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Số lượng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="qty" name="qty"
                                value="{{ $productIn->qty }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Ngày nhập</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date"
                                value="{{ $productIn->date }}" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
