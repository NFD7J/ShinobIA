<?php

namespace App\entities;

class Succes
{
    private ?int   $successId;
    private string $name;
    private string $description;
    private string $unlockHint;
    private string $icon;

    // Propriété calculée (non stockée en BDD), remplie par le modèle
    private bool   $unlocked = false;

    public function __construct(
        ?int   $successId,
        string $name,
        string $description,
        string $unlockHint,
        string $icon
    ) {
        $this->successId   = $successId;
        $this->name        = $name;
        $this->description = $description;
        $this->unlockHint  = $unlockHint;
        $this->icon        = $icon;
    }

    public function getSuccessId(): ?int    { return $this->successId; }
    public function getName(): string       { return $this->name; }
    public function getDescription(): string{ return $this->description; }
    public function getUnlockHint(): string { return $this->unlockHint; }
    public function getIcon(): string       { return $this->icon; }
    public function isUnlocked(): bool      { return $this->unlocked; }

    public function setUnlocked(bool $unlocked): void
    {
        $this->unlocked = $unlocked;
    }
}