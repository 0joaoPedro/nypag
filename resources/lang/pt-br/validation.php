<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted'             => ':attribute must be accepted.',
    'active_url'           => ':attribute is not a valid URL.',
    'after'                => ':attribute must be a date after :date.',
    'after_or_equal'       => ':attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute may only contain letters.',
    'alpha_dash'           => ':attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => ':attribute may only contain letters and numbers.',
    'array'                => ':attribute must be an array.',
    'before'               => ':attribute must be a date before :date.',
    'before_or_equal'      => ':attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute must be between :min and :max.',
        'file'    => ':attribute must be between :min and :max kilobytes.',
        'string'  => ':attribute must be between :min and :max characters.',
        'array'   => ':attribute must have between :min and :max items.',
    ],
    'boolean'              => ':attribute field must be true or false.',
    'confirmed'            => ':attribute a confirmação não corresponde.',
    'date'                 => ':attribute is not a valid date.',
    'date_format'          => ':attribute does not match the format :format.',
    'different'            => ':attribute and :other must be different.',
    'digits'               => ':attribute must be :digits digits.',
    'digits_between'       => ':attribute deve ter entre :min e :max dígitos.',
    'dimensions'           => ':attribute has invalid image dimensions.',
    'distinct'             => ':attribute field has a duplicate value.',
    'email'                => 'Insira um endereço de :attribute válido',
    'exists'               => 'selected :attribute is invalid.',
    'file'                 => ':attribute must be a file.',
    'filled'               => ':attribute field must have a value.',
    'gt'                   => [
        'numeric' => ':attribute must be greater than :value.',
        'file'    => ':attribute must be greater than :value kilobytes.',
        'string'  => ':attribute must be greater than :value characters.',
        'array'   => ':attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => ':attribute must be greater than or equal :value.',
        'file'    => ':attribute must be greater than or equal :value kilobytes.',
        'string'  => ':attribute must be greater than or equal :value characters.',
        'array'   => ':attribute must have :value items or more.',
    ],
    'image'                => ':attribute must be an image.',
    'in'                   => 'selected :attribute is invalid.',
    'in_array'             => ':attribute field does not exist in :other.',
    'integer'              => ':attribute must be an integer.',
    'ip'                   => ':attribute must be a valid IP address.',
    'ipv4'                 => ':attribute must be a valid IPv4 address.',
    'ipv6'                 => ':attribute must be a valid IPv6 address.',
    'json'                 => ':attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute não pode ser maior que :max.',
        'file'    => ':attribute não pode ser maior que :max kilobytes.',
        'string'  => ':attribute não pode ser maior que :max characters.',
        'array'   => ':attribute pode não ter mais do que :max items.',
    ],
    'lt'                   => [
        'numeric' => ':attribute must be less than :value.',
        'file'    => ':attribute must be less than :value kilobytes.',
        'string'  => ':attribute must be less than :value characters.',
        'array'   => ':attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => ':attribute must be less than or equal :value.',
        'file'    => ':attribute must be less than or equal :value kilobytes.',
        'string'  => ':attribute must be less than or equal :value characters.',
        'array'   => ':attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => ':attribute não pode ser maior que :max.',
        'file'    => ':attribute não pode ser maior que :max kilobytes.',
        'string'  => ':attribute não pode ser maior que :max characters.',
        'array'   => ':attribute pode não ter mais do que :max items.',
    ],
    'mimes'                => ':attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => ':attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute deve ter no minimo :min.',
        'file'    => ':attribute deve ter no minimo :min kilobytes.',
        'string'  => ':attribute deve ter no minimo :min caracteres.',
        'array'   => ':attribute deve ter no minimo :min itens.',
    ],
    'not_in'               => 'selected :attribute is invalid.',
    'not_regex'            => ':attribute format is invalid.',
    'numeric'              => ':attribute deve ser um numérico.',
    'present'              => ':attribute field must be present.',
    'regex'                => ':attribute format is invalid.',
    'required'             => ':attribute é necessário(a).',
    'required_if'          => ':attribute field is required when :other is :value.',
    'required_unless'      => ':attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute field is required when :values is present.',
    'required_with_all'    => ':attribute field is required when :values is present.',
    'required_without'     => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute deve ter :size.',
        'file'    => ':attribute deve ter :size kilobytes.',
        'string'  => ':attribute deve ter :size caracteres.',
        'array'   => ':attribute must contain :size items.',
    ],
    'string'               => ':attribute deve ser uma string.',
    'timezone'             => ':attribute deve ser uma zona válida.',
    'unique'               => ':attribute já existe.',
    'uploaded'             => ':attribute failed to upload.',
    'url'                  => ':attribute format is invalid.',

    'message' => 'Os dados fornecidos são inválidos.',

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
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'cnpj'          => 'O CNPJ',
        'razao_social'  => 'A Razão Social',
        'nome_fantasia' => 'O Nome Fantasia',
        'nome'          => 'O Nome',
        'descricao'     => 'A Descrição',
        'cpf'           => 'O CPF',
        'cep'           => 'O Cep',
        'email'         => 'O E-Mail',
        'new-password'  => 'A Nova Senha',

        'boleto'        => 'O Boleto',
        'renavam'       => 'O Renavam',
        'placa'         => 'A placa',
        'telefone'      => 'O Telefone',
        'fin_conta_id'      => 'A conta',
        'boleto'     => 'O Boleto',
        'renavam'     => 'O renavam',
        'placa'     => 'A placa',
        'nome'     => 'O nome',
        'telefone'     => 'O telefone',
        'spgtb_servico_id'     => 'O Serviço',
        'adq1'     => 'O adquirente',
        'valor1'     => 'O Valor',
        'comprovante1'     => 'O Comprovante',
        'conta'     => 'A conta',
        'uni_banco_id'     => 'O banco',
        'tipo_conta'     => 'O tipo de conta',
        'agencia'     => 'A agência',
        
    ],

];
