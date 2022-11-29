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

        if ($numero > 3999) {
            echo "Não converte (valor maior que 3999)" . PHP_EOL;
            return false;
        }

        $unidade    = $numero%10;
        $dezena     = ($numero-$unidade)%100;
        $centena    = ($numero-$dezena-$unidade)%1000;
        $uMilhar    = ($numero-$centena-$dezena-$unidade)%10000;

        $strRomano = "";
        if ($unidade > 0) {
            switch ($unidade) {
                case 1: $strRomano = "I"; break;
                case 2: $strRomano = "II"; break;
                case 3: $strRomano = "III"; break;
                case 4: $strRomano = "IV"; break;
                case 5: $strRomano = "V"; break;
                case 6: $strRomano = "VI"; break;
                case 7: $strRomano = "VII"; break;
                case 8: $strRomano = "VIII"; break;
                default: $strRomano = "IX"; break;
            }
        }


        if ($dezena > 0) {
            switch ($dezena) {
                case 10: $strRomano = "X" . $strRomano; break;
                case 20: $strRomano = "XX" . $strRomano; break;
                case 30: $strRomano = "XXX" . $strRomano; break;
                case 40: $strRomano = "XL" . $strRomano; break;
                case 50: $strRomano = "L" . $strRomano; break;
                case 60: $strRomano = "LX" . $strRomano; break;
                case 70: $strRomano = "LXX" . $strRomano; break;
                case 80: $strRomano = "LXXX" . $strRomano; break;
                default: $strRomano = "XC" . $strRomano; break;
            }
        }

        if ($centena > 0) {
            switch ($centena) {
                case 100: $strRomano = "C" . $strRomano; break;
                case 200: $strRomano = "CC" . $strRomano; break;
                case 300: $strRomano = "CCC" . $strRomano; break;
                case 400: $strRomano = "CD" . $strRomano; break;
                case 500: $strRomano = "D" . $strRomano; break;
                case 600: $strRomano = "DC" . $strRomano; break;
                case 700: $strRomano = "DCC" . $strRomano; break;
                case 800: $strRomano = "DCCC" . $strRomano; break;
                default: $strRomano = "CM" . $strRomano; break;
            }
        }

        if ($uMilhar > 0) {
            switch ($uMilhar) {
                case 1000: $strRomano = "M" . $strRomano; break;
                case 2000: $strRomano = "MM" . $strRomano; break;
                default: $strRomano = "MMM" . $strRomano; break;
            }
        }

        echo "Numero: " . $strRomano . PHP_EOL;
        return true;
    }
}

$teste = new TestaNumeroRomano();
$teste->realizarTeste(3999);
$teste->realizarTeste(1000000000);
