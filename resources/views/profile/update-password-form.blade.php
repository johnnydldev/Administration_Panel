<x-form-section submit="updatePassword">
    <x-slot name="title">
        <div class="sm:flex">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                <path
                    d="M480 936q-75 0-140.5-28.5t-114-77q-48.5-48.5-77-114T120 576q0-75 28.5-140.5t77-114q48.5-48.5 114-77T480 216q82 0 155.5 35T760 350v-94h80v240H600v-80h110q-41-56-101-88t-129-32q-117 0-198.5 81.5T200 576q0 117 81.5 198.5T480 856q105 0 183.5-68T756 616h82q-15 137-117.5 228.5T480 936Zm112-192L440 592V376h80v184l128 128-56 56Z" />
            </svg> {{ __('Actualizar Contraseña') }}

        </div>

    </x-slot>

    <x-slot name="description">
        {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            
            <div class="sm:flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                    <path d="M280 656q-33 0-56.5-23.5T200 576q0-33 23.5-56.5T280 496q33 0 56.5 23.5T360 576q0 33-23.5 56.5T280 656Zm0 160q-100 0-170-70T40 576q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280 816Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280 416q-66 0-113 47t-47 113q0 66 47 113t113 47Z" />
                </svg>
                <x-label for="current_password" value="{{ __('Contraseña Actual') }}" />
                
            </div>
            <x-input id="current_password" type="password" class="mt-1 block w-full"
                    wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">

            <div class="sm:flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                    <path
                        d="M80 856v-80h800v80H80Zm46-242-52-30 34-60H40v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Z" />
                </svg>
                <x-label for="password" value="{{ __('Nueva Contraseña') }}" />

            </div>
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">
           
            <div class="sm:flex">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                    <path d="M80 856v-80h800v80H80Zm46-242-52-30 34-60H40v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Z" />
                </svg>
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                
            </div>
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full"
                    wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-input-error for="password_confirmation" class="mt-2" />

        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Guardada.') }}
        </x-action-message>

        <x-button>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z" />
            </svg>
            {{ __('Guardar') }}
        </x-button>
    </x-slot>
</x-form-section>
