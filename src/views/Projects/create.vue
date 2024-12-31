<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const title = ref('');
const description = ref('');
const image = ref(''); // URL sesuai dengan backend
const start_date = ref('');
const end_date = ref('');
const projectId = ref(null); // For storing the project ID if editing
const router = useRouter();

// Create a new project
const createProject = async () => {
  if (!title.value || !description.value || !start_date.value || !end_date.value) {
    console.error('Semua field harus diisi!');
    return;
  }

  // Payload sesuai dengan format backend
  const payload = {
    title: title.value,
    description: description.value,
    image: image.value, // Kirim sebagai URL
    start_date: start_date.value,
    end_date: end_date.value,
  };

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/projects', payload);

    if (response.status === 200 || response.status === 201) {
      console.log('Project created successfully!');
      router.push({ name: 'ProjectsIndex' });
    } else {
      console.error('Gagal membuat project', response.data);
    }
  } catch (error) {
    console.error('Error creating project:', error);
  }
};

// Fetch project data when editing
onMounted(async () => {
  const id = router.currentRoute.value.params.id;
  if (id) {
    projectId.value = id;
    try {
      const response = await axios.get(`http://127.0.0.1:8000/api/projects/${id}`);
      title.value = response.data.data.title;
      description.value = response.data.data.description;
      image.value = response.data.data.image;
      start_date.value = response.data.data.start_date;
      end_date.value = response.data.data.end_date;
    } catch (error) {
      console.error('Error fetching project:', error);
    }
  }
});
</script>

<template>
  <div class="container mt-5">
    <h2 class="mb-4" v-if="projectId">Edit Project</h2>
    <h2 class="mb-4" v-else>Tambah Project Baru</h2>

    <form @submit.prevent="createProject">
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
        <input type="url" class="form-control" id="image" v-model="image" required>
      </div>

      <div class="mb-3">
        <label for="start_date" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="start_date" v-model="start_date" required>
      </div>

      <div class="mb-3">
        <label for="end_date" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="end_date" v-model="end_date" required>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</template>
