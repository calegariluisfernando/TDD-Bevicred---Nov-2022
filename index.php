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
        if (count($this->getItens()) === 0) {
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