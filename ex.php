<?php

class Student
{
    public string $name;
    public int $age;
    public float $score;

    public function __construct(string $name, int $age, float $score)
    {
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    }

    public function getRank(): string
    {
        if ($this->score >= 8) {
            return "Excellent";
        } elseif ($this->score >= 6.5) {
            return "Good";
        } elseif ($this->score >= 5) {
            return "Average";
        }

        return "Weak";
    }

    public function isPassed(): bool
    {
        return $this->score >= 5;
    }

    public function display(): void
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Score: " . $this->score . "<br>";
        echo "Rank: " . $this->getRank() . "<br>";
        echo "Status: " . ($this->isPassed() ? "Passed" : "Failed") . "<br><br>";
    }
}

$student1 = new Student("Nguyen Van An", 20, 8.5);
$student2 = new Student("Tran Thi Binh", 21, 6.5);
$student3 = new Student("Le Van Cuong", 19, 4.5);
$student4 = new Student("Pham Thi Dung", 20, 7.5);

$students = [$student1, $student2, $student3, $student4];

foreach ($students as $student) {
    $student->display();
}

?>