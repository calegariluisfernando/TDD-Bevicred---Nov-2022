<?php 

class Produto
{
    private $nome;
    private $valor;

    public function __construct($nome, $valor)
    {
        $this->nome = $nome;
        $this->valor = $valor;
    }

    function getNome()
    {
        return $this->nome;
    }

    function getValor()
    {
        return $this->valor;
    }
}

class CarrinhoDeCompras
{
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayObject();
    }

    public function adiciona(Produto $produto)
    {
        $this->produtos->append($produto);
        return $this;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function maiorValor()
    {
        if (count($this->getProdutos()) === 0) {
            return 0;
        }

        $maiorValor = $this->getProdutos()[0]->getValor();
        foreach ($this->getProdutos() as $produto) {
            if ($maiorValor < $produto->getValor()) {
                $maiorValor = $produto->getValor();
            }
        }
        return $maiorValor;
    }
}

class MaiorEMenor
{
    private $menor;
    private $maior;

    public function __construct()
    {
    }

    public function getMenor()
    {
        return $this->menor;
    }

    public function setMenor($menor)
    {
        $this->menor = $menor;
    }

    public function getMaior()
    {
        return $this->maior;
    }

    public function setMaior($maior)
    {
        $this->maior = $maior;
    }

    public function encontra(CarrinhoDeCompras $carrinho) {
        foreach ($carrinho->getProdutos() as $produto) {
            if (empty($this->menor) || $produto->getValor() < $this->menor->getValor()) {
                $this->menor = $produto;
            } else if (empty($this->maior) || $produto->getValor() > $this->maior->getValor()) {
                $this->maior = $produto;
            }
        }
    }
}

class TestaMaiorEMenor
{
    public function __construct()
    {
    }

    public function realizaTeste()
    {
        $carrinho = new CarrinhoDeCompras();
        $carrinho->adiciona( new Produto("Liquidificador", 250.00));
        $carrinho->adiciona( new Produto("Geladeira", 450.00));
        $carrinho->adiciona( new Produto("Jogo de pratos", 70.00));

        $maiorEMenor = new MaiorEMenor();
        $maiorEMenor->encontra($carrinho);
        
        echo "O menor produto: ";

        echo $maiorEMenor->getMenor()->getNome() . PHP_EOL;
        echo "O maior produto: ";
        echo $maiorEMenor->getMaior()->getNome() . PHP_EOL;
    }
}

$c = new TestaMaiorEMenor();
$c->realizaTeste();

