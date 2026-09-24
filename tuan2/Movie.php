<?php
class Movie
{
    private $id;
    private $title;
    private $price;
    private $totalSeats;
    private $availableSeats;
    public function __construct($id, $title, $price, $totalSeats)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->totalSeats = $totalSeats;
        $this->availableSeats = $totalSeats;
    }
    public function bookTickets($quantity)
    {
        if ($quantity <= 0) {
            throw new Exception("Số lượng vé phải lớn hơn 0.");
        }

        if ($quantity > $this->availableSeats) {
            throw new Exception("Không đủ vé trống. Vui lòng chọn số lượng nhỏ hơn hoặc bằng " . $this->availableSeats);
        }

        $this->availableSeats -= $quantity;
    }
    public function cancelTicket($quantity){
        
        if ($quantity <= 0) {
            throw new Exception("Số lượng vé phải lớn hơn 0.");
        }

        if ($quantity > $this->getSoldSeats()) {
            throw new Exception("Không thể hủy vé. Số lượng vé hủy vượt quá số vé đã bán.");
        }

        $this->availableSeats += $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSoldSeats()
    {
        return $this->totalSeats - $this->availableSeats;
    }

    public function getRevenue()
    {
        return $this->getSoldSeats() * $this->price;
    }

    public function displayInfo()
    {
        echo "<h2>Thông tin phim</h2>";
        echo "<p>ID: " . $this->id . "</p>";
        echo "<p>Tiêu đề: " . $this->title . "</p>";
        echo "<p>Giá vé: " . number_format($this->price) . " VNĐ</p>";
        echo "<p>Tổng số ghế: " . $this->totalSeats . "</p>";
        echo "<p>Số ghế trống: " . $this->availableSeats . "</p>";
        echo "<p>Số ghế đã bán: " . $this->getSoldSeats() . "</p>";
        echo "<p>Doanh thu: " . number_format($this->getRevenue()) . " VNĐ</p>";
    }
    



    public function findMovieById($movies, $id)
    {
        foreach ($movies as $movie) {
            if ($movie->getId() === $id) {
                return $movie;
            }
        }

        return null;
    }
    public function getTotalRevenue($movies)
    {
        $totalRevenue = 0;
        foreach ($movies as $movie) {
            $totalRevenue += $movie->getRevenue();
        }
        return $totalRevenue;
    }
    public function getBestSellingMovie($movies)
    {
        $bestSellingMovie = null;
        $maxRevenue = 0;
        foreach ($movies as $movie) {
            $revenue = $movie->getRevenue();
            if ($revenue > $maxRevenue) {
                $maxRevenue = $revenue;
                $bestSellingMovie = $movie;
            }
        }
        return $bestSellingMovie;
    }
}
try {
    $movie1 = new Movie(1, "Avengers: Endgame", 100000, 100);
    $movie2 = new Movie(2, "The Lion King", 80000, 80);
    $movie3 = new Movie(3, "Joker", 120000, 120);

    $movies = [$movie1, $movie2, $movie3];

    // Hiển thị thông tin phim
    foreach ($movies as $movie) {
        $movie->displayInfo();
        echo "<hr>";
    }

    // Đặt vé cho một số phim
    $movie1->bookTickets(-5);
    $movie2->bookTickets(30);
    $movie3->bookTickets(70);

    // Hủy vé cho một số phim
    $movie1->cancelTicket(200);
    $movie2->cancelTicket(5);

    // Hiển thị thông tin phim sau khi đặt và hủy vé
    foreach ($movies as $movie) {
        $movie->displayInfo();
        echo "<hr>";
    }

    // Tính tổng doanh thu
    $totalRevenue = $movie1->getTotalRevenue($movies);
    echo "<h3>Tổng doanh thu: " . number_format($totalRevenue) . " VNĐ</h3>";

    // Tìm phim bán chạy nhất
    $bestSellingMovie = $movie1->getBestSellingMovie($movies);
    if ($bestSellingMovie !== null) {
        echo "<h3>Phim bán chạy nhất: " . $bestSellingMovie->getTitle() . "</h3>";
        echo "<p>Doanh thu: " . number_format($bestSellingMovie->getRevenue()) . " VNĐ</p>";
    } else {
        echo "<p>Không có phim bán chạy nhất.</p>";
    }
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>