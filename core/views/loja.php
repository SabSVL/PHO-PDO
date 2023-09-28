<div class="container espaco-fundo">


    <!-- Titulo da pagina -->

    <div class="row">


        <div class="col-12 text-center my-4">
            <a href="?a=loja&c=todos" class="btn btn-primary">Todos</a>

            <?php foreach ($categorias as $categoria) : ?>
                <a href="?a=loja&c=<?= $categoria ?>" class="btn btn-primary"> <?= ucfirst($categoria) ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Produtos -->
    <div class="row">
        <?php if (count($produtos) == 0) : ?>
            <div class="text-center my-5">
                <h3>Não existem produtos disponiveis</h3>
            </div>
        <?php else : ?>

            <!-- Ciclo de apresentação dos produtos -->
            <?php foreach ($produtos as $produto) : ?>

                <div class="col-sm-4 col-6 p-2">
                    <div class="text-center p-3 box-produto">
                        <img src="../public/assets/images/produtos/<?= $produto->imagem ?>" class="img-fluid">
                        <h3><?= $produto->nome_produto ?></h3>
                        <h2> R$ <?= preg_replace("/\./", ",", $produto->preco) ?></h2>
                        <div>
                            <?php if($produto->stock > 0): ?>
                                <button class="btn btn-info" onclick="adicionar_carrinho(<?= $produto->id_produto ?>)"><i class="fas fa-shopping-cart m-2"></i> Adicionar ao carrinho</button>
                            <?php else:?>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart m-2"></i> Sem estoque</button>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>