<?php 
class DB {
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname = 'app_note_php';
	// Khai báo các biến kết nối toàn cục
	public $cn = NULL;
	public function connect() {
		$this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
	}
	public function close() {
		if ($this->cn) {
			mysqli_close($this->cn);
		}
	}
	public function query($sql = null) {       
		if ($this->cn) {
			mysqli_query($this->cn, $sql);
		}
	}
	public function num_rows($sql = null) 
	{
		if ($this->cn) {
			$query = mysqli_query($this->cn, $sql);
			$row = mysqli_num_rows($query);
			return $row;
		}
	}
	// Hàm lấy dữ liệu
	public function fetch_assoc($sql = null, $type)
	{
		if ($this->cn) {
			$query = mysqli_query($this->cn, $sql);
            // Nếu tham số type = 0
			if ($type == 0) {
				while ($row = mysqli_fetch_assoc($query))
				{
					$data[] = $row;
				}
				return $data;
			}
            // Nếu tham số type = 1
			else if ($type == 1) {
				$data = mysqli_fetch_assoc($query);
				return $data;
			}       
		}
	}
	// Hàm xử lý chuỗi dữ liệu truy vấn
	public function real_escape_string($string) {
		if ($this->cn) {
			$string = mysqli_real_escape_string($this->cn, $string);
		}
		else {
			$string = $string;
		}
		return $string;
	}
	// Hàm lấy ID vừa insert
	public function insert_id() {
		if ($this->cn) {
			return mysqli_insert_id($this->cn);
		}
	}
}

?>
