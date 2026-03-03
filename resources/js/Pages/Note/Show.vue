<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    post: Object,
});
</script>

<template>
    <div class="min-h-screen bg-gray-100 py-10 flex flex-col items-center">
        <div>
            <Link :href="`/notes`">Back</Link>
        </div>
        <div class="w-full max-w-md px-4 space-y-4">
            <div class="bg-white border rounded p-4">
                <h2 class="text-2xl font-bold mb-1">{{ post.title }}</h2>
                <h3 class="text-gray-700 mb-2">{{ post.author }}</h3>
                <hr class="my-2" />
                <p class="mb-3">{{ post.note }}</p>

                <div class="space-x-2 font-semibold">
                    <Link
                        :href="`/notes/${post.id}`"
                        class="text-green-500 hover:underline"
                        >Edit</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>
