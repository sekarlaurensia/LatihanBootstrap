
<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $contact = trim($_POST["contact"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $contact === "" || $message === "") {
        die("Semua kolom harus diisi.");
    }

    $sql = "INSERT INTO contact_messages (name, contact, message)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $contact, $message);

    if ($stmt->execute()) {
        header("Location: Web04.php?status=success#contact");
        exit;
    } else {
        echo "Pesan gagal disimpan.";
    }

    $stmt->close();
}

$conn->close();
?>
