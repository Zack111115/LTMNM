1. Sơ đồ luồng dữ liệu tổng quátTrình duyệt (Browser) ──(Gửi Request)──> Router (web.php) ──(Điều phối)──> Controller (ArticleController) ──(Trả kết quả)──> View (Blade Templates) ──(Hiển thị HTML)──> Trình duyệt
2. Chi tiết các luồng xử lý cụ thể trong bài
a) Luồng xem danh sách và chi tiết bài viết (Read)
    1. Gửi yêu cầu: Người dùng gõ URL /articles hoặc /articles/show/{article} trên trình duyệt.
    2. Định tuyến (Routing): Router nhận yêu cầu. Ở bài tập 6, tính năng Route Model Binding sẽ tự động tìm kiếm dữ liệu bài viết dựa trên ID từ URL thông qua Model Article.  
    3. Xử lý (Controller): Hàm index hoặc show trong Controller tiếp nhận dữ liệu (ở dạng mảng tĩnh mô phỏng).  
    4. Hiển thị (View): Controller gửi dữ liệu này qua cho View tương ứng (articles.index hoặc articles.show). Tại đây, các thành phần giao diện như Layout (app.blade.php), Partials (thanh điều hướng, breadcrumb), và Blade Components được lắp ráp lại thành một trang HTML hoàn chỉnh để trả về cho trình duyệt.  
b). Luồng thêm mới và cập nhật bài viết (Create / Update)
    1. Nhập liệu: Người dùng điền thông tin vào Form tại /articles/create hoặc /articles/{id}/edit và bấm nút "Lưu" / "Cập nhật".
    2. Gửi dữ liệu an toàn: Form gửi dữ liệu lên Router qua phương thức POST hoặc PUT (được giả lập bằng @method('PUT')), đi kèm với mã token bảo mật @csrf để chống tấn công.  
    3. Xác thực (Validation): Router chuyển dữ liệu vào hàm store hoặc update của Controller. Tại đây, hệ thống sẽ kiểm tra xem tiêu đề (title) và nội dung (body) có hợp lệ không (ví dụ: không được để trống, đủ số ký tự).  
        - Nếu có lỗi: Luồng dữ liệu quay ngược lại trang Form trước đó, mang theo thông báo lỗi để hiển thị dưới các ô nhập liệu (thông qua chỉ thị @error).  
        - Nếu hợp lệ: Controller giả lập việc lưu thành công, tạo ra một thông báo flash message, sau đó chuyển hướng (redirect) người dùng về trang danh sách /articles.  
c) Luồng xóa bài viết (Delete)
    1. Xác nhận: Người dùng bấm nút "Xóa" trên danh sách. Trình duyệt hiện hộp thoại JavaScript yêu cầu xác nhận.  
    2. Gửi yêu cầu xóa: Khi người dùng đồng ý, một Form chứa @method('DELETE') sẽ gửi yêu cầu lên Router.  
    3. Thực thi: Router gọi hàm destroy trong Controller. Controller giả lập việc xóa dữ liệu, tạo thông báo flash báo hiệu đã xóa xong, và cuối cùng chuyển hướng trang về lại danh sách /articles.  