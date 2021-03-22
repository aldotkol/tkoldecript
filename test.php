<h1><?php echo "ciao"; ?></h1>

<?

//questo è un test
$nome="Aldo";

function stampaNome($arg)
{
	$nome = $arg;
	$stringa = <<<EOD
	Il mio nome è $nome
	EOD;
echo $stringa;

}

stampaNome($nome);

?>