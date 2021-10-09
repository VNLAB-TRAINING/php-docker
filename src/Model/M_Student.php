<?php
include_once("E_Student.php");

class Model_Student
{
	public function __construct()
	{}
	
	public function getAllStudent()
	{	
		$link = mysqli_connect("db", "root", "example", "school") or die ("Khong the ket noi den CSDL MySQL ".mysqli_connect_error());
    	mysqli_select_db($link, "dulieusinhvien");
    	$sql = "SELECT * FROM student";
    	$result = mysqli_query($link, $sql);
		$val = array();
		$i = 1;
		while ($row = mysqli_fetch_array($result)) {
			$val[$i] = new Entity_Student($row['id'], $row['name'], $row['age'], $row['university']);
			$i++;
		}
		return $val; 
	}
	
	public function timkiem($search, $select)
	{
		$link = mysqli_connect("db", "root", "example", "school") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link, "dulieusinhvien");
		$sql = "";
		if($search == "") {
			echo "<h2>Yêu cầu nhập vào thanh tìm kiếm</h2>";
		} else {
			if($select == 'id') $sql = "SELECT * FROM student WHERE id = $search";
			elseif($select == 'name') $sql = "SELECT * FROM student WHERE name LIKE '%$search%'";
			elseif($select == 'age') $sql = "SELECT * FROM student WHERE age LIKE '%$search%'";
			elseif($select == 'university') $sql = "SELECT * FROM student WHERE university LIKE '%$search%'";
			$result = mysqli_query($link, $sql);
			$val = array();
			$i = 1;
			while ($row = mysqli_fetch_array($result)) {
				$val[$i] = new Entity_Student($row['id'], $row['name'], $row['age'], $row['university']);
				$i++;
			}
			
			return $val; 
		}
	}

	public function getStudentDetail($stid)
	{
		$allStudent = $this->getAllStudent();
		return $allStudent[$stid];
	}

	public function them($id, $name, $age, $university)
	{
		$link = mysqli_connect("db", "root", "example", "school") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link, "dulieusinhvien");
		$sql = "INSERT INTO student VALUES ('$id', '$name', '$age', '$university')";
		mysqli_query($link, $sql);
	}

	public function sua($id, $name, $age, $university)
	{
		$link = mysqli_connect("db", "root", "example", "school") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link, "dulieusinhvien");
		$sql = "UPDATE student SET name = '$name', age = '$age', university = '$university' WHERE id = '$id'";
		mysqli_query($link, $sql);
	}
	
	public function xoa($id)
	{
		$link = mysqli_connect("db", "root", "example", "school") or die ("Khong the ket noi den CSDL MySQL");
		mysqli_select_db($link, "dulieusinhvien");
		$sql = "DELETE FROM student WHERE id = '$id'";
		mysqli_query($link, $sql);
	}
}

?>
