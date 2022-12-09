<div style="height: 80vh; width: 30vw; background-color: #000"
    class="text-white px-5 py-2 rounded-lg border border-blue-500">
    <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data"
        style="display:flex;flex-direction:column;gap: 10px;align-content: center;">
        @csrf
        <!-- Picture -->
        <div>
            <x-image-input />
        </div>

        <!-- Description -->
        <div style="display:flex; flex-direction:column;  align-items:center;" class="mt-4">
            <label for="description" style="width:100%; text-align:left;">Descripción:</label>

            <textarea style="color:black; width: 100%" id="story" name="description" rows="5" cols="33" placeholder="Descripción de la imagen..." required></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Submit -->
        <x-primary-button class="ml-4" style="width: 30%;text-align:center;">
            {{ __('Publicar') }}
        </x-primary-button>

    </form>
</div>