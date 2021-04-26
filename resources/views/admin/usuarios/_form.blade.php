<div class="input-field">
    <input type="text" class="validate" id="name" name="name"
           value="{{ isset($usuario->name) ? $usuario->name : '' }}">
    <label for="name">Nome</label>
</div>
<div class="input-field">
    <input type="email" class="validate" id="email" name="email"
           value="{{ isset($usuario->email) ? $usuario->email : '' }}">
    <label for="email">E-mail</label>
</div>
<div class="input-field">
    <input type="password" class="validate" id="password" name="password">
    <label for="password">Senha</label>
</div>