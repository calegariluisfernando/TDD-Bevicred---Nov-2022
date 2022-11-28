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

        if ($numero >= 1000000000) {
            echo "Não converte (valor maior que 1.000.000.000)" . PHP_EOL;
            return false;
        }

        $unidade    = $numero%10;
        $dezena     = ($numero-$unidade)%100;
        $centena    = ($numero-$dezena-$unidade)%1000;
        $uMilhar    = ($numero-$centena-$dezena-$unidade)%10000;
        $dMilhar    = ($numero-$uMilhar-$centena-$dezena-$unidade)%100000;
        $cMilhar    = ($numero-$dMilhar-$uMilhar-$centena-$dezena-$unidade)%1000000;

        $strRomano = "";
        if ($unidade > 0) {
            switch ($unidade) {
                case 1: $strRomano = "I";
                    break;
                case 2: $strRomano = "II";
                    break;
                case 3: $strRomano = "III";
                    break;
                case 4: $strRomano = "IV";
                    break;
                case 5: $strRomano = "V";
                    break;
                case 6: $strRomano = "VI";
                    break;
                case 7: $strRomano = "VII";
                    break;
                case 8: $strRomano = "VIII";
                    break;
                default: $strRomano = "IX";
                    break;
            }
        }

        echo "Unidade: " . $unidade . PHP_EOL;
        echo "Dezena: " . $dezena . PHP_EOL;
        echo "Centena: " . $centena . PHP_EOL;
        echo "Unidade de Milhar: " . $uMilhar . PHP_EOL;
        echo "Dezena de Milhar: " . $dMilhar . PHP_EOL;
        echo "Centena de Milhar: " . $cMilhar . PHP_EOL;

        return true;
    }
}

$teste = new TestaNumeroRomano();
$teste->realizarTeste(29550);
$teste->realizarTeste(1000000000);
