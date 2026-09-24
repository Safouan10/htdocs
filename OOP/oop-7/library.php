<?php
require_once 'book.php';

class Library {

    private array $books = [];
    private array $loans = [];

    public function addBook(Book $book): void {
        $this->books[$book->getTitle()] = $book;
    }

    public function lendBook(string $title, string $member): string {

        if (!isset($this->books[$title])) {
            return "Boek \"{$title}\" bestaat niet.\n";
        }

        $book = $this->books[$title];

        if (!$book->isAvailable()) {
            return "Boek \"{$title}\" is al uitgeleend.\n";
        }

        $book->setAvailable(false);
        $book->leenUit();
        $this->loans[$title] = $member;

        return "{$member} leent \"{$title}\".\n";
    }

    public function returnBook(string $title): string {

        if (!isset($this->books[$title])) {
            return "Boek \"{$title}\" bestaat niet.\n";
        }

        if (!isset($this->loans[$title])) {
            return "Boek \"{$title}\" was niet uitgeleend.\n";
        }

        $member = $this->loans[$title];

        unset($this->loans[$title]);

        $this->books[$title]->setAvailable(true);

        return "{$member} brengt \"{$title}\" terug.\n";
    }

    public function listBooks(): string {

        $output = '';

        foreach ($this->books as $book) {

            if ($book->isAvailable()) {
                $status = 'beschikbaar';
            } else {
                $status = 'uitgeleend aan ' . $this->loans[$book->getTitle()];
            }

            $output .= $book->getTitle() . ' - ' . $status . "\n";
            $output .= 'Aantal keren uitgeleend: ' . $book->getUitleenData() . "\n\n";
        }

        return $output;
    }
}
?>