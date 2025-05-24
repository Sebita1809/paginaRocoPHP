
    <div class="titulo">
        <img src="imagenes/HH.ico" class="logoHH">
        <h1>Healthy <br> Habits</h1>
    </div>
    <div class="login">
        <div class="datosLogin">
            <form action="index.php?ruta=login" method="POST" >
                <p class="emailPassword">Email</p>
                <input type="email" name="email" id="email" class="emailLogin" placeholder="luke@gmail......">
                <p class="emailPassword">Password</p>
                <input type="password" name="Pass" id="Pass" class="contraseñaLogin" placeholder="............">
                <a class="botonLogin"><button>Log In</button></a>
                <?php
                $usuario = UsuarioController::crtLogin();
                ?>
             </form>
        </div>
        <div class="problemasLogin">
            <a href=""><p><strong>Forgot yout password?</strong></p></a>
            <a href="index.php?ruta=registro"><button>Sign Up</button></a>
        </div>
    </div>