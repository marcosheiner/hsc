<?php
session_start();
include "../config/conn.php";
if (isset($_SESSION['email_user']) && isset($_SESSION['id'])) {   ?>
  <!--//////////////////////////////////////////////////////////////////-->

  <?php include '../includes/menudashboard.php'; ?>

  <main role="main" class="mt-3 col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h1 class="h3 mb-3" style="font-weight: 700;">Criar Anúncio</h1>

    <!--formulário para criar anuncio-->
    <form action="" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
      <small class="text-muted"><span>Responsável e Localidade
          <hr>
        </span></small>
      <div class="form-row mt-3">

        <div class="form-group col-md-3">
          <label for="">Corretor Responsável<span class="text-danger">*</span></label>
          <input type="text" class="form-control text-capitalize" name="nameCorretor" placeholder="Corretor Responsável" required>
          <div class="invalid-feedback">
            Digite um nome.
          </div>
        </div>

        <div class="form-group col-md-3">
          <label for="">CRECI<span class="text-danger">*</span></label>
          <input type="number" class="form-control text-capitalize" name="creci" placeholder="CRECI" required>
          <div class="invalid-feedback">
            Digite um creci.
          </div>
        </div>

        <div class="form-group col-md-3">
          <label for="">Tipo de Anúncio<span class="text-danger">*</span></label>
          <select class="form-control" name="tipo_anuncio" required>
            <option value="" disabled selected>Escolha uma opção</option>
            <option value="Aluguel">Aluguel</option>
            <option value="Venda">Venda</option>
          </select>
          <div class="invalid-feedback">
            Escolha o tipo.
          </div>
        </div>

        <div class="form-group col-md-3">
          <label for="">Visibilidade<span class="text-danger">*</span></label>
          <select class="form-control" name="visibilidade" required>
            <option value="" disabled selected>Escolha uma opção</option>
            <option value="Disponível">Disponível</option>
          </select>
        </div>

      </div>
      <!--form row-->
      <div class="form-row">

        <div class="form-group col-md-3">
          <label for="">Cidade<span class="text-danger">*</span></label>
          <select class="form-control" name="cidade" required>
            <option value="" disabled selected>Escolha uma cidade</option>
            <option value="Juazeiro do Norte - CE">Juazeiro do Norte - CE</option>
            <option value="Crato - CE">Crato - CE</option>
            <option value="Barbalha - CE">Barbalha - CE</option>
          </select>
          <div class="invalid-feedback">
            Escolha uma cidade.
          </div>
        </div>



        <div class="form-group col-md-3">
          <label for="">Endereço com número<span class="text-danger">*</span></label>
          <input type="text" class="form-control text-capitalize" name="endereco" placeholder="Rua Exemplo, 123" required>
          <div class="invalid-feedback">
            Digite um endereço.
          </div>
        </div>

        <div class="form-group col-md-3">
          <label for="">Bairro<span class="text-danger">*</span></label>
          <input type="text" class="form-control text-capitalize" name="bairro" placeholder="Bairro" required>
          <div class="invalid-feedback">
            Digite um bairro.
          </div>
        </div>

        <div class="form-group col-md-3">
          <label for="">CEP<span class="text-danger">*</span></label>
          <input type="text" class="form-control text-capitalize" id="cep" name="cep" placeholder="CEP" required>
          <div class="invalid-feedback">
            Digite um CEP.
          </div>
        </div>

      </div>
      <!--form row-->
      <small class="text-muted"><span>Contato do corretor
          <hr>
        </span></small>

      <div class="form-row mt-3">

        <div class="form-group col-md-6">
          <label for="">Telefone<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
          <div class="invalid-feedback">
            Digite um telefone.
          </div>
        </div>

        <div class="form-group col-md-6">
          <label for="">Whatsapp<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="wpp" name="wpp" placeholder="Whatsapp" required>
          <div class="invalid-feedback">
            Digite um número de Whatsapp.
          </div>
        </div>

      </div>
      <!--form row-->

      <small class="text-muted"><span>Informações sobre o imóvel
          <hr>
        </span></small>

      <div class="form-row mt-3">

        <div class="form-group col-md-4">
          <label for="">Foto Fachada<span class="text-danger">*</span></label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="ftfachada" id="customFileFachada" required>
            <label class="custom-file-label" for="customFileFachada">Escolher foto</label>
            <div class="invalid-feedback">
              Selecione uma foto de fachada.
            </div>
          </div>
        </div>

        <div class="form-group col-md-4">
          <label for="">Foto dos Cômodos<span class="text-danger">*</span></label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="ftcomodos[]" id="customFile" multiple required>
            <label class="custom-file-label" for="customFile">Selecionar Fotos</label>
            <div class="invalid-feedback">
              Selecione as fotos dos cômodos.
            </div>
          </div>
        </div>

        <div class="form-group col-md-4">
          <label for="">Valor do Imóvel<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="valor" name="valor" placeholder="R$ 0.000,00" required>
          <div class="invalid-feedback">
            Digite um valor.
          </div>
        </div>

      </div>
      <!--form row-->

      <div class="form-row mt-3">

        <div class="form-group col-md-4">
          <label for="">Quantidade de quartos<span class="text-danger">*</span></label>
          <select class="form-control" name="qtd_quartos" required>
            <option value="" disabled selected>Selecione a quantidade</option>
            <option value="3">1</option>
            <option value="3">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="Mais de 10">Mais de 10</option>
          </select>
          <div class="invalid-feedback">
            Informe a quantidade.
          </div>
        </div>

        <div class="form-group col-md-4">
          <label for="">Suíte(s)<span class="text-danger">*</span></label>
          <select class="form-control" name="qtd_suites" required>
            <option value="" disabled selected>Selecione a quantidade</option>
            <option value="3">0</option>
            <option value="3">1</option>
            <option value="3">2</option>
            <option value="4">3</option>
            <option value="4">4</option>
            <option value="4">5</option>
          </select>
          <div class="invalid-feedback">
            Informe a quantidade.
          </div>
        </div>

        <div class="form-group col-md-4">
          <label for="">Quantidade de banheiros<span class="text-danger">*</span></label>
          <select class="form-control" name="qtd_banheiros" required>
            <option value="" disabled selected>Selecione a quantidade</option>
            <option value="3">1</option>
            <option value="3">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <div class="invalid-feedback">
            Informe a quantidade.
          </div>
        </div>

      </div>
      <!--form row-->

      <div class="form-row mt-3">
        <label for="">Descrição do anúncio<span class="text-danger">*</span></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" required></textarea>
        <div class="invalid-feedback">
          Digite uma descrição.
        </div>
      </div>
      <!--form row-->
      <button type="submit" name="cadastrar_anuncio" class="btn btn-anunciar pl-5 pr-5 mt-4 mb-4">Anunciar</button>
    </form>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {

          var forms = document.getElementsByClassName('needs-validation');

          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </main>

  </div>
  <!--ROW-->
  </div>
  <!--container-->
  <?php include '../includes/footer.php'; ?>


  <!--//////////////////////////////////////////////////////////////////-->
<?php } else {
  header("Location: ../home/login.php");
} ?>