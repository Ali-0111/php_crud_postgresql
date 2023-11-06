<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Check if a file is selected
//     if (isset($_FILES['file'])) {
//         $file = $_FILES['file'];
//         var_dump($file);
//         // File details
//         $fileName = $file['name'];
//         $fileTmp = $file['tmp_name'];
//         $fileSize = $file['size'];
//         $fileError = $file['error'];
//         // Move the uploaded file to a desired location
//         $destination = 'uploads/' . $fileName;
//         if ($fileError === 0) {
//             move_uploaded_file($fileTmp, $destination);
//             echo "File uploaded successfully.";
//         } else {
//             echo "Error uploading file.";
//         }
//     } else {
//         echo "No file selected.";
//     }
// }
?>