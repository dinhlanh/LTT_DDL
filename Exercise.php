<?php
	// Trait Active
	trait Active
	{
	    public function defindYourSelf()
	    {
	        return get_class();
	    }
	}
	
	//abtract
	abstract class Country implements Boss
	{
	    protected $slogan;

	    public function setSlogan(string $slogan)
	    {
	        $this->slogan = $slogan;
	    }

	    abstract function sayHello();
	}

	//interface
	Interface Boss
	{
	    public function checkValidSlogan();
	}

	//class EnglandCountry
	class EnglandCountry extends Country
	{
	    // Use active
	    use Active;

	    public function sayHello()
	    {
	        echo 'XIN CHÀO EnglandCountry';
	    }

	    public function checkValidSlogan()
	    {
	        $string = strtolower($this->slogan);
	        $English = strpos($string, 'english');
	        $England = strpos($string, 'england');
	        
	        if ($England !== false || $English !== false) {
	            return true;
	        }
	        return false;
	    }
	}

	//class VietnamCountry
	class VietnamCountry extends Country
	{
	    // Use active
	    use Active;

	    public function sayHello()
	    {
	        echo 'Xin chao VietnamCountry';
	    }

	    public function checkValidSlogan()
	    {
	        $string = strtolower($this->slogan);
	        $Hust = strpos($string, 'hust');
	        $Vietnam = strpos($string, 'vietnam');

	        if (($Vietnam !== false && $Hust !== false)) {
	            return true;
	        }
	        return false;
	    }
	}

	$englandCountry = new EnglandCountry();
	$vietnamCountry = new VietnamCountry();
	$englandCountry->setSlogan('England is a country that is part of the United Kingdom. It shares
	land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England
	and the Celtic Sea to the southwest.');
	$vietnamCountry->setSlogan('Vietnam is the easternmost country on the Indochina Peninsula.
	With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the
	world.');
	$englandCountry->sayHello(); // Hello
	echo "<br>";
	$vietnamCountry->sayHello(); // Xin chao
	echo "<br>";

	var_dump($englandCountry->checkValidSlogan()); // true
	echo "<br>";
	var_dump($vietnamCountry->checkValidSlogan()); // false

?>