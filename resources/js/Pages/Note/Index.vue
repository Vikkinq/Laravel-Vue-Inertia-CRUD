<script setup>
    import { Link, router, useForm } from '@inertiajs/vue3';

    defineProps({
        posts: Array
    });

    const deletePost = (id) => {
        const form = useForm()
        form.delete(`/posts/${id}`, {
            onSuccess: () => {
                console.log("Deleted")
                window.location.href = '/posts'
        }
    })
}
    
</script>

<template>
  <div class="min-h-screen bg-gray-100 py-10 flex flex-col items-center">
    <!-- Header -->
    <div class="w-full max-w-md mb-6 px-4">
      <h1 class="text-3xl font-bold mb-4 text-center">Index</h1>
      <Link
        :href="`/posts/create`"
        class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
      >
        Create New Note
      </Link>
    </div>

    <div class="w-full max-w-md px-4 space-y-4">
      <div
        v-for="post in posts"
        :key="post.id"
        class="bg-white border rounded p-4"
      >
        <h2 class="text-2xl font-bold mb-1">{{ post.title }}</h2>
        <h3 class="text-gray-700 mb-2">{{ post.author }}</h3>
        <hr class="my-2" />
        <p class="mb-3">{{ post.note }}</p>

        <div class="space-x-2 font-semibold">
          <Link
            :href="`/posts/${post.id}`"
            class="text-blue-500 hover:underline"
          >Read More</Link> |
          <Link
            :href="`/posts/${post.id}/edit`"
            class="text-green-500 hover:underline"
          >Edit</Link> |
          <button @click="deletePost(post.id)">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>