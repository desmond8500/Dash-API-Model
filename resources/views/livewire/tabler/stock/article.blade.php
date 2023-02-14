<div class="row">
    @component('components.tabler.header', ['title'=>'Article', 'subtitle'=>'Stock', 'breadcrumbs'=>$breadcrumbs])
    @endcomponent

    <div class="col-md-5 g-2">
        <div class="card p-2">
            @if ($form)
                @include('_tabler.stock.articleform')
                <div class="modal-footer mt-2">
                    <button type="button" class="btn btn-secondary me-auto" wire:click="$toggle('form', 0)">Fermer</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="updateArticle()">Modifier</button>
                </div>
            @else
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ asset($article->image) }}" alt="A" class="avatar avatar-xl">
                    </div>
                    <div class="col">
                        <div class="card-title fw-bold">{{ $article->designation }}</div>
                        <div class="">{!! $article->reference !!}</div>
                        <div class="text-muted">{!! $article->description !!}</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-primary btn-icon" wire:click="editArticle('{{ $article->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path> <path d="M13.5 6.5l4 4"></path> </svg>
                        </button>
                    </div>

                </div>

            @endif
        </div>
        <div class="row mt-3">
             @foreach ($article->docs as $fichier)
             <div class="col-md-auto">
                 @if ($fichier->doc_type == 0)
                     <a data-fslightbox href="{{ asset($fichier->folder) }}">
                         <img class="avatar avatar-md" src="{{ asset($fichier->folder) }}" alt="">
                     </a>
                     <div class="d-flex-justify-content-between">
                         <a type="button"  class="text-success" title="Modifier l'image par défaut">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                         </a>
                         <a type="button" class="text-danger" title="Supprimer l'image">
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                         </a>
                     </div>
                 @endif
             </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-7 g-2">
        <div class="card ">
            <div class="card-header">
                <div class="card-title">Documents</div>
                <div class="card-actions">
                    <button class="btn btn-primary" wire:click="$set('docform',true)">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                      Document
                    </button>
                </div>

            </div>
            <div class="card-body">
                 @if ($docform)
                    <div class="row">
                         <div class="col-auto">
                             <div wire:loading class="mb-3">
                                 <div class="d-flex justify-content-between">
                                     <div>Chargement <span class="animated-dots"></div>
                                 </div>
                             </div>
                            <label href="#" class="avatar avatar-upload rounded" for="file">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <line x1="12" y1="5" x2="12" y2="19" /> <line x1="5" y1="12" x2="19" y2="12" /> </svg>
                                <span class="avatar-upload-text">Ajouter</span>
                                <input type="file" style="display: none" id="file" accept="image/*" multiple wire:model.defer="files">
                            </label>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label class="form-label">Nom du document</label>
                                <input type="text" class="form-control" wire:model.defer="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Type de document</label>
                                <select wire:model.defer="doc_type" class="form-select">
                                    @foreach ($doctype as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-secondary" wire:click="$set('docform',false)">Fermer</button>
                            <button class="btn btn-primary" wire:click="Ajouter">Ajouter</button>
                        </div>
                    </div>

                @endif

                <div class="my-3">
                    <table class="table">
                        <tr>
                            <th>Nom</th>
                            <th>Type de document</th>
                            <th style="width: 10px">Action</th>
                        </tr>
                        @foreach ($article->docs as $fichier)
                        @if ($fichier->doc_type != 0)
                            <tr>
                                <td>
                                    <a href="{{ asset($fichier->folder) }}" target="_blank" class="border-bottom pb-2" >
                                        <div class="fw-bold">{{ $fichier->name }}</div>
                                    </a>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $article->get_type($fichier->doc_type) }} </div>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M4 7l16 0"></path> <path d="M10 11l0 6"></path> <path d="M14 11l0 6"></path> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                    </button>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
