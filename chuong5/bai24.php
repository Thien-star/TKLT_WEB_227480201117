<!DOCTYPE html>
<html>
<head>
    <title>Upload nhiều file</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .upload-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .buttons {
            text-align: center;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 4px;
            color: #777;
            font-size: 14px;
            text-align: center;
        }
        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="upload-container">
    <h2>Upload nhiều file lên server</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="file_upload">Chọn file để upload:</label>
        <input type="file" id="file_upload" name="file_upload" required>
    </div>
    <div class="buttons">
                <button type="submit">Upload</button>
            </div>
        </form>

        <div class="result">
            <?php
            if (isset($_POST["submit"])) {
                $uploadDir = "BoSuuTap/";
                
                // Kiểm tra thư mục, nếu chưa có thì tạo
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
                    $fileName = basename($_FILES["files"]["name"][$key]);
                    $targetFile = $uploadDir . $fileName;
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    // Chỉ cho phép upload file ảnh
                    $allowedTypes = ["jpg", "jpeg", "png", "gif"];

                    if (in_array($fileType, $allowedTypes)) {
                        if (move_uploaded_file($tmp_name, $targetFile)) {
                            echo "Upload thành công: $fileName<br>";
                        } else {
                            echo "Lỗi upload: $fileName<br>";
                        }
                    } else {
                        echo "File không hợp lệ: $fileName<br>";
                    }
                }
            }
            ?>
        </div>
     </div>
    </form>
</body>
</html>