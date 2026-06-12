<div class="grid gap-5">
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Nama Potensi</label>
        <input name="name" value="{{ old('name', $potential->name ?? '') }}" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
        @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Kategori</label>
        <select name="category" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
            @foreach($categories as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $potential->category ?? '') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('category')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
    </div>
    @if($potential?->photo)
        <img src="{{ Storage::url($potential->photo) }}" alt="{{ $potential->name }}" class="h-48 w-full rounded-xl object-cover">
    @endif
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Foto</label>
        <input type="file" name="photo" accept="image/*" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">{{ old('description', $potential->description ?? '') }}</textarea>
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-gray-700">Manfaat</label>
        <textarea name="benefit" rows="4" class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm">{{ old('benefit', $potential->benefit ?? '') }}</textarea>
    </div>
    <label class="flex items-center gap-3 text-sm text-gray-700">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $potential->is_active ?? true)) class="rounded border-gray-300 text-green-600">
        Tampilkan di website
    </label>
</div>
