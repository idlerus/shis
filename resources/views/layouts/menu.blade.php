<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
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
                        @if ($category->id !== 1 && $category->hasAnyProducts())
                            <a class="navbar-item" href="/category/{{ $category->id }}">
                                {{ ucfirst(trans_choice($category->name, 2)) }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="navbar-end">
            @if (Auth::check())
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <strong class="pr-4"><span class="mdi mdi-plus"></span></strong>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="/products/create/post">
                            {{ __('menu.createProduct') }}
                        </a>
                        @if (Auth::user()->role === 'admin')
                            <a class="navbar-item" href="/admin/categories/create">
                                {{ __('menu.createCategory') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <strong class="pr-4">{{ Auth::user()->name }}</strong>
                        <figure class="image is-48x48">
                            <img class="is-rounded" style="max-height: 48px" src="https://thumbs.dreamstime.com/b/trendy-hookah-smoke-cloud-black-background-126472548.jpg">
                        </figure>
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            {{ __('menu.settings') }}
                        </a>
                        <a class="navbar-item">
                            {{ __('menu.posts') }}
                        </a>
                        @if (Auth::user()->role === 'admin')
                            <hr class="dropdown-divider" />
                            <a class="navbar-item" href="/admin">
                                {{ __('menu.admin') }}
                            </a>
                        @endif
                        <hr class="dropdown-divider" />
                        <a class="navbar-item" href="/logout">
                            {{ __('menu.logOut') }}
                        </a>
                    </div>
                </div>
            @else
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="/register">
                            <strong>{{ ucfirst(__('generic.registerButton')) }}</strong>
                        </a>
                        <a class="button is-light" href="/login">
                            {{ ucfirst(__('generic.loginButton')) }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
