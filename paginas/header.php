<header>
    <nav id="menu">

    </nav>
    <div id="button-menu">MENU</div>
    <div id="logo">
        <h1>Projeto</h1>
    </div>
    <div id="usuario">
        <span><?php 
        session_start();
        echo strtoupper(substr($_SESSION['usuarioNome'], 0, 2));?>
        </span>
    </div>
</header>