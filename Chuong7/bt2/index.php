<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';

if ($page == 'donvi') {
    include 'donvi.php';
} elseif ($page == 'danhsach') {
    include 'danhsach.php';
} elseif ($page == 'bangluong') {
    include 'bangluong.php';
} 
// thêm các phần khác nếu có
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="gd.css" type="text/css">
    
</head>

<body>
    <div class="web">
        <header>
            <div class="hinh">
                <img src="www.png">
            </div>
            <div class="baclieu">
                <div class="flex">
                    <img src="logo.png">
                    <span class="qly">
                        <p>quản lý <br> nhân sự</p>
                    </span>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="hinh">
                <ul class="menu">
                    <li><a href="https://blu.edu.vn/gioi-thieu-11540">Trang Chủ</a>
                    <li>
                        <a href="#" onclick="toggleSubMenu(event, 'dvttSubmenu')">Đơn vị trực thuộc</a>
                        <div class="submenu" id="dvttSubmenu">
                            <ul>
                                <li><a href="#" onclick="loadDonVi('ktcn')">Khoa KT&CN</a></li>
                                <li><a href="#" onclick="loadDonVi('supham')">Khoa Sư phạm</a></li>
                                <li><a href="#" onclick="loadDonVi('nnts')">Khoa NN&TS</a></li>
                                <li><a href="#" onclick="loadDonVi('kinhte')">Khoa Kinh tế và Luật</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" onclick="toggleSubMenu(event, 'hosoSubmenu')">Hồ sơ nhân viên</a>
                        <div class="submenu" id="hosoSubmenu">
                            <ul>
                                <li><a href="#" onclick="loadPage('danhsach.php')">Danh sách</a></li>
                                <li><a href="#" onclick="loadPage('xemhoso.php')">Xem hồ sơ</a></li>
                                <li><a href="#" onclick="loadPage('themhoso.php')">Thêm hồ sơ</a></li>
                                <li><a href="#" onclick="loadPage('suahoso.php')">Sửa hồ sơ</a></li>
                                <li><a href="#" onclick="loadPage('xoahoso.php')">Xoá hồ sơ</a></li>
                                <li><a href="#" onclick="loadPage('timhoso.php')">Tìm hồ sơ</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" onclick="toggleSubMenu(event, 'qltlSubmenu')">Quản lý tiền lương</a>
                        <div class="submenu" id="qltlSubmenu">
                            <ul>
                                <li><a href="#" onclick="loadBang('bangluong.php')">Bảng lương</a></li>
                                <li><a href="#" onclick="loadBang('capnhatluong.php')">Cập nhật hồ sơ</a></li>
                                <li><a href="#" onclick="loadBang('timkiemluong.php')">Tìm kiếm</a></li>
                                <li><a href="#" onclick="loadBang('tinhluong.php')">Tính lương</a></li>
                                <li><a href="#" onclick="loadBang('tinhthuong.php')">Tính thưởng</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="baclieu">
                <p class="slogan">Tên tiếng Anh: BAC LIEU UNIVERSITY</p>
                <p class="slogan">Tên viết tắt: Tiếng việt ĐHBL - Tiếng Anh BLU</p>
                <div id="noidung" class="nd" style="padding: 20px; background: #f0f0f0;">
                    <p>Trường ĐHBL(ĐHBL) là trường đại học công lập, là cơ sở giáo dục đại học đa ngành, đa hệ, được
                        thành <img src="logo1.jpg">lập theo Quyết định số 1558/QĐ-TTg ngày 24/11/2006 của Thủ tướng Chính phủ.
                        Việc thành lập Trường ĐHBL là phù hợp theo ý chí, nguyện vọng của Đảng bộ và nhân dân tỉnh Bạc
                        Liêu,
                        đáp ứng yêu cầu đào tạo và phát triển nguồn nhân lực chất lượng cao, phục
                        vụ sự nghiệp công nghiệp hoá, hiện đại hoá của Bạc Liêu và vùng Bán đảo Cà Mau
                    </p>

                    <p class="title">II. Chức năng nhiệm vụ</p>
                    <p>Về đào tạo: Tổ chức đào tạo đa dạng các cấp trình độ từ cao đẳng, đại học đến sau đại học và tổ
                        chức
                        các loại hình liên thông, vừa học, vừa làm, liên kết, v.v. nhằm đáp ứng nhu cầu đào tạo
                        ngày càng cao và đa dạng của xã hội, đặc biệt là nguồn nhân lực có chất lượng phục vụ phát triển
                        kinh tế, xã hội (KT-XH) của vùng Bán đảo Cà Mau và khu vực Đồng bằng sông Cửu Long.
                    </p>
                    <p>Về khoa học công nghệ: Tổ chức nghiên cứu khoa học định hướng ứng dụng, chú trọng giải quyết các
                        vấn
                        đề cấp bách và lâu dài trong phát triển kinh tế xã hội của địa phương và vùng
                        . Tập trung nghiên cứu và chuyển giao công nghệ, ưu tiên giải quyết các vấn đề được xã hội đặc
                        biệt
                        quan tâm và thực hiện các dịch vụ khoa học phục vụ cộng đồng
                    </p>
                </div>
            </div>    
        </div>
        <footer>
            <p class="school">Trường Đại học bạc liêu</p>
            <p class="slogan">Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập</p>
            <p class="info">Điện thoại: 02913822653</p>
            <p class="info">Email: mail@blu.edu.vn</p>
            <p class="info">Địa chỉ: số 178 đường Võ Thị Sáu, P.8, TP. Bạc Liêu, Tỉnh Bạc Liêu</p>
        </footer>
    </div>
    <script>
    function loadDonVi(khoa) {
        fetch(khoa + ".php")
            .then(res => res.text())
            .then(data => {
                document.getElementById("noidung").innerHTML = data;
                window.scrollTo(0, document.getElementById("noidung").offsetTop);
            })
            .catch(err => {
                document.getElementById("noidung").innerHTML = "Không thể tải nội dung.";
                console.error(err);
            });
    }

    function toggleSubMenu(event, submenuId) {
        event.preventDefault(); // Ngăn chặn chuyển hướng trang
        var submenu = document.getElementById(submenuId);
        if (submenu.classList.contains("show")) {
            submenu.classList.remove("show");
        } else {
            // Ẩn các submenu khác (nếu cần)
            document.querySelectorAll(".submenu").forEach(function(el) {
                el.classList.remove("show");
            });
            submenu.classList.add("show");
        }
    }

    // Tùy chọn: Ẩn submenu khi click bên ngoài
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".menu li")) {
            document.querySelectorAll(".submenu").forEach(function (el) {
                el.classList.remove("show");
            });
        }
    });
    function loadPage(filename) {
        fetch(filename)
            .then(res => res.text())
            .then(data => {
                document.getElementById("noidung").innerHTML = data;
                window.scrollTo(0, document.getElementById("noidung").offsetTop);
            })
            .catch(err => {
                document.getElementById("noidung").innerHTML = "Không thể tải nội dung.";
                console.error(err);
            });
    }
    function loadBang(page) {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", page, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("main-content").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
</script>
</body>
</html>