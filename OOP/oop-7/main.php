<?php
require_once 'book.php';
require_once 'library.php';

echo '<pre>';

$lib = new Library();

$lib->addBook(new Book('1984', 'George Orwell'));
$lib->addBook(new Book('De Avonden', 'Gerard Reve'));
$lib->addBook(new Book('The Hobbit', 'J.R.R. Tolkien'));

echo "Leen boek 1984 uit aan Alice<br>resultaat: ";
echo $lib->lendBook('1984', 'Alice');
echo "<br>";

echo "Leen boek 1984 uit aan Bob<br>resultaat: ";
echo $lib->lendBook('1984', 'Bob');
echo "<br>";

echo "Boek 1984 wordt teruggebracht<br>resultaat: ";
echo $lib->returnBook('1984');
echo "<br>";

echo "Leen boek 1984 uit aan Bob<br>resultaat: ";
echo $lib->lendBook('1984', 'Bob');
echo "<br>";

echo "Leen The Hobbit uit aan Charlie<br>resultaat: ";
echo $lib->lendBook('The Hobbit', 'Charlie');
echo "<br>";

echo "Laat alle boeken zien<br>resultaat: ";
echo $lib->listBooks();
echo "<br>";

echo '</pre>';
?>