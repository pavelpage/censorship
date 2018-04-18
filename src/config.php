<?php

return [

    // these are default patterns,
    // but you can overwrite it manually
    'default_obscene_patterns' => [
        '/(\s|^|рас|раз|под|о|при)(ху(й|и|я|е|л(и|е)))/ui',
        '/(\s|^|)(пид(о|а|e)р)/ui',
        '/(\s|^|)(еблан)/ui',
        '/(\s|^|)(гандон)/ui',
        '/(\s|^|^истр(е|и))(бля(дь)*)/ui',
        '/(\s|^|^[закол]|разъ|за|отъ|вы)(еб(ать|ал|и|н|уч(ая|ий))*)/ui',
        '/(\s|^|)(муд(е|ил|о|а|я|ло|еб))/ui',
        '/(\s|^|)(пизд(а|ец|юк|y))/ui',
        '/(\s|^|от)(сос(и|ать))/ui',
        '/д(е|и)би(л|лы)/ui',
        '/(е|ё|йо)пта/ui',
        '/проебина/ui',
        '/педераст/ui',
        '/у(е|ё)бок/ui',
        '/уебан/ui',
        '/пидрил/ui',
    ],

    // you can add your own patterns to find obscene words
    'obscene_patterns' => [

    ],

    'replace_pattern' => '***',

    'obscene_words' => [

    ],

    'except_words' => [

    ]

];