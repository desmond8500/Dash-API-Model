<div class="container container-tight py-4">
    <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset(env('APP_LOGO')) }}" height="36" alt="">
        </a>
    </div>
    <form class="card card-md" action="./" method="get" autocomplete="off" novalidate>
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Mot de passe oublié</h2>
            <p class="text-muted mb-4">
                Vueillez saisir votre adresse mail. Un code de réinitialisation vous sera envoyé.
            </p>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Adresse mail" wire:model='email'>
            </div>
            <div class="form-footer">
                <a href="#" class="btn btn-primary w-100" wire:click='resetPassword()'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <rect x="3" y="5" width="18" height="14" rx="2" /> <polyline points="3 7 12 13 21 7" /> </svg>
                    Réinititaliser le mot de passe
                </a>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        <a href="{{ route('index') }}">Retour</a> à la page d'acceuil.
    </div>
</div>
