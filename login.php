<?php
// login.php

// 1) Conexão
$mysqli = new mysqli("localhost", "root", "root", "petshop_db");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

// 2) Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

// 3) Login
$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "";
    $pass = $_POST["password"] ?? "";

    $stmt = $mysqli->prepare("SELECT cliente_id AS id, nome AS username FROM Cliente WHERE nome=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    // Since Cliente table does not have password, we just check if user exists and password is '123456'
    if ($dados && $pass === '123456') {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["username"] = $dados["username"];
        header("Location: login.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Login Simples</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php
$clients = [];
if (!empty($_SESSION["user_id"])) {
    $mysqli = new mysqli("localhost", "root", "root", "petshop_db");
    if (!$mysqli->connect_errno) {
        $result = $mysqli->query("SELECT cliente_id, nome, cpf, email, telefone FROM Cliente");
        if ($result) {
            $clients = $result->fetch_all(MYSQLI_ASSOC);
        }
    }
}
?>

<?php if (!empty($_SESSION["user_id"])): ?>
  <div class="card">
    <h3>Bem-vindo, <?= $_SESSION["username"] ?>!</h3>
    <p>Sessão ativa.</p>
    <p><a href="?logout=1">Sair</a></p>

    <?php if (!empty($clients)): ?>
    <div style="max-width: 100%; overflow-x: auto;">
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Email</th>
          <th>Telefone</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
          <td><?= htmlspecialchars($client['cliente_id']) ?></td>
          <td><?= htmlspecialchars($client['nome']) ?></td>
          <td><?= htmlspecialchars($client['cpf']) ?></td>
          <td><?= htmlspecialchars($client['email']) ?></td>
          <td><?= htmlspecialchars($client['telefone']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    <?php else: ?>
      <p>Nenhum cliente encontrado.</p>
    <?php endif; ?>
  </div>

<?php else: ?>
  <div class="card">
    <h3>Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>
    <p><small>Dica: Rafael Almeida / 123456</small></p>
  </div>
<?php endif; ?>

</body>
</html>