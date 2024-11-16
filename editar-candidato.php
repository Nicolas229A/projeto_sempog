<div class="container">
  <form method="post" action="editar" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $candidato->getId() ?>">

    <div class="mb-3">
      <label for="nome" class="form-label">Nome Completo</label>
      <input name="nome" type="text" class="form-control" id="nome" 
             value="<?= $candidato->getNome() ?>" placeholder="Digite seu nome" required>
    </div>

    <div class="mb-3">
      <label for="escolaridade" class="form-label">Escolaridade</label>
      <input name="escolaridade" type="text" class="form-control" id="escolaridade" 
             value="<?= $candidato->getEscolaridade() ?>" placeholder="Digite sua escolaridade (Ex: Ensino Médio, Graduação, etc..)" required>
    </div>

    <div class="mb-3">
      <label for="instituicao" class="form-label">Instituição Vinculada</label>
      <input name="instituicao" type="text" class="form-control" id="instituicao" 
             value="<?= $candidato->getInstituicao() ?>" placeholder="Digite sua instituição (Ex: IFMS, UEMS, UFMS, etc..)" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Escolha uma opção (caso queira enviar os dois, selecione uma opção e preencha ambos os campos)</label><br>
      <input type="radio" name="tipoInput" id="escolhaResumo" value="resumo">
      <label for="escolhaResumo">Enviar Resumo</label>
      <input type="radio" name="tipoInput" id="escolhaArtigo" value="artigo">
      <label for="escolhaArtigo">Enviar Artigo</label>
    </div>

    <div class="mb-3">
      <label for="resumo" class="form-label">Resumo</label>
      <input name="resumo" type="file" accept="image/*,.pdf" class="form-control" id="resumo" 
             placeholder="Envie seu resumo">
      <small>Resumo atual: <?= !empty($candidato->getResumo()) ? "<a href='{$candidato->getResumoDiretorio()}' target='_blank'>Visualizar resumo</a>" : "Não enviado" ?></small>
    </div>

    <div class="mb-3">
      <label for="artigo" class="form-label">Artigo Completo</label>
      <input name="artigo" type="file" accept="image/*,.pdf" class="form-control" id="artigo" 
             placeholder="Envie seu artigo">
      <small>Artigo atual: <?= !empty($candidato->getArtigo()) ? "<a href='{$candidato->getArtigoDiretorio()}' target='_blank'>Visualizar artigo</a>" : "Não enviado" ?></small>
    </div>

    <input name="editar" type="submit" class="btn btn-success" value="Editar candidato"/>
  </form>
</div>

<script>
  document.querySelector("form").addEventListener("submit", function (event) {
    const resumo = document.getElementById("resumo").files.length;
    const artigo = document.getElementById("artigo").files.length;
    const escolhaResumo = document.getElementById("escolhaResumo").checked;
    const escolhaArtigo = document.getElementById("escolhaArtigo").checked;

    if (!escolhaResumo && !escolhaArtigo) {
      event.preventDefault();
      alert("Por favor, selecione se deseja preencher o resumo ou enviar o artigo.");
      return;
    }

    if (
      (escolhaResumo && resumo === 0) ||
      (escolhaArtigo && artigo === 0)
    ) {
      event.preventDefault();
      alert("Por favor, preencha o campo selecionado.");
    }
  });
</script>
