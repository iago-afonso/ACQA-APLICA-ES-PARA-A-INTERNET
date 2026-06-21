<?php require_once '../app/views/templates/header.php'; ?>

<div class="card-auth">
    <h1>Criar conta</h1>
    <?php if (!empty($erro)): ?>
        <p class="erro"><?= $erro ?></p>
    <?php endif; ?>
    <form action="<?= URL ?>auth/cadastro" method="POST">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <label>E-mail</label>
        <input type="email" name="email" required>
        <label>Senha</label>
        <input type="password" name="senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <p class="link">Ja tem conta? <a href="<?= URL ?>">Entrar</a></p>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
