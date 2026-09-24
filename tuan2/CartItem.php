<?php

class CartItem
{
    private $name;
    private $price;
    private $quantity;

  
    public function __construct($name, $price, $quantity)
    {
        
        if ($price <= 0) {
            throw new Exception("Giá sản phẩm phải lớn hơn 0.");
        }

        
        if ($quantity <= 0) {
            throw new Exception("Số lượng phải lớn hơn 0.");
        }

        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    
    public function getTotal()
    {
        return $this->price * $this->quantity;
    }

    
    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}





?>