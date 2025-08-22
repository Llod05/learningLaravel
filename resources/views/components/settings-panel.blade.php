@props(['icon' => '/images/settings-icon.png'])

<!-- GOMB ÉS PANEL -->
<div x-data="{
        open: false,
        darkMode: false,
        toggleTheme() {
            this.darkMode
                ? document.documentElement.classList.add('dark')
                : document.documentElement.classList.remove('dark');
        }
    }" class="flex items-center h-full">

    <!-- Beállítás ikon gomb -->
    <button @click="open = !open"
            :class="{ '-rotate-90': open }"
            class="transition-transform duration-300">
        <img src="{{ $icon }}" alt="Beállítások" class="w-6 h-6" />
    </button>

    <!-- Oldalsáv -->
    <div x-show="open"
         x-transition:enter="transition transform duration-500"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-500"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed top-14 right-0 h-full w-64 bg-white dark:bg-gray-800 shadow-lg p-4 z-50"
         @click.away="open = false">

        <h2 class="text-xl font-semibold mb-4 text-black dark:text-white">Beállítások</h2>

        <!-- Téma kapcsoló -->
        <div class="mt-6">
            <label class="flex items-center space-x-2">
                <input type="checkbox" x-model="darkMode" @change="toggleTheme"
                       class="form-checkbox h-4 w-4 text-green-600" />
                <span class="text-black dark:text-white">Sötét mód</span>
            </label>
        </div>
    </div>

</div>
