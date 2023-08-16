document.addEventListener('DOMContentLoaded', function() {
    const formContainer = document.querySelector('.form-container');
    const toggleFormLink = document.getElementById('toggle-form-link');
  
    function showLoginForm() {
      formContainer.innerHTML = `
        <h2>Login</h2>
        <form action="#" method="POST" id="login-form">
          <div class="form-group">
            <label for="login-email">Email:</label>
            <input type="text" id="login-email" name="login-email" required>
          </div>
          <div class="form-group">
            <label for="login-password">Senha:</label>
            <input type="password" id="login-password" name="login-password" required>
          </div>
          <button type="submit">Entrar</button>
        </form>
        <div class="toggle-form" id="toggle-form-link">Ainda não tem uma conta? Cadastre-se</div>
      `;
  
      toggleFormLink.removeEventListener('click', showRegisterForm);
      toggleFormLink.addEventListener('click', showRegisterForm);
    }
  
    function showRegisterForm() {
      formContainer.innerHTML = `
        <h2>Cadastro</h2>
        <form action="#" method="POST" id="register-form">
          <div class="form-group">
            <label for="register-name">Nome:</label>
            <input type="text" id="register-name" name="register-name" required>
          </div>
          <div class="form-group">
            <label for="register-email">Email:</label>
            <input type="text" id="register-email" name="register-email" required>
          </div>
          <div class="form-group">
            <label for="register-password">Senha:</label>
            <input type="password" id="register-password" name="register-password" required>
          </div>
          <button type="submit">Cadastrar</button>
        </form>
        <div class="toggle-form" id="toggle-form-link">Já tem uma conta? Faça login</div>
      `;
  
      toggleFormLink.removeEventListener('click', showLoginForm);
      toggleFormLink.addEventListener('click', showLoginForm);
    }
  
    toggleFormLink.addEventListener('click', showRegisterForm);
  });