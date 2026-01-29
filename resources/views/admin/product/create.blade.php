@extends('dashboard.admin.layout')

@section('title', 'Tambah Produk')

@section('content')

<div class="max-w-2xl mx-auto space-y-6">

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
        Tambah Produk
    </h1>
    <p class="text-sm text-gray-500 dark:text-gray-400">
        Lengkapi informasi produk yang akan ditambahkan
    </p>
</div>
<div class="max-w-6xl bg-white rounded-lg shadow
            dark:bg-gray-800 dark:border dark:border-gray-700">

    <form action="{{ route('admin.product.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="p-6 space-y-5">
        @csrf
        <input type="hidden" name="adjusted_image" id="adjusted_image">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Foto Produk
            </label>

            <div class="flex items-center gap-4">
                <div class="w-40 h-32 rounded-lg border border-dashed
                            border-gray-300 dark:border-gray-600
                            flex items-center justify-center
                            bg-gray-50 dark:bg-gray-700 overflow-hidden">
                    <img id="imagePreview" class="hidden w-full h-full object-cover">
                    <span id="imagePlaceholder"
                          class="text-xs text-gray-400 dark:text-gray-500">
                        Preview
                    </span>
                </div>

                <input type="file"
                       name="image"
                       accept="image/*"
                       onchange="previewImage(event)"
                       class="block w-full text-sm text-gray-600 dark:text-gray-300
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-medium
                              file:bg-indigo-50 file:text-indigo-700
                              hover:file:bg-indigo-100
                              dark:file:bg-indigo-900/30 dark:file:text-indigo-300">
            </div>

            <!-- Image settings-->
            <div id="imageControls" class="hidden mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                <h4 class="text-sm font-medium text-gray-900 dark:text-white mb-3">Sesuaikan Gambar</h4>
                <div class="space-y-3">
                    <div class="text-xs text-gray-600 dark:text-gray-400 mb-2">
                        Atur ukuran foto 
                    </div>
                    <div class="flex gap-2">
                        <button type="button" onclick="resetImageAdjustment()"
                                class="px-3 py-1 text-xs bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded">
                            Reset
                        </button>
                        <button type="button"
                            onclick="openSaveImageModal()"
                            class="px-3 py-1 text-xs bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Simpan Penyesuaian
                        </button>
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        Zoom: <span id="zoomLevel">100</span>% | Posisi: (<span id="posX">0</span>, <span id="posY">0</span>)
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
        <div class="space-y-5">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Produk
                </label>
                <input type="text" name="name" required
                       value="{{ old('name') }}"
                       placeholder="Nama"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Supplier
                </label>
                <select name="supplier_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option disabled selected>-- Pilih Supplier --</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Kategori
                </label>
                <select name="category_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option disabled selected>-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </div>
        <div class="space-y-5">
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    SKU
                </label>
                <input type="text" name="sku" required
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                              focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                              dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Harga Beli
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        Rp
                    </span>

                    <input type="text"
                        id="purchase_price_display"
                        placeholder="0"
                        oninput="formatRupiah(this, 'purchase_price')"
                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <input type="hidden" name="purchase_price" id="purchase_price">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Harga Jual
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        Rp
                    </span>

                    <input type="text"
                        id="selling_price_display"
                        placeholder="0"
                        oninput="formatRupiah(this, 'selling_price')"
                        class="pl-10 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
                <input type="hidden" name="selling_price" id="selling_price">
            </div>
        </div>
        </div>
        <div class="border-2 border-gray-300 dark:border-gray-600 rounded-lg p-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Atribut Produk
            </label>

            <div id="attribute-wrapper" class="space-y-2">
                <div class="flex gap-2">
                    <input type="text" name="attributes[0][name]" placeholder="Nama"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <input type="text" name="attributes[0][value]" placeholder="Nilai"
                           class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>
            </div>

            <button type="button"
                    onclick="addAttribute()"
                    class="mt-2 text-sm font-medium text-indigo-600 hover:underline">
                + Tambah Atribut
            </button>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Deskripsi
            </label>
            <textarea name="description" rows="3"
                      class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                             resize-none
                             dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
        </div>
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.product.index') }}"
               class="px-4 py-2 text-sm font-medium text-gray-700
                      bg-gray-100 rounded-lg hover:bg-gray-200
                      dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </a>

            <button type="submit"
                    class="px-5 py-2 text-sm font-medium text-white
                           bg-indigo-600 rounded-lg hover:bg-indigo-700
                           focus:ring-4 focus:ring-indigo-300">
                Simpan Produk
            </button>
        </div>

    </form>
</div>
</div>
<!--MODAL SIMPAN PENYESUAIAN FOTO-->
<div id="saveImageModal" tabindex="-1"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">

    <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow
                dark:bg-gray-800">

        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4
                    bg-indigo-100 rounded-full dark:bg-indigo-900">
            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-300"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h3 class="mb-2 text-lg font-semibold text-center
                   text-gray-900 dark:text-white">
            Simpan Penyesuaian Foto?
        </h3>
        <p class="mb-6 text-sm text-center
                  text-gray-500 dark:text-gray-400">
            Foto produk akan disimpan sesuai dengan ukuran dan posisi yang telah kamu atur.
        </p>
        <div class="flex justify-center gap-3">
            <button type="button"
                    onclick="closeSaveImageModal()"
                    class="px-4 py-2 text-sm font-medium
                           text-gray-700 bg-gray-200 rounded-lg
                           hover:bg-gray-300
                           dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                Batal
            </button>
            <button type="button"
                    onclick="confirmSaveImage()"
                    class="px-4 py-2 text-sm font-medium
                           text-white bg-indigo-600 rounded-lg
                           hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300
                           dark:focus:ring-indigo-800">
                Ya, Simpan
            </button>
        </div>

    </div>
