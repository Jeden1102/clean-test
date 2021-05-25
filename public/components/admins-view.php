<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
<div class="alert alert-danger fixed bottom-4 right-4 z-10" role="alert">
<button type="button" class="" data-toggle="tooltip" data-placement="top" title="Jesteś zalogowany jako adminstartor - po przejściu w pojedyncze ogłoszenie, masz możliwość zbanowania ogłoszenia.">
Sesja administartora
</button>
<i class="fas fa-info"></i>
<a href="../../back/logout.php" class="btn btn-danger ml-4">Wyloguj</a>
<a href="../../admin_panel/front/views/panel.php" class="btn btn-primary ml-4">Powrót do panelu</a>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>