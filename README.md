## Cấu trúc chính:
- app/Http/Controllers – chứa các Controller xử lý logic request
- app/Models/User.php – model quản lý thông tin user
- app/Http/Middleware/RoleMiddleware.php – phân quyền Admin/Employee
- database/migrations – các file migration tạo bảng
- database/seeders – seeder tạo dữ liệu mẫu
- resources/views – giao diện Blade templates
- public/argon - chứa các file của giao diện argon
- Routes
  + /login – trang đăng nhập
  + /users – quản lý employee (Admin)
  + /nv-{id} – trang công khai của employee
  + /employee - trang thông tin cá nhân của employee
 
## Cài đặt + thử project:
- Clone project
- cài đặt dependencies: composer
- cấu hình databse từ .env
- Chạy migration và seeder để tạo database mẫu
- Chạy project
- Truy cập http://127.0.0.1:8000/login để test
