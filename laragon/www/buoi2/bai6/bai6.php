<?php
class BankAccount {
    private $accountNumber;
    private $accountName;
    private $balance;

    // Khởi tạo tài khoản
    public function __construct($accountNumber, $accountName, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    // Phương thức nạp tiền
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "Đã nạp thành công " . number_format($amount) . " VNĐ. <br>";
        } else {
            echo "Số tiền nạp không hợp lệ. <br>";
        }
    }

    // Phương thức rút tiền (có kiểm tra số dư)
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "Đã rút thành công " . number_format($amount) . " VNĐ. <br>";
        } else {
            echo "Rút tiền thất bại: Số dư không đủ hoặc số tiền không hợp lệ. <br>";
        }
    }

    // Phương thức hiển thị số dư
    public function displayBalance() {
        echo "Tài khoản: {$this->accountName} | Số dư hiện tại: " . number_format($this->balance) . " VNĐ.<br><br>";
    }
}

// Chạy thử kiểm tra
$myAccount = new BankAccount("0123456789", "Trung Kiên", 500000);
$myAccount->displayBalance();

$myAccount->deposit(1500000);
$myAccount->displayBalance();

$myAccount->withdraw(300000);
$myAccount->displayBalance();
?>