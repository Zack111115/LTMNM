<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        /* Style cho thanh menu */
        nav {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #0056b3;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        /* Style cho bảng sản phẩm */
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Cân chỉnh icon của thanh phân trang (pagination) */
        svg {
            width: 20px;
        }
    </style>
</head>
<body>
    <!-- Thanh menu điều hướng -->
    <nav>
        <a href="/">Trang chủ</a>
        <a href="/products">Products</a>
        <a href="/students">Students</a>
    </nav>
    
    <!-- Nội dung chính -->
    <div class="container">
        @yield('content')
    </div>
</body>
</html>