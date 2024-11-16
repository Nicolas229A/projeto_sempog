<?php
require_once ("inicio-html.php");
?>
<div class="container">
<a class="btn btn-primary" href="/">Cadastrar candidato</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Escolaridade</th>
      <th scope="col">Instituição</th>
      <th scope="col">Resumo</th>
      <th scope="col">Artigo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <?php foreach ($dados as $dad):?>
  <tbody>
    <tr>
      <th><?= $dad->getNome() ?></th>
      <td><?= $dad->getEscolaridade() ?></td>
      <td><?= $dad->getInstituicao() ?></td>
      <td>
        <?php if (!empty($dad->getResumo())): ?>
            <?php
            $nomeSemUniqid1 = preg_replace('/^[^_]*_/', '', $dad->getResumo());
            ?>
            <a href="<?= $dad->getResumoDiretorio() ?>" download><?= $nomeSemUniqid1 ?></a>
        <?php else: ?>
            Não enviado
        <?php endif; ?>
      </td>
      <td>
        <?php if (!empty($dad->getArtigo())): ?>
            <?php
            $nomeSemUniqid2 = preg_replace('/^[^_]*_/', '', $dad->getArtigo());
            ?>
            <a href="<?= $dad->getArtigoDiretorio() ?>" download><?= $nomeSemUniqid2 ?></a>
        <?php else: ?>
            Não enviado
        <?php endif; ?>
      </td>
      <td>
        <form action="editar" method="post">
            <input type="hidden" name="id" value="<?= $dad->getId() ?>">
            <input type="submit" class="btn btn-success" value="Editar">
          </form>
        </td>
        <td>
          <form action="excluir" method="post">
            <input type="hidden" name="id" value="<?= $dad->getId() ?>">
            <input type="submit" class="btn btn-danger" value="Excluir">
          </form>
        </td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
  <form action="relatorio" method="post">
    <input type="submit" class="btn btn-primary" value="Baixar Relatório"/>
  </form>
</div>

<?php
require_once("fim-html.php");
?>