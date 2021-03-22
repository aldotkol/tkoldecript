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

function test_static() {
    static $x = 0;
    $x = $x+1;
    echo $x;
}
test_static(); //stamperà 1
test_static(); //stamperà 2
test_static(); //stamperà 3

?>