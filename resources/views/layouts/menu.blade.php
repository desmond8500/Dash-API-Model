<li class="nav-item {{ Request::is('personnes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('personnes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Personnes</span>
    </a>
</li>
<li class="nav-item {{ Request::is('foormations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('foormations.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Foormations</span>
    </a>
</li>
<li class="nav-item {{ Request::is('formations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('formations.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Formations</span>
    </a>
</li>
<li class="nav-item {{ Request::is('experiences*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('experiences.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Experiences</span>
    </a>
</li>
<li class="nav-item {{ Request::is('competences*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('competences.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Competences</span>
    </a>
</li>
<li class="nav-item {{ Request::is('langues*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('langues.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Langues</span>
    </a>
</li>
<li class="nav-item {{ Request::is('interets*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('interets.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Interets</span>
    </a>
</li>
