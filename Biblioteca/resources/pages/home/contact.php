<?
    use Src\Model\Page\Contacts;

    if (empty($_POST) != 1){
        if ((new Contacts($_POST))->insert()) {
            echo "<script>document.location='./resources/pages/status/success.php'</script>";
        } else {
            echo "<script>document.location='./resources/pages/status/error.php'</script>";
        }
    }

?>

<head>
    <title>Contato | Biblio</title>
</head>


<section id="form" class="mt-5 container">
    <div class="row  content">
        <div class="col-lg-6">
            <div id="headingGroup">
                <ion-icon name="information-circle-outline"></ion-icon>
                <h2>Fale conosco</h2>
                <p>Em caso de qualquer dúvida pode entrar em contato.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <form method="post" action="?page=contato">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="name">Seu nome</label>
                        <input type="text" id="inputs" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="business_name">Quero falar sobre:</label><br>
                        <select name="topic" id="inputs"class="col-lg-12">
                            <option value="0" selected disabled>Selecione</option>
                            <option value="1">Duvidas gerais</option>
                            <option value="2">Suporte</option>
                            <option value="3">Outros</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="email">Email</label>
                        <input type="email" id="inputs" class="form-control"name="email" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="phone">Telefone</label>
                        <input type="text" id="inputs" class="form-control" name="phone" minlength="10" maxlength="12" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Mensagem</label>
                    <textarea class="form-control" id="inputs" rows="5" name="description" required></textarea>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn_base primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</section>