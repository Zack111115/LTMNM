<?php
// Giao diện cho phép tải xuống
interface Downloadable {
    public function download();
}

// Lớp cha Book
class Book {
    protected $title;
    protected $author;
    protected $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }
}

// Lớp con Ebook kế thừa Book và triển khai Downloadable
class Ebook extends Book implements Downloadable {
    private $fileSize; // Đơn vị MB

    public function __construct($title, $author, $price, $fileSize) {
        parent::__construct($title, $author, $price);
        $this->fileSize = $fileSize;
    }

    // Triển khai phương thức download từ Interface
    public function download() {
        echo "Đang tải tệp sách: '{$this->title}' của tác giả {$this->author}.<br>";
        echo "Kích thước tệp: {$this->fileSize} MB...<br>";
        echo " Quá trình tải hoàn tất!<br>";
    }
}

// Chạy thử
$ebook = new Ebook("Lập trình PHP Nâng Cao", "Vũ Phú Lộc", 120000, 15.5);
$ebook->download();
?>