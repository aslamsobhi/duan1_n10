<?php 
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'view/header.php';
include 'global.php';
include 'model/taikhoan.php';

$dssp_new=load_sanpham_home();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch($act){
        case 'sanpham':
            // Khởi tạo các biến mặc định
            $category_id = isset($_GET['category_id']) && $_GET['category_id'] > 0 ? $_GET['category_id'] : "";
            $keyw = isset($_POST['search']) ? trim($_POST['search']) : ""; 
            // Xử lý giá trị tìm kiếm (nếu có)
            
            // Tải danh sách sản phẩm và danh mục
            $list_sp_danhmuc = loadAll_sanphampage($keyw, $category_id);
            $list_danhmuc = loadall_danhmuc();
            include 'view/sanpham.php';
            break;
        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $id = $_GET['id'];
                $category_id = "";
                $load__one = loadone_sanpham($id);
                $load__size = loadAll_size();
                extract($load__one);
                $load__sp__cungloai = load_sanpham_cungloai($id, $category_id);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }
            break;
            case 'themgiohang':
                if (isset($_POST['themgiohang']) && ($_POST['themgiohang'])) {
                    // Lấy dữ liệu từ form
                    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
                    $tensp = isset($_POST['tensp']) ? htmlspecialchars($_POST['tensp']) : '';
                    $img = isset($_POST['img']) ? htmlspecialchars($_POST['img']) : '';
                    $gia = isset($_POST['gia']) ? (float)$_POST['gia'] : 0;
                    $sl = isset($_POST['sl']) && (int)$_POST['sl'] > 0 ? (int)$_POST['sl'] : 1;
                    // Đảm bảo giỏ hàng tồn tại
                    if (!isset($_SESSION['giohang'])) {
                        $_SESSION['giohang'] = [];
                    }
                    // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
                    $fg = 0; // Cờ đánh dấu
                    $i = 0;  // Chỉ số trong mảng
                    foreach ($_SESSION['giohang'] as $item) {
                        if ($item[0] === $id) { // So sánh bằng ID thay vì tên
                            $slnew = $sl + $item[4];
                            $_SESSION['giohang'][$i][4] = $slnew;
                            $fg = 1;
                            break;
                        }
                        $i++;
                    }
                    // Nếu chưa tồn tại, thêm sản phẩm mới
                    if ($fg == 0) {
                        $item = [$id, $tensp, $img, $gia, $sl];
                        $_SESSION['giohang'][] = $item;
                    }
                    // Chuyển hướng đến trang giỏ hàng
                    header('Location: index.php?act=giohang');
                }
                break;
            case 'xoagiohang':
                if (isset($_GET['i']) && is_numeric($_GET['i']) && $_GET['i'] >= 0) {
                    // Kiểm tra nếu chỉ số `i` được truyền vào và có giá trị hợp lệ
                    if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                        // Xóa sản phẩm dựa trên chỉ số `i` nếu tồn tại
                        $index = (int)$_GET['i'];
                        if (isset($_SESSION['giohang'][$index])) {
                            array_splice($_SESSION['giohang'], $index, 1);
                        }
                    }
                } else {
                    // Xóa toàn bộ giỏ hàng nếu không có `i` hợp lệ
                    if (isset($_SESSION['giohang'])) {
                        unset($_SESSION['giohang']);
                    }
                }
                // Kiểm tra lại giỏ hàng sau khi cập nhật
                if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    // Nếu vẫn còn sản phẩm trong giỏ hàng, chuyển hướng về trang giỏ hàng
                    header('Location: index.php?act=giohang');
                    exit; // Dừng thực thi để đảm bảo không chạy tiếp mã khác
                } else {
                    // Nếu giỏ hàng trống, chuyển hướng về trang chủ
                    header('Location: index.php?act=giohang');
                    exit; // Dừng thực thi
                }
                
        case 'giohang':
            include 'view/cart/giohang.php';
            break;
        case 'thanhtoan':
            include 'view/cart/thanhtoan.php';
            break;
            case 'dang_ky':
                if (isset($_POST['dangky'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    insert_users($username, $password, $email);
                    $thongbao = "Đăng ký tài khoản thành công! Vui lòng đăng nhập.";
                }
                include "./view/taikhoan/dang_ky.php";
                break;
                case 'dang_nhap':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dang_nhap'])) {
                        // Kiểm tra và lấy dữ liệu đầu vào
                        $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
                        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
                        // Biến thông báo mặc định
                        $thongbao = "Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin đăng nhập.";
                        // Kiểm tra thông tin đăng nhập
                        if (!empty($username) && !empty($password)) {
                            $check = login($username, $password);
                            if ($check) {
                                // Đăng nhập thành công: Chuyển hướng hoặc xử lý logic
                                $thongbao = "Đăng nhập thành công.";
                                // Ví dụ: Chuyển hướng tới trang chủ
                                header('Location: ./index.php');
                                exit;
                            }
                        } else {
                            $thongbao = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
                        }
                    }
                
                    // Gửi biến thông báo tới view
                    include "./view/taikhoan/dang_nhap.php";
                    break;
                
        case 'lienhe':
            include 'view/lienhe.php';
        case 'blog':
            include 'view/blog.php';
       
    }
} else {
    
   include 'view/home.php';
}
include 'view/footer.php';

?>