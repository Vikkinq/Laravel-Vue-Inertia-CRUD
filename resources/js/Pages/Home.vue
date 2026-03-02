<script setup>
  defineProps({
    users: Array
  })
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div>
      <h1 class="text-4xl font-bold text-black-600">
      Goated
    </h1>
    </div>
    <div>
      <h1 v-for="user in users"  :key="user.uid">{{ user.username }}</h1>
    </div>
  </div>
</template>