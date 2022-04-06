<?php

return [
    \Config\DataBase::class => \DI\factory([\Config\DataBase::class, 'bdd']),
];