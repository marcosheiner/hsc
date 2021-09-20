<footer class="footer mt-5 py-3 footer-pages">
  <div class="area-footer p-5">
    <div class="row">
      <div class="col-xl-3 col-md-4">
        <h1 class="h5 mb-3">Talys Eduardo | Corretor</h1>
        <p class="mb-5">Realizando o seu melhor negócio! Compra e venda de imóveis na região do Cariri</p>
        <p class="text-light"><small>CRECI 20748</small></p>
      </div>
      <div class="col-xl-2 col-md-3">
        <h1 class="h5 mb-3"><i class="fas fa-bars"></i></h1>
        <a href="" class="text-light">
          <p><small>Sobre</small></p>
        </a>
        <a href="" class="text-light">
          <p><small>Suporte</small></p>
        </a>
        <a href="" class="text-light">
          <p><small>Anúncios</small></p>
        </a>
      </div>
      <div class="col-xl-3 col-md-4">
        <h1 class="h5 mb-3">Redes Sociais</h1>
        <a href="" class="text-light">
          <p><small><i class="fab fa-instagram"></i> Instagram</small></p>
        </a>
      </div>
    </div>


  </div>
  <div class="text-center">
    <p><small><a href="" class="text-light">G-Dev</a> - Desenvolvimento de Sistemas | Copyright 2021 </small> </p>
  </div>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
  jQuery(function($) {
    $("#cep").mask("00000-000");
    $("#valor").mask('#.##0,00', {
      reverse: true
    });
    $("#telefone").mask("(99) 99999-9999");
    $("#wpp").mask("(99) 99999-9999");

  });
</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
</body>

</html>