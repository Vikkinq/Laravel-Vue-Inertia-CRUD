<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        posts: Array
    });
    
</script>

<template>
    <div class="min-h-screen justify-center items-center py-10">
        <div>
            <h1 class="text-3xl font-bold pb-4 m-6">Index</h1>
            <Link :href="`/posts/create`">Create new Note</Link>
        </div>
        <div v-for="post in posts" :key="post.id" class="border p-2 m-6">
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <h3>{{ post.author }}</h3>
            <hr>
            <p>{{ post.note }}</p>
            <div class="pl-1 pt-4 pb-4 font-bold">
                <Link :href="`/posts/${post.id}`">Read More</Link> |
                <Link :href="`/posts/${post.id}/edit`">Edit</Link> |
                <Link :href="`/posts/${post.id}/delete`" method="DELETE">Delete</Link>

            </div>
        </div>
    </div>
</template>