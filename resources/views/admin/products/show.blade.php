@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h1>Chi tiết sản phẩm</h1>

        <!-- Thông tin sản phẩm -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="" width="300px">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><strong>Mô tả:</strong> {{ $product->description }}</p>
                        <p><strong>Giá bán:</strong> {{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <p><strong>Giá gốc:</strong> {{ number_format($product->base_price, 0, ',', '.') }} VND</p>
                        <p><strong>Số lượng:</strong> {{ $product->quantity }}</p>
                        <p><strong>Danh mục:</strong> {{ $product->category->name ?? 'Chưa phân loại' }}</p>
                        <p><strong>Trạng thái:</strong> {{ $product->is_active ? 'Kích hoạt' : 'Không kích hoạt' }}</p>
                        <p><strong>Sản phẩm mới:</strong> {{ $product->is_new ? 'Có' : 'Không' }}</p>
                        <p><strong>Giảm giá đặc biệt:</strong> {{ $product->is_hotdeal ? 'Có' : 'Không' }}</p>
                        <p><strong>Hiển thị trên trang chủ:</strong> {{ $product->is_showhome ? 'Có' : 'Không' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông tin các biến thể -->
        @if ($product->variants->isNotEmpty())
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Các biến thể</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Giá</th>
                                <th>Tồn kho</th>
                                <th>Thuộc tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variants as $variant)
                                <tr>
                                    <td>{{ number_format($variant->price, 0, ',', '.') }} VND</td>
                                    <td>{{ $variant->stock }}</td>
                                    <td>
                                        @foreach ($variant->attributeValues as $attributeValue)
                                            {{ $attributeValue->value }} 
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-4">Quay lại danh sách</a>
    </div>
@endsection
