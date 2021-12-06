<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                {{ __('menu.home') }}
            </a>

            <a class="navbar-item" href="/products">
                {{ __('menu.products') }}
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    {{ __('menu.categories') }}
                </a>

                <div class="navbar-dropdown">
                    @foreach ($categories as $category)
                        <a class="navbar-item">
                            {{ ucfirst(trans_choice($category->name, 2)) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="register">
                        <strong>{{ ucfirst(__('generic.registerButton')) }}</strong>
                    </a>
                    <a class="button is-light" href="login">
                        {{ ucfirst(__('generic.loginButton')) }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
