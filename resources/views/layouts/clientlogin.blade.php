<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="icon" type="image/png" href="/images/icono.ico">
</head>

<body>
    <div class="main-container">
        <div class="header-container">
            <header class="header-wrapper">
                <div class="viu-logo">
                    <svg width="74" height="29">
                        <path fill="#fff" fill-rule="evenodd"></path>
                    </svg><img src="/images/logo.png" style="weight:90px; height:90px; margin-left:-70px; margin-top: 50px;"></div>
            </header>
        </div>
        <div class="content-container">
            <div class="signup-wrapper">
                <div class="title-info">
                    <div class="page-title">
                        <h1>Iniciar sesión</h1></div>
                    <div class="page-description">
                        <p>¡Estás a un solo paso de solucionar todos tus problemas!</p>
                    </div>
                </div>
                <div class="signup-buttons">
                    <a href="{{ url('/auth/google') }}" class="social-login"><span class="button-text">Entrar con Google</span></a>
                    <a href="{{ url('/auth/facebook') }}" class="social-login"><span class="button-text">Entrar con Facebook</span></a>
                </div>
                <div class="tandc">
                    <p>Al continuar, aceptas los <span class="links">Términos y condiciones</span> y <span class="links">la Política de privacidad de Viu.</span></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
