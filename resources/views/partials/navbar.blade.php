<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        middleware I
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="nav-link" href="{{ route('admin.middleware1') }}"> middleware & component</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('admin.middleware2') }}"> Group middleware & component
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.viewAndBlade') }}" tabindex="-1"
                        aria-disabled="true">Views & Blade </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Validation
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.validation.create') }}">validation</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Database-Model
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('blog') }}">Model - blog</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Database-Collection
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('collection.chunk') }}">get chunk Data</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Mass Assignment
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('signup.form') }}">signup</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('crud.index') }}">crud resource</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('sale.addToCart') }}">Add To
                        Cart</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Eloquent Relationships
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="{{ Session::get('type') == 'OneToOne' ? 'bg-primary' : '' }}"><a
                                class="nav-link active" aria-current="page"
                                href="{{ route('relationship.one-to-one') }}">#One To One</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="{{ Session::get('type') == 'OneToMany' ? 'bg-primary' : '' }}"><a
                                class="nav-link active" aria-current="page"
                                href="{{ route('relationship.one-to-many') }}">#One To Many</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="{{ Session::get('type') == 'ManyToMany' ? 'bg-primary' : '' }}"><a
                                class="nav-link active" aria-current="page"
                                href="{{ route('relationship.many-to-many') }}">#Many To Many</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="{{ Session::get('type') == 'hasOneThrough' ? 'bg-primary' : '' }}"><a
                                class="nav-link active" aria-current="page"
                                href="{{ route('relationship.hasOneThrough') }}">#hasOneThrough</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="{{ Session::get('type') == 'hasManyThrough' ? 'bg-primary' : '' }}"><a
                                class="nav-link active" aria-current="page"
                                href="{{ route('relationship.hasManyThrough') }}">#hasManyThrough</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
