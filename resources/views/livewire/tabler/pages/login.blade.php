<div class="container container-normal py-4">
    <div class="row align-items-center g-4">
        <div class="col-lg">
            <div class="container-tight">
                <div class="text-center mb-4">
                    <a href="{{ route('index') }}" class="navbar-brand navbar-brand-autodark">
                        <img src="{{ asset(env('APP_LOGO')) }}" height="36" alt="">
                    </a>
                </div>
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">Connexion {{ $auth }}</h2>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Votre mail" autocomplete="off" wire:model="email">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">
                                    Mot de passe
                                    <span class="form-label-description">
                                        <a href="{{ route('tabler.forgotten') }}">Mot de passe oublié</a>
                                    </span>
                                </label>
                                <div class="input-group input-group-flat">
                                    <input type="{{ $toggle }}" class="form-control" placeholder="Votre mot de passe" autocomplete="off" wire:model="password">
                                    <span class="input-group-text">
                                        <a type="button" wire:click="togglePassword()" class="link-secondary" title="Afficher le mot de passe" data-bs-toggle="tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <circle cx="12" cy="12" r="2" /> <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /> </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button wire:click="login()" class="btn btn-success w-100">Connexion</button>
                            </div>
                    </div>

                </div>
                <div class="text-center text-muted mt-3">
                    Vous n'avez pas encore de compte ? <a href="{{ route('tabler.register') }}" tabindex="-1">Inscription</a>
                </div>
            </div>
        </div>
        <div class="col-lg d-none d-lg-block">
            <img src="{{ asset('tabler/img/undraw_secure_login_pdn4.svg') }}" height="300" class="d-block mx-auto" alt="">
        </div>
    </div>
</div>
