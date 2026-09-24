<?php
class Book {
    private string $title;
    private string $author;
    private bool $available = true;
    private int $aantalKeerUitgeleend = 0;

    public function __construct(string $title, string $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function isAvailable(): bool {
        return $this->available;
    }

    public function setAvailable(bool $avail): void {
        $this->available = $avail;
    }

    public function leenUit(): void {
        $this->aantalKeerUitgeleend++;
    }

    public function getUitleenData(): int {
        return $this->aantalKeerUitgeleend;
    }
}
?>