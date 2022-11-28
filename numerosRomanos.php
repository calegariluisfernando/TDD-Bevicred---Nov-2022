<?php

class NumerosRomanos
{
    public function __construct()
    {
    }

    public function decimalParaRomano($numero): string {
        return 'I';
    }
}

class TestaNumeroRomano
{
    public function __construct()
    {
    }

    public function realizarTeste($numero): bool {

        if (!is_numeric($numero)) {
            echo "Não converte (valor não numérico)" . PHP_EOL;
            return false;
        }

        $numero = intval($numero);
        if ($numero < 1) {
            echo "Não converte (valor menor que 1)" . PHP_EOL;
            return false;
        }

        if ($numero === 1) {
            echo "I" . PHP_EOL;
        }

        return true;
    }
}

$teste = new TestaNumeroRomano();
$teste->realizarTeste(1);
