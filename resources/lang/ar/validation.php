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

    'accepted' => 'يجب قبول حقل :attribute',
    'active_url' => 'حقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا أو مساوياً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي حقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون حقل :attribute ًمصفوفة',
    'before' => 'يجب على حقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date' => 'حقل :attribute ليس تاريخًا صحيحًا',
    'date_format' => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'date_equals' => ':attribute يجب أن يكون يساوي  :date.',
    'different' => 'يجب أن يكون حقلا :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي حقل :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists' => 'حقل :attribute لاغٍ',
    'ends_with' => 'حقل :attribute يجب أن ينتهي بأحد القيم التالية: :values',
    'file' => 'الـ :attribute يجب أن يكون من ملفا.',
    'filled' => 'حقل :attribute إجباري',
    'gt' => [
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من  :value.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'string' => 'حقل :attribute يجب أن يكون أكبر من  :value خانات.',
        'array' => 'حقل :attribute يجب أن يكون أكبر من :value عناصر.',
    ],
    'gte' => [
        'numeric' => 'حقل :attribute يجب أن يكون مساوياً أو أكبر من  :value.',
        'file' => 'حقل :attribute يجب أن يكون مساوياً أو أكبر من :value كيلوبايت.',
        'string' => 'حقل :attribute يجب أن يكون مساوياً أو أكبر من  :value خانات.',
        'array' => 'حقل :attribute يجب أن يكون مساوياً أو أكبر من :value عناصر.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورةً',
    'in' => 'حقل :attribute غير صالح',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP ذا بُنية صحيحة',
    'ipv4' => 'حقل :attribute يجبب أن يكون صالحاً ك عنوان IPv4 .',
    'ipv6' => 'حقل :attribute يجبب أن يكون صالحاً ك عنوان IPv6 .',
    'json' => 'يجب أن يكون حقل :attribute نصا من نوع JSON.',
    'lt' => [
        'numeric' => 'حقل :attribute يجب أن يكون أقل من  :value.',
        'file' => 'حقل :attribute يجب أن يكون أقل من :value كيلوبايت.',
        'string' => 'حقل :attribute يجب أن يكون أقل من  :value خانات.',
        'array' => 'حقل :attribute يجب أن يكون أقل من :value عناصر.',
    ],
    'lte' => [
        'numeric' => 'حقل :attribute يجب أن يكون مساوياً أو أقل من  :value.',
        'file' => 'حقل :attribute يجب أن يكون مساوياً أو أقل من :value كيلوبايت.',
        'string' => 'حقل :attribute يجب أن يكون مساوياً أو أقل من  :value خانات.',
        'array' => 'حقل :attribute يجب أن يكون مساوياً أو أقل من :value عناصر.',
    ],
    'max' => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر لـ :max.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes' => 'يجب أن يكون حقل ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون حقل ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر لـ :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يحتوي  :attribute على الأقل :min حروف' ,
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in' => 'حقل :attribute لاغٍ',
    'not_regex' => 'صيغة حقل :attribute غير صحيحة.',
    'numeric' => 'يجب على حقل :attribute أن يكون رقمًا',
    'password' => 'كلمة المرور غير صحيحة',
    'present' => 'يجب تقديم حقل :attribute',
    'regex' => 'صيغة حقل :attribute .غير صحيحة',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute إذا توفّر :values.',
    'required_with_all' => 'حقل :attribute إذا توفّر :values.',
    'required_without' => 'حقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array' => 'يجب أن يحتوي حقل :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'starts_with' => 'قيمة :attribute يجب أن تبدأ بإحدى هذه القيم : :values',
    'string' => 'يجب أن يكون حقل :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => ' :attribute مُستخدم من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'url' => 'صيغة الرابط :attribute غير صحيحة',
    'uuid' => 'يجب أن يكون  :attribute صالحاً ك UUID.',

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
