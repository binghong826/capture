<?php
// process_image.php

// 獲取前端發送的圖像數據
$data = json_decode(file_get_contents('php://input'), true);
$imageData = $data['image'];

// 解碼圖像數據
$imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
$imageData = base64_decode($imageData);

$times = strtotime("now");
// 將圖像數據保存到 temp/ 目錄下的文件
$fileName = 'temp/temp_image.jpg';
// 調用 YOLO 模型進行處理（非同步）
$command = "python yolo_detection.py $fileName > /dev/null 2>&1 &";  // Linux 的示例，將進程放到背景執行
exec($command);

// 立即返回給前端
echo json_encode(array('message' => 'Image processing started.'));

?>
