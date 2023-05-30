<div>
    @component('components.tabler.header', ['title'=> 'Personne', 'subtitle'=> 'CV'])

    @endcomponent

    <div class="row">
        <div class="col-md-4">
            <div class="mb-2">
                @livewire('cv.profile', ['person_id' => $person->id], key($person->id))
            </div>

            <div class="mb-2">
                @livewire('cv.langues', ['person_id' => $person->id], key($person->id))
            </div>

            <div class="mb-2">
                @livewire('cv.interets', ['person_id' => $person->id], key($person->id))
            </div>

        </div>

        <div class="col-md-8">
            <div class="mb-2">
                @livewire('cv.experiences', ['person_id' => $person->id], key($person->id))
            </div>

            @component('components.section',['title'=>'Formation'])

            @endcomponent
        </div>

    </div>
</div>
