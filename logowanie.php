<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Forum o psach</title>
	<link rel="stylesheet" href="styl4.css" />
</head>
<body>
<div>
</div>

<div id="baner">
<h1>Forum wielbicieli psów</h1>
</div>

<div id="lewy">
<img src="obraz.jpg" alt="foksterier" />
</div>

<div id="prawy1">
<h2>Zapisz się</h2>
		<form action="logowanie.php" method="post">
			<label>
				login:
				<input type="text" name="login" /><br/>
			</label>
			<label>
				hasło:
				<input type="password" name="haslo" /><br/>
			</label>
			<label>
				powtórz hasło:
				<input type="password" name="powhaslo" /><br/>
			</label>
			<input type="submit" value="Zapisz">
		</form>
<?php


	
	
	
if (!isset($_POST['login'], $_POST['haslo'], $_POST['powhaslo']))
{}
else
{	
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];	
	$powhaslo = $_POST['powhaslo'];	
	
	//$blad = false;
	$polacz = mysqli_connect ("localhost", "root", "", "psy");
	//empty($login)||empty($haslo)||empty($powhaslo
	if(empty($login)||empty($haslo)||empty($powhaslo))
	{
		echo "<p>wypełnij wszystkie pola</p>";
		//$blad = true;
	}
	else 
	{
		$sql = "SELECT login FROM uzytkownicy WHERE login LIKE '$login'";
		$wynik = mysqli_query($polacz, $sql);
		$wiersz=mysqli_num_rows($wynik);
	if ($wiersz>0)
		{ echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";	
		}
	else 
		{
			if ($haslo == $powhaslo)
				{
					$haslo=sha1($haslo);
					mysqli_query($polacz,"INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`) VALUES (null,'$login','$haslo');");
					
					echo "<p>Konto zostało dodane</p>";
				}
			else {
				echo "hasła nie są takie same, konto nie zostało dodane";
				}
					
				
		}
				
	}
			
			
			
		mysqli_close($polacz);			
	}
	
		


	
		
		

?>
</div>

<div id="prawy2">
<h2>Zapraszamy wszystkich</h2>
<ol>
			<li>właścicieli psów</li>
			<li>weterynarzy</li>
			<li>tych, co chcą kupić psa</li>
			<li>tych, co lubią psy</li>
		</ol>
		<a href="regulamin.html">Przeczytaj regulamin forum</a>
</div>

<div id="stopka">
Stronę wykonał: 01234567890
</div>



</body>
</html>