<?php

class Student
{
	private $username;
	private $password;
	private $rank;
	private $fname;
	private $lname;
	private $dateCreated;
	
	function __construct($username, $password, $rank, $fname, $lname)
	{
		$this->username = $username;
		$this->password = $password;
		$this->rank = $rank;
		$this->fname = $fname;
		$this->lname = $lname;
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