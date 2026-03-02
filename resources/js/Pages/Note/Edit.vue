<script setup>
    import { useForm } from '@inertiajs/vue3';

    let props = defineProps({
        post: Object
    })

    const form = useForm({
        title: props.post.title,
        author: props.post.author,
        note: props.post.note,
    })

    const onSubmit = (id) => {
        form.put(`/posts/${id}/update`, {
            onSuccess: () => {
            window.location.href = `/posts`;
            }
        })
    }
</script>

<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded w-full max-w-sm">
      <h1 class="text-xl font-bold mb-4 text-center">Create Note</h1>

      <form @submit.prevent="onSubmit(post.id)" class="space-y-3">
        <div>
          <label class="block mb-1">Title</label>
          <input
            type="text"
            v-model="form.title"
            class="w-full border px-2 py-1 rounded"
            placeholder="Title"
          />
        </div>

        <div>
          <label class="block mb-1">Author</label>
          <input
            type="text"
            v-model="form.author"
            class="w-full border px-2 py-1 rounded"
            placeholder="Author"
          />
        </div>

        <div>
          <label class="block mb-1">Note</label>
          <textarea
            v-model="form.note"
            class="w-full border px-2 py-1 rounded h-24"
            placeholder="Your note..."
          ></textarea>
        </div>

        <button
          type="submit"
          class="w-full bg-blue-500 text-white py-1 rounded hover:bg-blue-600"
        >
          Create
        </button>
      </form>
    </div>
  </div>
</template>