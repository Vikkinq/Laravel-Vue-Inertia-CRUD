<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        post: Object
    });
</script>

<template>
    <div class="min-h-screen justify-center items-center py-10">
        <div class="pb-4 ml-3">
            <Link :href="`/posts`">Back</Link>
            <hr>
            <h1 class="text-2xl font-bold">
            {{ post.title }}
            </h1>
            <p class="text-l">{{ post.author }}</p>
            <p>{{ post.note }}</p>
        </div>
    </div>
</template>