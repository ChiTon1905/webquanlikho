<!DOCTYPE html>
<html>
    <head>
        <title>Chi tiết đơn hàng</title>
    </head>
    <body>
        <h2>Chi tiết đơn hàng</h2>
        <p>Tên nhân viên: {{ $name }}</p>
        <p>Tên sản phẩm: {{ $product_name }}</p>
        <p>Tên khách hàng: {{ $customer_name }}</p>
        <p>Số lượng: {{  $product_qty }}</p>
        <p>Ngày giao: {{ $date }}</p>
        <p>Giá: {{ $price }}</p>
    </body>
</html>
