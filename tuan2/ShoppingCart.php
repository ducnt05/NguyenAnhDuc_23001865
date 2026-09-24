<?php
class ShoppingCart
{
    private $items = [];

    public function addItem($item)
    {
        if (!($item instanceof CartItem)) {
            echo "Sản phẩm không hợp lệ!<br>";
            return;
        }

        $this->items[] = $item;

        echo "Đã thêm sản phẩm: " . $item->getName() . "<br>";
    }

    // Xóa sản phẩm theo tên
    public function removeItem($name)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getName() == $name) {
                unset($this->items[$key]);

                
                $this->items = array_values($this->items);

                echo "Đã xóa sản phẩm: " . $name . "<br>";
                return;
            }
        }

        echo "Không tìm thấy sản phẩm: " . $name . "<br>";
    }

   
    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->items as $item) {
            // Gọi getTotal() của CartItem
            $total += $item->getTotal();
        }

        return $total;
    }

    public function displayCart()
    {
        if (empty($this->items)) {
            echo "<p>Giỏ hàng đang trống.</p>";
            return;
        }

        echo "<h2>Danh sách giỏ hàng</h2>";

        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr>";
        echo "<th>Tên sản phẩm</th>";
        echo "<th>Đơn giá</th>";
        echo "<th>Số lượng</th>";
        echo "<th>Thành tiền</th>";
        echo "</tr>";

        foreach ($this->items as $item) {
            echo "<tr>";

            echo "<td>" . $item->getName() . "</td>";

            echo "<td>" . number_format($item->getPrice()) . " VNĐ</td>";

            echo "<td>" . $item->getQuantity() . "</td>";

            echo "<td>" . number_format($item->getTotal()) . " VNĐ</td>";

            echo "</tr>";
        }

        echo "</table>";

        echo "<h3>Tổng tiền: "
            . number_format($this->calculateTotal())
            . " VNĐ</h3>";
    }
}




try {

    $cart = new ShoppingCart();

    $item1 = new CartItem("Laptop", 15000000, 1);
    $item2 = new CartItem("Chuột", 300000, 2);
    $item3 = new CartItem("Bàn phím", 700000, 1);
    $item4 = new CartItem("Tai nghe", 500000, 2);

    $cart->addItem($item1);
    $cart->addItem($item2);
    $cart->addItem($item3);
    $cart->addItem($item4);

    echo "<hr>";

    $cart->displayCart();

    echo "<hr>";

    echo "<h3>Tổng tiền: "
        . number_format($cart->calculateTotal())
        . " VNĐ</h3>";

    echo "<hr>";

    $cart->removeItem("Chuột");

    echo "<hr>";

    $cart->displayCart();

} catch (Exception $e) {

    echo "Lỗi: " . $e->getMessage();

}?>