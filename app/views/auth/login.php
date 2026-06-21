<?php require_once '../app/views/templates/header.php'; ?>

<div class="card-auth">
    <h1>Entrar</h1>
    <?php if (!empty($erro)): ?>
        <p class="erro"><?= $erro ?></p>
    <?php endif; ?>
    <form action="<?= URL ?>auth/login" method="POST">
        <label>E-mail</label>
        <input type="email" name="email" required>
        <label>Senha</label>
        <input type="password" name="senha" required>
        <button type="submit">Entrar</button>
    </form>
    <p class="link">Nao tem conta? <a href="<?= URL ?>auth/cadastro">Cadastre-se</a></p>
</div>

<?php require_once '../app/views/templates/footer.php'; ?>
