<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une ULR valide.',
    'after' => 'Le champ :attribute doit être une date postérieur à :date.',
    'after_or_equal' => 'Le champ :attribute doit être postérieur ou égal à :date.',
    'alpha' => 'Le champ :attribute ne peut contenir que des lettre.',
    'alpha_dash' => 'Le champ :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le champ :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'L\'attribut :attribute doit être entre :min et :max.',
        'file' => 'L\'attribut :attribute doit être entre :min et :max kilobytes.',
        'string' => 'L\'attribut :attribute doit être entre :min et :max characters.',
        'array' => 'L\'attribut :attribute doit avoir entre :min et :max items.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Le champ :attribute de confirmation ne correspondent pas.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute et le champ :other doivent être différends.',
    'digits' => 'Le champ :attribute doit être de :digits unités.',
    'digits_between' => 'Le champ :attribute doit être entre :min et :max unités.',
    'dimensions' => 'Le champ :attribute a des dimensions d\image invalide.',
    'distinct' => 'Le champ :attribute a un doublon.',
    'email' => 'Le champ :attribute doit être une adresse mail valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par les valeur suivantes: :values.',
    'exists' => 'Le champ :attribute est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute field doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être plus grand que :value.',
        'file' => 'Le champ :attribute doit être plus grand que :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus grand que :value characters.',
        'array' => 'Le champ :attribute doit avoir plus de :value éléments.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être plus grand ou égal à :value.',
        'file' => 'Le champ :attribute doit être plus grand ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être plus grand ou égal à :value characters.',
        'array' => 'Le champ :attribute doit avoir :value éléments ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'The selected :attribute est invalide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un numbre.',
    'ip' => 'Le champ :attribute doit être une addresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être un JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur à :value characters.',
        'array' => 'Le champ :attribute doit avoir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'file' => 'Le champ :attribute doit être inférieur ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur ou égal à :value charactères.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'file' => 'Le champ :attribute ne doit pas être supérieur à :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas être supérieur à :max characters.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :max éléments.',
    ],
    'mimes' => 'Le champ :attribute must be a file of type: :values.',
    'mimetypes' => 'Le champ :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute must be at least :min.',
        'file' => 'Le champ :attribute must be at least :min kilobytes.',
        'string' => 'Le champ :attribute must be at least :min characters.',
        'array' => 'Le champ :attribute doit avoir at least :min items.',
    ],
    'multiple_of' => 'Le champ :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute est invalide.',
    'not_regex' => 'Le champ :attribute format est invalide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => 'The password is incorrect.',
    'present' => 'Le champ :attribute field must be present.',
    'regex' => 'Le champ :attribute format est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis quand :other is :value.',
    'required_unless' => 'Le champ :attribute est requis sauf :other est dans :values.',
    'required_with' => 'Le champ :attribute est requis quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est requis quand :values sont présent.',
    'required_without' => 'Le champ :attribute est requis quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis quand none of :values ne sont pas présent.',
    'same' => 'Le champ :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être de :size.',
        'file' => 'Le champ :attribute doit être de :size kilobytes.',
        'string' => 'Le champ :attribute doit être de :size caractères.',
        'array' => 'Le champ :attribute doit contenir :size éléments.',
    ],
    'starts_with' => 'Le champ :attribute commence par l\'une des valeurs suivantes: :values.',
    'string' => 'Le champ :attribute doit être une chaine de caratères.',
    'timezone' => 'Le champ :attribute doit être une zone valide.',
    'unique' => 'Le champ :attribute az été déja utilisé.',
    'uploaded' => 'Le champ :attribute a échoué a être chargé.',
    'url' => 'Le champ :attribute a un format invalide.',
    'uuid' => 'Le champ :attribute doit avoir une UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
