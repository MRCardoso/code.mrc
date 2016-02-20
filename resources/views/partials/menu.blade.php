    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu-action">
                    <li id="home">
                        <a href="/">
                            <span class="glyphicon glyphicon-home"></span> home
                        </a>
                    </li>
                    <li id="user">
                        <a href="{{ url('user') }}">
                            <span class="glyphicon glyphicon-user"></span> Usuário
                        </a>
                    </li>
                    <li id="client">
                        <a href="{{ url('client') }}">
                            <span class="glyphicon glyphicon-list"></span> Cliente
                        </a>
                    </li>
                    <li id="project">
                        <a href="{{ url('project') }}">
                            <span class="glyphicon glyphicon-tags"></span> Projeto
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>