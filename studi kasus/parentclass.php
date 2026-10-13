<?php

// ===================================================
// PARENT CLASS: WebComponent (Model/View Dasar)
// ===================================================
class WebComponent {
    protected string $title;
    protected string $cssClass;

    public function __construct(string $title, string $cssClass = "card mb-3 shadow-sm") {
        $this->title = $title;
        $this->cssClass = $cssClass;
    }

    // Method dasar untuk merender kerangka HTML (Bootstrap 5 Card)
    public function renderHeader(): void {
        echo "<div class='{$this->cssClass}'>";
        echo "<div class='card-header bg-primary text-white'><b>{$this->title}</b></div>";
        echo "<div class='card-body'>";
    }

    public function renderFooter(): void {
        echo "</div></div>";
    }

    // Method utama yang akan di-override
    public function renderContent(): void {
        echo "Konten default web component.";
    }

    // Method template utama
    public function render(): void {
        $this->renderHeader();
        $this->renderContent();
        $this->renderFooter();
    }
}