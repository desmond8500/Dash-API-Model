<li class="nav-item {{ Request::is('tags*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tags.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Tags</span>
    </a>
</li>
<li class="nav-item {{ Request::is('brands*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('brands.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Brands</span>
    </a>
</li>
<li class="nav-item {{ Request::is('providers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('providers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Providers</span>
    </a>
</li>
<li class="nav-item {{ Request::is('manuals*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('manuals.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Manuals</span>
    </a>
</li>

<li class="nav-item {{ Request::is('priorities*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('priorities.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Priorities</span>
    </a>
</li>
<li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('articles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Articles</span>
    </a>
</li>
<li class="nav-item {{ Request::is('storages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('storages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Storages</span>
    </a>
</li>
