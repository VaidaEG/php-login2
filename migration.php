<?php
// vienakrtinis, naudojamas pirma karta uzpildyti duomenim
$users = [
    ['name' => 'Petras', 'surname' => 'Petraitis', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Ona', 'surname' => 'Onaite', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
    ['name' => 'Simbadas', 'surname' => 'Piskulys', 'pass' => password_hash('123', PASSWORD_DEFAULT)],
];
file_put_contents(__DIR__.'/users.json', json_encode($users));

?>