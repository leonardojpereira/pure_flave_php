document.addEventListener('DOMContentLoaded', function() {
  const formContainer = document.querySelector('.form-container');

  function toggleForm() {
    const isLoginForm = formContainer.classList.contains('login-form');

    const formTitle = isLoginForm ? 'Cadastro' : 'Login';
    const submitButtonText = isLoginForm ? 'Cadastrar' : 'Entrar';
    const toggleLinkText = isLoginForm ? 'Já tem uma conta? Faça login' : 'Ainda não tem uma conta? Cadastre-se';

    formContainer.innerHTML = `
      <h2>${formTitle}</h2>
      <form action="#" method="POST" id="${isLoginForm ? 'register' : 'login'}-form">
        ${
          isLoginForm
            ? `
              <div class="form-group">
                <label for="register-name">Nome</label>
                <input type="text" id="register-name" name="register-name" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" name="register-email" placeholder="user@example.com" required>
              </div>
              <div class="form-group">
                <label for="register-password">Senha</label>
                <input type="password" id="register-password" name="register-password" placeholder="**********" required>
              </div>
            `
            : `
              <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="login-email" placeholder="user@example.com" required>
              </div>
              <div class="form-group">
                <label for="login-password">Senha</label>
                <input type="password" id="login-password" name="login-password" placeholder="**********" required>
              </div>
            `
        }
        <button type="submit">${submitButtonText}</button>
      </form>
      <div class="toggle-form" id="toggle-form-link">${toggleLinkText}</div>
    `;

    formContainer.classList.toggle('login-form');
  }

  formContainer.addEventListener('click', function(event) {
    if (event.target && event.target.id === 'toggle-form-link') {
      toggleForm();
    }
  });

  toggleForm();
});