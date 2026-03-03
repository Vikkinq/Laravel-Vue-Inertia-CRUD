<script setup>
    import { useForm, Link } from '@inertiajs/vue3';
    import { route } from 'ziggy-js'

    

    let props = defineProps({
        post: Object
    })

    const form = useForm({
        title: props.post.title,
        author: props.post.author,
        note: props.post.note,
    })

    const onSubmit = (id) => {
        try {
          form.put(`/notes/${id}/update`, {
            onSuccess: () => {
              form.reset()
            }
          })
        } catch(err){
          console.log(err)
        }
    }
</script>

<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded w-full max-w-sm">
      <h1 class="text-xl font-bold mb-4 text-center">Update Note</h1>

      <Link :href="'/notes'">Back</Link>


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
            placeholder="Enter your note..."
          ></textarea>
        </div>

        <button
          type="submit"
          class="w-full bg-blue-500 text-white py-1 rounded hover:bg-blue-600"
        >
          Update
        </button>
      </form>
    </div>
  </div>
</template>