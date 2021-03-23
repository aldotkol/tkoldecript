<h1><?php echo "ciao"; ?></h1>

<?

//questo è un test
//$nome="Aldo";
/*
function stampaNome($arg)
{
	$nome = $arg;
	$stringa = <<<EOD
	Il mio nome è $nome
	EOD;
echo $stringa;

}
*/
//stampaNome($nome);

function test_static() {
    static $x = 0;
    $x = $x+1;
    echo $x;
}
test_static(); //stamperà 1
test_static(); //stamperà 2
test_static(); //stamperà 3


$eta_utenti = array(
'Simone' => 29,
'Josephine' => 30,
'Giuseppe' => 23,
'Renato' => 26,
'Gabriele' => 24
);
$somma_eta = 0;
foreach ($eta_utenti as $nome => $eta) {
echo "L'utente " . $nome . " ha " . $eta . " anni\n";
$somma_eta += $eta;
}
echo "La somma delle età degli utenti è: " . $somma_eta;

?>