</div>

<!-- SCRIPT -->
<script>
let attrIndex = 1;
let imageState = {
    scale: 1,
    translateX: 0,
    translateY: 0,
    isDragging: false,
    startX: 0,
    startY: 0,
    originalImage: null
};

function addAttribute() {
    document.getElementById('attribute-wrapper').insertAdjacentHTML('beforeend', `
        <div class="flex gap-2">
            <input type="text" name="attributes[${attrIndex}][name]" placeholder="Nama"
                   class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <input type="text" name="attributes[${attrIndex}][value]" placeholder="Nilai"
                   class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>
    `);
    attrIndex++;
}

function previewImage(event) {
    const img = document.getElementById('imagePreview');
    const placeholder = document.getElementById('imagePlaceholder');
    const controls = document.getElementById('imageControls');

    const file = event.target.files[0];
    if (!file) return;

    img.src = URL.createObjectURL(file);
    img.classList.remove('hidden');
    img.classList.remove('object-cover');
    img.classList.add('object-contain');
    placeholder.classList.add('hidden');
    controls.classList.remove('hidden');

    resetImageAdjustment();

    imageState.originalImage = file;

    img.addEventListener('mousedown', startDrag);
    img.addEventListener('wheel', handleZoom);
    img.addEventListener('dragstart', (e) => e.preventDefault());
}

function startDrag(e) {
    e.preventDefault();
    imageState.isDragging = true;
    imageState.startX = e.clientX - imageState.translateX;
    imageState.startY = e.clientY - imageState.translateY;

    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', stopDrag);
}

function drag(e) {
    if (!imageState.isDragging) return;

    imageState.translateX = e.clientX - imageState.startX;
    imageState.translateY = e.clientY - imageState.startY;

    updateImageDisplay();
}

function stopDrag() {
    imageState.isDragging = false;
    document.removeEventListener('mousemove', drag);
    document.removeEventListener('mouseup', stopDrag);
}

function handleZoom(e) {
    e.preventDefault();

    const zoomFactor = e.deltaY > 0 ? 0.9 : 1.1;
    const newScale = Math.max(0.1, Math.min(3, imageState.scale * zoomFactor));

    const rect = e.target.getBoundingClientRect();
    const mouseX = e.clientX - rect.left;
    const mouseY = e.clientY - rect.top;

    const scaleChange = newScale / imageState.scale;
    imageState.translateX = mouseX - (mouseX - imageState.translateX) * scaleChange;
    imageState.translateY = mouseY - (mouseY - imageState.translateY) * scaleChange;

    imageState.scale = newScale;
    updateImageDisplay();
}

function updateImageDisplay() {
    const img = document.getElementById('imagePreview');
    img.style.transform = `translate(${imageState.translateX}px, ${imageState.translateY}px) scale(${imageState.scale})`;

    document.getElementById('zoomLevel').textContent = Math.round(imageState.scale * 100);
    document.getElementById('posX').textContent = Math.round(imageState.translateX);
    document.getElementById('posY').textContent = Math.round(imageState.translateY);
}

function resetImageAdjustment() {
    imageState.scale = 1;
    imageState.translateX = 0;
    imageState.translateY = 0;
    updateImageDisplay();
}

function openSaveImageModal() {
    const modal = document.getElementById('saveImageModal');
    modal.classList.remove('hidden');
}

function closeSaveImageModal() {
    const modal = document.getElementById('saveImageModal');
    modal.classList.add('hidden');
}

function captureAdjustedImage() {
    return new Promise((resolve, reject) => {
        if (!imageState.originalImage) {
            resolve();
            return;
        }

        const previewImg = document.getElementById('imagePreview');
        const container = previewImg.parentElement;

        const originalImg = new Image();
        originalImg.onload = function () {

            const canvas = document.createElement('canvas');
            canvas.width = originalImg.width;
            canvas.height = originalImg.height;
            const ctx = canvas.getContext('2d');

            const scaleX = originalImg.width / container.offsetWidth;
            const scaleY = originalImg.height / container.offsetHeight;

            const finalScale = imageState.scale;
            const translateX = imageState.translateX * scaleX;
            const translateY = imageState.translateY * scaleY;

            ctx.save();
            ctx.translate(
                canvas.width / 2 + translateX,
                canvas.height / 2 + translateY
            );
            ctx.scale(finalScale, finalScale);
            ctx.translate(-canvas.width / 2, -canvas.height / 2);

            ctx.drawImage(originalImg, 0, 0);
            ctx.restore();

            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('adjusted_image').value = dataURL;

            const fileInput = document.querySelector('input[name="image"]');
            fileInput.value = '';

            previewImg.src = dataURL;
            previewImg.style.transform = 'none';

            resetImageAdjustment();
            resolve();
        };

        const reader = new FileReader();
        reader.onload = e => originalImg.src = e.target.result;
        reader.onerror = reject;
        reader.readAsDataURL(imageState.originalImage);
    });
}

async function confirmSaveImage() {
    try {
        await captureAdjustedImage();

        const modal = document.getElementById('saveImageModal');
        modal.classList.add('hidden');
    } catch (error) {
        console.error('Failed to save image adjustments:', error);
        alert('Gagal menyimpan penyesuaian gambar. Silakan coba lagi.');
    }
}
</script>
<script>
function formatRupiah(input, hiddenId) {
    let value = input.value.replace(/[^0-9]/g, '');

    document.getElementById(hiddenId).value = value;
    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}
</script>


@endsection
