<?php require_once '../app/views/templates/header.php'; ?>

<div class="conteudo">
    <div class="cabecalho-lista">
        <h1>Meus agendamentos</h1>
        <a href="<?= URL ?>agendamentos/criar" class="btn">Novo agendamento</a>
    </div>

    <?php if (empty($agendamentos)): ?>
        <p class="vazio">Voce ainda nao possui agendamentos.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descricao</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Status</th>
                    <th>Acoes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agendamentos as $a): ?>
                <tr>
                    <td><?= htmlspecialchars($a['titulo']) ?></td>
                    <td><?= htmlspecialchars($a['descricao']) ?></td>
                    <td><?= date('d/m/Y', strtotime($a['data'])) ?></td>
                    <td><?= substr($a['hora'], 0, 5) ?></td>
                    <td><?= htmlspecialchars($a['status']) ?></td>
                    <td class="acoes">
                        <a href="<?= URL ?>agendamentos/editar/<?= $a['id'] ?>">Editar</a>
                        <a href="<?= URL ?>agendamentos/remover/<?= $a['id'] ?>" onclick="return confirm('Remover este agendamento?')">Remover</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
