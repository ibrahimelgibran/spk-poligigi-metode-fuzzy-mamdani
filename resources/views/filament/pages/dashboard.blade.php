<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- Total Alat Kesehatan --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-document-text" class="w-10 h-10 text-gray-700" />
            <div>
                {{-- label + angka --}}
                <div class="text-sm font-semibold text-gray-700 flex items-baseline space-x-1">
                    <span>Total</span>
                </div>
                <div class="text-lg font-bold text-gray-700">Alat dan Bahan <span class="font-bold">{{ number_format($totalAset) }}</span></div>
            </div>
        </div>

        {{-- Total Supplier --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-truck" class="w-10 h-10 text-gray-700" />
            <div>
                <div class="text-sm font-semibold text-gray-700 flex items-baseline space-x-1">
                    <span>Total</span>
                </div>
                <div class="text-lg font-bold text-gray-700">Supplier <span class="font-bold">{{ number_format($totalSupplier) }}</span></div>
            </div>
        </div>

        {{-- Total Penilaian --}}
        <div class="flex items-center space-x-5 p-4 bg-white rounded-xl shadow-sm">
            <x-icon name="heroicon-o-clipboard-document-check" class="w-10 h-10 text-gray-700" />
            <div>
                <div class="text-sm font-semibold text-gray-700 flex items-baseline space-x-1">
                    <span>Total</span>
                </div>
                <div class="text-lg font-bold text-gray-700">Penilaian <span class="font-bold">{{ number_format($totalNilai) }}</span></div>
            </div>
        </div>

    </div>
</x-filament::page>
