<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<title>Postagens</title>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
			  <a class="navbar-brand" href="">Forum</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="login.html">Login</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="resgistro.html">Registro</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="postagens.php">Postagens</a>
				  </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="criarpostagem.html">Criar Postagens</a>
            </li>
				  
				</ul>
			  </div>
			</div>
		  </nav>


		<div class="col-sm-11 col-xs-12" style="margin: 0 auto;">
			<div class="card" style="border-width: 5px;border-color: darkslateblue;margin-top: 1rem;" >
				<div class="card-body">
          <h3 class="card-title text-center">Postagens</h3>
          <?php
            include '../classes/postagem.php';
            include '../conexao.php';
            session_start();
            $postagens=Postagem::pegarPostagens($conexao);
          ?>



          <?php while ($row = pg_fetch_assoc($postagens)) : ?>
            <div class="card" style="margin: 0.5rem;">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['titulo']) ?></h5>
                <strong class="text-primary">Postado em <?= htmlspecialchars($row['data_postagem']) ?></strong>
                              
                <p class="card-text">
                  <?= htmlspecialchars($row['conteudo']) ?>
                </p>

                <form action="../criarcomentario.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="comentario" class="form-control" placeholder="Insira um comentário">
                        <input name="cod_postagem" 
                        type="hidden" value=<?= htmlspecialchars($row['cod_postagem']) ?> >
                        <input name="cod_usuario" 
                        type="hidden"value=<?= htmlspecialchars($_SESSION['cod_usuario']) ?> >

                        <button class="btn btn-success" type="submit">Enviar</button>
                      </div>
                </form>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Comentários
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <?php
                        include_once '../classes/comentario.php';
                        include_once '../conexao.php';

                        $comentarios=Comentario::pegarComentarios($conexao,$row['cod_postagem']);
                        ?>

                        <?php while ($row = pg_fetch_assoc($comentarios)) : ?>
                          <div class="accordion-body">Anônimo:
                            <code><?= htmlspecialchars($row['comentario']) ?></code>
                          </div>
                        <?php endwhile?>

                        <?php
                          unset($comentarios);
                        ?>
                        
                        
                      </div>
                    </div>
                </div>

              </div>
           </div>
          <?php endwhile?>
                   
				</div>
			</div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>

		</div>


	</body>

</html>