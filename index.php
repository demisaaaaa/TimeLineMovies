<!DOCTYPE html>
<html lang="pt-BR" data-theme="dark">

<body>
    <main class="container">

        <h2><header>Tudo certo!</header></h2>
        <p>
           <h3>O filme foi cadastrado!</h3> 
        </p>
    </main>
    <!-- funcao de confirmacacao em javascript para a exclusao-->
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url;
        }
    </script>
    <p><a href="telaprincipal.html"><button value="telaprincipal.html">Ir para tela principal</button></a></p>
</body>
</html>