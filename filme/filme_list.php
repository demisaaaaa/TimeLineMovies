<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">


<body>
    <main class="container">
        <?php include 'menu.php'; ?>
        <?php desenhar_combobox() ?>
        <br>
        <?php desenhar_cards() ?>
        <br>
        <?php desenhar_tabela() ?>
    </main>
    <!-- funcao de confirmacacao em javascript para a exclusao-->
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
</body>

</html>