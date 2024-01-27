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

    'accepted' => 'Поле :attribute повинне бути прийняте.',
    'accepted_if' => 'Поле :attribute повинне бути прийняте, коли :other є :value.',
    'active_url' => 'Поле :attribute не є дійсним URL.',
    'after' => 'Поле :attribute повинне бути датою після :date.',
    'after_or_equal' => 'Поле :attribute повинне бути датою після або рівною :date.',
    'alpha' => 'Поле :attribute повинне містити лише літери.',
    'alpha_dash' => 'Поле :attribute повинне містити лише літери, цифри, дефіси і підкреслення.',
    'alpha_num' => 'Поле :attribute повинне містити лише літери і цифри.',
    'array' => 'Поле :attribute повинне бути масивом.',
    'before' => 'Поле :attribute повинне бути датою перед :date.',
    'before_or_equal' => 'Поле :attribute повинне бути датою перед або рівною :date.',
    'between' => [
        'numeric' => 'Поле :attribute повинне бути між :min і :max.',
        'file' => 'Поле :attribute повинне бути між :min і :max кілобайтів.',
        'string' => 'Поле :attribute повинне бути між :min і :max символів.',
        'array' => 'Поле :attribute повинне мати від :min до :max елементів.',
    ],
    'boolean' => 'Поле :attribute повинне мати значення true або false.',
    'confirmed' => 'Поле :attribute не збігається з підтвердженням.',
    'current_password' => 'Поточний пароль неправильний.',
    'date' => 'Поле :attribute не є дійсною датою.',
    'date_equals' => 'Поле :attribute повинне бути датою рівною :date.',
    'date_format' => 'Поле :attribute не відповідає формату :format.',
    'declined' => 'Поле :attribute повинне бути відхилено.',
    'declined_if' => 'Поле :attribute повинне бути відхилено, коли :other є :value.',
    'different' => 'Поля :attribute і :other повинні бути різними.',
    'digits' => 'Поле :attribute повинне бути :digits цифр.',
    'digits_between' => 'Поле :attribute повинне бути між :min і :max цифрами.',
    'dimensions' => 'Поле :attribute має недійсні розміри зображення.',
    'distinct' => 'Поле :attribute має повторюване значення.',
    'email' => 'Поле :attribute повинне бути дійсною адресою електронної пошти.',
    'ends_with' => 'Поле :attribute повинне закінчуватися одним із наступних значень: :values.',
    'enum' => 'Вибране значення :attribute недійсне.',
    'exists' => 'Вибране значення :attribute недійсне.',
    'file' => 'Поле :attribute повинне бути файлом.',
    'filled' => 'Поле :attribute повинне мати значення.',
    'gt' => [
        'numeric' => 'Поле :attribute повинно бути більше, ніж :value.',
        'file' => 'Поле :attribute повинно бути більше, ніж :value кілобайт.',
        'string' => 'Поле :attribute повинно містити більше, ніж :value символів.',
        'array' => 'Поле :attribute повинно мати більше, ніж :value елементів.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute повинно бути більше або дорівнювати :value.',
        'file' => 'Поле :attribute повинно бути більше або дорівнювати :value кілобайт.',
        'string' => 'Поле :attribute повинно містити більше або дорівнювати :value символів.',
        'array' => 'Поле :attribute повинно мати :value елементів або більше.',
    ],
    'image' => 'Поле :attribute повинно бути зображенням.',
    'in' => 'Вибране значення :attribute недійсне.',
    'in_array' => 'Поле :attribute не існує в :other.',
    'integer' => 'Поле :attribute повинно бути цілим числом.',
    'ip' => 'Поле :attribute повинно бути дійсною IP-адресою.',
    'ipv4' => 'Поле :attribute повинно бути дійсною IPv4-адресою.',
    'ipv6' => 'Поле :attribute повинно бути дійсною IPv6-адресою.',
    'json' => 'Поле :attribute повинно бути дійсним рядком JSON.',
    'lt' => [
        'numeric' => 'Поле :attribute повинно бути менше, ніж :value.',
        'file' => 'Поле :attribute повинно бути менше, ніж :value кілобайт.',
        'string' => 'Поле :attribute повинно містити менше, ніж :value символів.',
        'array' => 'Поле :attribute повинно мати менше, ніж :value елементів.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute повинно бути менше або дорівнювати :value.',
        'file' => 'Поле :attribute повинно бути менше або дорівнювати :value кілобайт.',
        'string' => 'Поле :attribute повинно містити менше або дорівнювати :value символів.',
        'array' => 'Поле :attribute повинно мати не більше, ніж :value елементів.',
    ],
    'mac_address' => 'Поле :attribute повинно бути дійсною MAC-адресою.',
    'max' => [
        'numeric' => 'Поле :attribute не повинно перевищувати :max.',
        'file' => 'Поле :attribute не повинно перевищувати :max кілобайт.',
        'string' => 'Поле :attribute не повинно містити більше, ніж :max символів.',
        'array' => 'Поле :attribute не повинно мати більше, ніж :max елементів.',
    ],
    'mimes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute повинно бути файлом типу: :values.',
    'min' => [
        'numeric' => 'Поле :attribute повинно бути не менше, ніж :min.',
        'file' => 'Поле :attribute повинно бути не менше, ніж :min кілобайт.',
        'string' => 'Поле :attribute повинно містити не менше, ніж :min символів.',
        'array' => 'Поле :attribute повинно мати щонайменше :min елементів.',
    ],
    'multiple_of' => 'Поле :attribute повинно бути кратним :value.',
    'not_in' => 'Вибране значення :attribute недійсне.',
    'not_regex' => 'Формат поля :attribute недійсний.',
    'numeric' => 'Поле :attribute повинно бути числом.',
    'password' => 'Неправильний пароль.',
    'present' => 'Поле :attribute повинно бути присутнім.',
    'prohibited' => 'Поле :attribute заборонено.',
    'prohibited_if' => 'Поле :attribute заборонено, коли :other дорівнює :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо :other не знаходиться в :values.',
    'prohibits' => 'Поле :attribute забороняє присутність :other.',
    'regex' => 'Формат поля :attribute недійсний.',
    'required' => 'Поле :attribute є обов\'язковим.',
    'required_array_keys' => 'Поле :attribute має містити ключі: :values.',
    'required_if' => 'Поле :attribute є обов\'язковим, коли :other дорівнює :value.',
    'required_unless' => 'Поле :attribute є обов\'язковим, якщо :other не знаходиться в :values.',
    'required_with' => 'Поле :attribute є обов\'язковим, коли присутній :values.',
    'required_with_all' => 'Поле :attribute є обов\'язковим, коли присутні :values.',
    'required_without' => 'Поле :attribute є обов\'язковим, коли відсутній :values.',
    'required_without_all' => 'Поле :attribute є обов\'язковим, коли відсутні всі :values.',
    'same' => 'Поля :attribute і :other повинні співпадати.',
    'size' => [
        'numeric' => 'Поле :attribute повинно бути розміром :size.',
        'file' => 'Поле :attribute повинно бути розміром :size кілобайт.',
        'string' => 'Поле :attribute повинно містити :size символів.',
        'array' => 'Поле :attribute повинно містити :size елементів.',
    ],
    'starts_with' => 'Поле :attribute повинно починатися з одного з наступних значень: :values.',
    'string' => 'Поле :attribute повинно бути рядком.',
    'timezone' => 'Поле :attribute повинно бути дійсним часовим поясом.',
    'unique' => 'Таке значення поля :attribute вже існує.',
    'uploaded' => 'Не вдалося завантажити поле :attribute.',
    'url' => 'Поле :attribute повинно бути дійсною URL-адресою.',
    'uuid' => 'Поле :attribute повинно бути дійсним UUID.',

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
