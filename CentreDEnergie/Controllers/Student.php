<?php

class Student
{
	private $studentID;
	private $username;
	private $password;
	private $rank;
	private $fname;
	private $lname;
	private $dateCreated;
	
	function __construct($StudentID, $Username, $Password, $Rank, $Fname, $Lname)
	{
		$this->studentID = $StudentID;
		$this->username = $Username;
		$this->password = $Password;
		$this->rank = $Rank;
		$this->fname = $Fname;
		$this->lname = $Lname;
	}
	
	
	
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	public function getRank()
	{
		return $this->rank;
	}
	public function getFName()
	{
		return $this->fname;
	}
	public function getLName()
	{
		return $this->lname;
	}
	public function getDateCreated()
	{
		return $this->dateCreated;
	}
}


?>