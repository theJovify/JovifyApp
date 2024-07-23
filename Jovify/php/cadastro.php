<?php
// Configurações do banco de dados
$host = 'localhost'; // Seu host
$dbname = 'crud_example'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = 'Yuumi@6733'; // Senha do banco de dados

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $cpf = $_POST['cpf'];
        $fullName = $_POST['fullName'];
        $birthDate = $_POST['birthDate'];
        $sex = $_POST['sex'];
        $otherSex = $_POST['otherSex'] ?? null;
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash da senha
        $zodiac = $_POST['zodiac'];
        
        // Consulta SQL para inserir os dados no banco
        $sql = "INSERT INTO users (cpf, fullName, birthDate, sex, otherSex, email, username, password, zodiac) 
                VALUES (:cpf, :fullName, :birthDate, :sex, :otherSex, :email, :username, :password, :zodiac)";
        
        $stmt = $pdo->prepare($sql);
        
        // Vincular parâmetros
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':birthDate', $birthDate);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':otherSex', $otherSex);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':zodiac', $zodiac);
        
        // Executar a consulta
        $stmt->execute();
        
        echo "<script>
                document.getElementById('successMessage').classList.remove('hidden');
                setTimeout(function() {
                    window.location.href = 'success_page.html'; // Redirecionar para uma página de sucesso
                }, 3000);
              </script>";
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
