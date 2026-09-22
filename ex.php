<?php

$students = [
    [
        "name" => "Nguyen Van An",
        "age" => 20,
        "score" => 8.5
    ],
    [
        "name" => "Tran Thi Binh",
        "age" => 21,
        "score" => 6.5
    ],
    [
        "name" => "Le Van Cuong",
        "age" => 19,
        "score" => 4.5
    ],
    [
        "name" => "Pham Thi Dung",
        "age" => 20,
        "score" => 7.5
    ]
];
foreach ($students as $student) {
    echo "Name: " . $student["name"] . "<br>";
    echo "Age: " . $student["age"] . "<br>";
    echo "Score: " . $student["score"] . "<br><br>";
}
$sumtotal = 0;
foreach ($students as $student) {
    $sumtotal += $student["score"];
}
$average = $sumtotal / count($students);
echo "Average score: " . $average . "<br>";


function caculateAverage($students)
{
    $sumtotal = 0;
    foreach ($students as $student) {
        $sumtotal += $student["score"];
    }
    return $sumtotal / count($students);
}
function getRank($score)
{
    if ($score >= 8) {
        return "Excellent";
    } elseif ($score >= 6.5) {
        return "Good";
    } elseif ($score >= 5) {
        return "Average";
    } else {
        return "Weak";
    }
}
function displayStudent($students)
{
    foreach ($students as $student) {
        echo "Name: " . $student["name"] . "<br>";
        echo "Age: " . $student["age"] . "<br>";
        echo "Score: " . $student["score"] . "<br>";
        echo "Rank: " . getRank($student["score"]) . "<br><br>";
    }
}
function findBestStudent($students)
{
    $bestStudent = $students[0];
    foreach ($students as $student) {
        if ($student["score"] > $bestStudent["score"]) {
            $bestStudent = $student;
        }
    }
    return $bestStudent;
}
function findWorstStudent($students)
{
    $worstStudent = $students[0];
    foreach ($students as $student) {
        if ($student["score"] < $worstStudent["score"]) {
            $worstStudent = $student;
        }
    }
    return $worstStudent;
}
function countPassedStudents($students)
{
    $count = 0;
    foreach ($students as $student) {
        if ($student["score"] >= 5) {
            $count++;
        }
    }
    return $count;
}
function findStudentsByName($students, $name)
{
    $result = [];
    foreach ($students as $student) {
        if (stripos($student["name"], $name) !== false) {
            $result[] = $student;
        }
    }
    return $result;
}





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