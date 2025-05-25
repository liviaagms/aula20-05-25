<?php



class Cliente
{
   
    public string $logradouro;
    public string   $bairro;

 
    public function __construct(string $logradouro, string $bairro)
    {
        $this->logradouro = $logradouro;
        $this->bairro     = $bairro;
    }

  
    public function verEndereco(): string
    {
        return "Endereço: {$this->logradouro}, Bairro: {$this->bairro}";
    }
}


class ClientePessoaFisica extends Cliente
{
    
    public string $nome;
    public int    $cpf;

    
    public function __construct(string $logradouro, string $bairro, string $nome, int $cpf)
    {
        parent::__construct($logradouro, $bairro);
        $this->nome = $nome;
        $this->cpf  = $cpf;
    }

    
    public function verInformacaoUsuario(): string
    {
        
        $endereco = $this->verEndereco();
        return "Cliente Físico: {$this->nome} (CPF: {$this->cpf})\n{$endereco}";
    }
}


class ClientePessoaJuridica extends Cliente
{
   
    public int    $cnpj;
    public string $nomeFantasia;

    public function __construct(string $logradouro, string $bairro, int $cnpj, string $nomeFantasia)
    {
        parent::__construct($logradouro, $bairro);
        $this->cnpj          = $cnpj;
        $this->nomeFantasia  = $nomeFantasia;
    }

   
    public function verInformacaoEmpresa(): string
    {
        $endereco = $this->verEndereco();
        return "Cliente Jurídico: {$this->nomeFantasia} (CNPJ: {$this->cnpj})\n{$endereco}";
    }
}


$pf = new ClientePessoaFisica(
    logradouro: "Rua A, 123",
    bairro:     34567,
    nome:       "ANNA LÍVIA",
    cpf:        12345678901
);
echo $pf->verInformacaoUsuario(), "\n\n";

$pj = new ClientePessoaJuridica(
    logradouro:   "Av. B, 456",
    bairro:       76588,
    cnpj:         9876543210001,
    nomeFantasia: "CREUZA"
);
echo $pj->verInformacaoEmpresa(), "\n";
?>