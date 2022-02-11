<?
class Banco{
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    public function __construct($numConta, $tipo, $dono){
        $this->numConta = $numConta;
        $this->tipo = $tipo;
        $this->dono = $dono;
        $this->abrirConta();
    }

    public function setSaldo($value){
        $this->saldo = $value;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function abrirConta(){
        if ($this->status){
            echo "<p>Conta já aberta</p>";
        } else {
            $this->status = true;

            if ($this->tipo == 'CC'){
                $this->saldo += 50;
            } else {
                $this->saldo += 150;
            }

            echo "<p>Criado com sucesso.</p>";
        }
    }

    public function fecharConta() {
        if ($this->status && $this->saldo == 0){
            $this->status = false;
            echo "<p>Conta Fechada</p>";
        } else {
            echo "<p>Não é possível fechar</p>";
        } 
    }

    public function depositar($value){
        if ($this->status){
            $this->saldo += $value;
        } else {
            echo "<p>Conta fechada</p>";
        }
    }

    public function sacar($value){
        if ($this->status){
            if ($this->saldo > $value){
                $this->saldo -= $value;
            } else {
                echo "Sem saldo Suficiente";
            }
            
        } else {
            echo "<p>Conta fechada</p>";
        }
    }

    public function pagarMensal(){
        if ($this->tipo == 'CC'){
            $value = 12;
        } else {
            $value = 20;
        }

        if ($this->status){
            $this->setSaldo($this->getSaldo - $value);
        } else {
            echo "<p>Erro com a conta<./p>";
        }
    }

}