<style>
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
</style>

<table>
    <thead>
    <tr>
        <th>Candidato</th>
        <th>Escolaridade</th>
        <th>Instituição</th>
        <th>Resumo</th>
        <th>Artigo</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($candidatos as $candidato): ?>
        <tr>
            <td><?= $candidato->getNome() ?></td>
            <td><?= $candidato->getEscolaridade() ?></td>
            <td><?= $candidato->getInstituicao() ?></td>
            <td>
            <?php if (!empty($candidato->getResumo())): ?>
                <?php $nomeSemUniqid1 = preg_replace('/^[^_]*_/', '', $candidato->getResumo()); ?>
                <p><?= $nomeSemUniqid1 ?></p>
            <?php else: ?>
                Não enviado
            <?php endif; ?>
            </td>
            <td>
            <?php if (!empty($candidato->getArtigo())): ?>
                <?php $nomeSemUniqid2 = preg_replace('/^[^_]*_/', '', $candidato->getArtigo()); ?>
                <p><?= $nomeSemUniqid2 ?></p>
            <?php else: ?>
                Não enviado
            <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>


    </tbody>
</table>
