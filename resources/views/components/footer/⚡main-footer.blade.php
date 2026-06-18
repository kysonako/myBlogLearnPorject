<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-gray-800 text-white p-4 mt-8 ">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center text-green-700">
        <p class="text-sm">
            &copy; {{ date('Y') }} Мой блог. Все права защищены.
        </p>
        <nav class="space-x-4 text-sm mt-2 md:mt-0">
            <a href="#" class="hover:text-green-200">Политика конфиденциальности</a>
            <a href="#" class="hover:text-green-200">Пользовательское соглашение</a>
            <a href="#" class="hover:text-green-200">Контакты</a>
        </nav>
    </div>
</footer>
