<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';

const title = ref('');
const description = ref('');
const image = ref(''); // URL image
const start_date = ref('');
const end_date = ref('');
const router = useRouter();
const route = useRoute();

const getProject = async () => {
  try {
    const response = await axios.get(`http://localhost:8000/api/projects/${route.params.id}`);
    const project = response.data.data; // Mengakses data di dalam respons API
    title.value = project.title;
    description.value = project.description;
    image.value = project.image; // URL image
    start_date.value = project.start_date;
    end_date.value = project.end_date;
  } catch (error) {
    console.error('Error fetching project:', error);
  }
};

const updateProject = async () => {
  try {
    await axios.put(`http://localhost:8000/api/projects/${route.params.id}`, {
      title: title.value,
      description: description.value,
      image: image.value, // URL image
      start_date: start_date.value,
      end_date: end_date.value,
    });
    router.push('/projects'); // Redirect ke halaman daftar project
  } catch (error) {
    console.error('Error updating project:', error);
  }
};

onMounted(getProject);
</script>

<template>
  <div class="container mt-5">
    <h2 class="mb-4">Edit Project</h2>
    <form @submit.prevent="updateProject">
      <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" v-model="title" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" v-model="description" required></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">URL Gambar</label>
        <input
          type="text"
          class="form-control"
          id="image"
          v-model="image"
          placeholder="Masukkan URL gambar"
          required
        >
      </div>
      <div class="mb-3">
        <label for="start_date" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="start_date" v-model="start_date" required>
      </div>
      <div class="mb-3">
        <label for="end_date" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="end_date" v-model="end_date" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
  </div>
</template>

<style scoped>
.container {
  max-width: 600px;
  margin: 0 auto;
}
</style>
