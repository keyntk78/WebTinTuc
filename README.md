# 61-CNTT2-Nhom7- Website tin tức
Thành viên:
+ Nguyễn Tuấn Kiệt: 61133822
+ Trần Công Quyền: 61130953
+ Nguyễn Huỳnh Thanh Hải: 61133571
+ Nguyễn Văn Tâm: 61132086	
+ Nguyễn Xuân Trực: 61134594	
+ Nguyễn Đức Bình: 61133407
+ Trương Ngọc Tuấn: 62132542

1.	Cài đặt
-	Cài đặt laravel & composer :https://www.youtube.com/watch?v=-SwzQ7-ipW8&t=315s
-	Download Project về máy
- import file sql: đặt tên csdl file  quan_ly_ban_sua.sql là: quan_ly_ban_sua, file tintuc.sql là tintuc
-	Kiểm tra project đã có file .env chưa. Nếu chưa thì tiến hành cài đặt theo các bước :
cp .env.example .env
php artisan key:generate
php artisan cache:clear
php artisan config:clear
Đổi tên database ở dòng 13 DB_DATABASE='tên database trên phpAdmin mà bạn đặt'
- Trường hợp chưa có file vendor cài đặt theo các bước:
composer dump-autoload
composer update
- Sau khi cài đặt hoàn tất thì chạy thử chương trình theo cú pháp: php artisan serve 

2.	Truy cập trang tin tức
	Admin
-	Truy cập: http://127.0.0.1:8000/admin-dangnhap
-	Đăng nhập vào Admin:
+ Tài khoản: kiet61133822@gmail.com
+ Mật khẩu: 123456
-	Sau khi đăng nhập thàng công sẽ hiện ra giao diện bạn có thể tùy chọn các đối tượng (thể loại, tin tức, video, loại tin, user) để thêm, xóa, sửa, tìm kiếm

	Users
-	Truy cập: http://127.0.0.1:8000/trangchu
-	Người dùng có thể xem, tìm kiếm tin tức, giới thiệu (không cần tài khoản). Đối với chức năng bình luận người dùng cần đăng nhập tài khoản.
-	Khi đăng ký Users: http://127.0.0.1:8000/dangky
- Sau khi đăng ký tài khoản thành công thì bạn đăng nhập và vào trang web để có thể thực hiện chức năng bình luận.
CHÚC CÁC BẠN THÀNH CÔNG <3
