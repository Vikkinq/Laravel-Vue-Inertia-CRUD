<script setup>
    import { useForm, router, Link } from '@inertiajs/vue3';

    defineProps({
        users: Array
    });

    const form = useForm({
        username: '',
        role: '',
    })

    const deleteForm = useForm({})

    const submit = () => {
        form.post('/users', {
            onSuccess: () => {
            form.reset()
            }
        })
    }

    const deleteUser = (id) => {
        if(confirm('Delete?')) router.delete(`/users/${id}`);
    };

</script>

<template>
    <div class="min-h-screen bg-gray-100 flex flex-row justify-center items-center py-10">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 mb-8 mr-4">
            <form @submit.prevent="submit">
                <input type="text" v-model="form.username" placeholder="Enter Username">
                <input type="text" v-model="form.role" placeholder="Enter Role">
                <button type="submit">Create</button>
            </form>
        </div>
        <div v-for="user in users" :key="user.id" class="border p-2 mb-2 mr-3">
            <p>UID: {{ user.id }}</p>
            <p>Username: {{ user.username }}</p>
            <p>Role: {{ user.role }}</p>
            <hr>
            <div class="mt-2">
                <button type="button" class="mr-2 bg-red-200" @click="deleteUser(user.id)">Delete</button>
                <button class="ml-2 bg-cyan-200">Update</button>
                <Link href="/users/{{user.id}}/edit">
                    Users
                </Link>
            </div>
        </div>
    </div>
</template>