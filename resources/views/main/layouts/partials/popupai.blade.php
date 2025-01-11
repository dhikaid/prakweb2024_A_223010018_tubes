<!-- Live Chat Button -->
<div x-data="{ open: false, loading: false, prompt: '', city: '', result: '' }" class="fixed bottom-5 right-5">
    <!-- Chat Icon -->
    <button @click="open = true" class="bg-blue-500 text-white p-3 rounded-full shadow-lg hover:bg-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-7">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
        </svg>

    </button>

    <!-- Popup Modal -->
    <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center z-[9999] hidden"
        :class="{ 'hidden': !open }" style="backdrop-filter: blur(10px); background: rgba(0, 0, 0, 0.6)" x-transition
        id="AiBtn">
        <div class="bg-white w-96 rounded-lg shadow-md p-6 relative">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-bold text-blue-700">Meminta Rekomendasi oleh AI</h2>
                <button @click="open = false"
                    class="text-gray-400 hover:text-gray-600 font-bold text-xl">&times;</button>
            </div>

            <!-- Form -->
            <div class="mt-4 space-y-4">
                <!-- Prompt Textarea -->
                <div>
                    <label for="prompt" class="block text-sm font-medium text-gray-700">Prompt</label>
                    <textarea id="prompt" x-model="prompt" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        placeholder="Apa yang Anda cari? Misal: Saya ingin cari event dengan tema technology di kota Bandung"></textarea>
                </div>

                <!-- Recommendation Button -->
                <div>
                    <button @click="handleRecommendation"
                        :class="loading ? 'bg-gray-300 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-600'"
                        class="w-full text-white py-2 px-4 rounded-md shadow focus:outline-none focus:ring focus:ring-blue-200 flex items-center justify-center gap-2"
                        :disabled="loading">
                        <p x-show="!loading">Rekomendasi</p>
                        <div x-show="loading" class="flex items-center justify-center gap-2">
                            <p>Loading</p>
                            <svg class="animate-spin h-5 w-5 mx-auto text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Result -->
                <div x-show="result" class="mt-4 bg-blue-50 p-4 rounded-md">
                    <h3 class="text-sm font-medium text-blue-700">Hasil:</h3>
                    <p class="text-gray-600" x-text="result"></p>
                </div>
            </div>
        </div>
    </div>
</div>