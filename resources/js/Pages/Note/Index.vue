<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    posts: Array,
    pagination: Object,
});

const selectedSort = ref("newest");

const changeSort = () => {
    router.get(
        "/notes",
        {
            sort: selectedSort.value,
        },
        {
            preserveState: true,
            replace: true,
        },
    );
};

const deletePost = (id, title) => {
    try {
        if (!confirm(`Are you sure to Delete: ${title}`)) return false;
        const form = useForm();
        form.delete(`/notes/${id}/delete`, {
            onSuccess: () => {
                console.log("Deleted");
            },
        });
    } catch (err) {
        console.log(err);
    }
};
</script>

<template>
    <div class="min-h-screen bg-gray-100 py-10 flex flex-col items-center">
        <!-- Header -->
        <div class="w-full max-w-md mb-6 px-4">
            <h1 class="text-3xl font-bold mb-4 text-center">Index</h1>
            <Link
                :href="`/notes/create`"
                class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
            >
                Create New Note
            </Link>
        </div>

        <div class="w-full max-w-md mb-6 px-4 items-center justify-center flex">
            <select v-model="selectedSort" @change="changeSort">
                <option value="All">All</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
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
                        :href="`/notes/${post.id}`"
                        class="text-blue-500 hover:underline"
                        >Read More</Link
                    >
                    |
                    <Link
                        :href="`/notes/${post.id}/edit`"
                        class="text-green-500 hover:underline"
                        >Edit</Link
                    >
                    |
                    <button
                        @click="deletePost(post.id, post.title)"
                        class="cursor-pointer text-red-800 hover:underline"
                    >
                        Delete
                    </button>
                </div>
            </div>

            <!-- Pagination -->
            <div>
                <div class="pagination">
                    <button
                        :disabled="pagination.current_page === 1"
                        @click="
                            router.get(
                                `/notes?page=${pagination.current_page - 1}`,
                            )
                        "
                        class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r cursor-pointer"
                    >
                        Previous
                    </button>

                    <span class="mr-2 ml-2"
                        >Page {{ pagination.current_page }} of
                        {{ pagination.last_page }}</span
                    >

                    <button
                        :disabled="
                            pagination.current_page === pagination.last_page
                        "
                        @click="
                            router.get(
                                `/notes?page=${pagination.current_page + 1}`,
                            )
                        "
                        class="bg-blue-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r cursor-pointer"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
