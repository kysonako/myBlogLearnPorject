<?php

use Livewire\Component;

new class extends Component {
    // Здесь может быть ваш PHP-код, если нужен
    // Например, публичные свойства или методы
};
?>


<header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
    <h1 class="hover:text-green-200">
        Мой блог
    </h1>
        <nav class="space-x-2">
            <a href="/" wire:navigate class="text-green-700 hover:text-green-200">Блог</a>
            <a href="/about" wire:navigate class="text-green-700 hover:text-green-200">О нас</a>
            <a href="/profile" wire:navigate class="text-green-700 hover:text-green-200">Профиль</a>
        </nav>
    </div>

</header>
