<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const projects = ref([]); // Menyimpan daftar project
const loading = ref(true); // Status loading
const error = ref(null); // Menyimpan pesan error

// Fungsi untuk mendapatkan daftar project
const getProjects = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/projects');
    console.log('Response data:', response.data); // Debugging untuk memastikan struktur respons
    projects.value = response.data.data.data || []; // Menyimpan data project sesuai struktur
  } catch (err) {
    error.value = 'Gagal memuat data projek. Silakan coba lagi.'; // Pesan error yang ditampilkan
    console.error('Error fetching projects:', err); // Debugging error
  } finally {
    loading.value = false; // Menyembunyikan loading setelah request selesai
  }
};

// Fungsi untuk menghapus project
const deleteProject = async (id) => {
  if (!confirm('Apakah Anda yakin ingin menghapus project ini?')) return; // Konfirmasi sebelum menghapus

  try {
    await axios.delete(`http://127.0.0.1:8000/api/projects/${id}`);
    projects.value = projects.value.filter(project => project.id !== id); // Menghapus project dari daftar
    alert('Project berhasil dihapus.');
  } catch (err) {
    console.error('Error deleting project:', err);
    alert('Gagal menghapus project. Silakan coba lagi.');
  }
};

// Memanggil fungsi getProjects saat komponen dimuat
onMounted(getProjects);
</script>

<template>
  <div class="container mt-5">
    <h2 class="mb-4">Daftar Project Kami</h2>
    <router-link to="/projects/create" class="btn btn-success mb-3">Tambah Project</router-link>

    <!-- Pesan Loading -->
    <div v-if="loading" class="text-center">
      <p>Memuat data projek...</p>
    </div>

    <!-- Pesan Error -->
    <div v-else-if="error" class="alert alert-danger text-center">
      {{ error }}
    </div>

    <!-- Menampilkan daftar project -->
    <div v-else>
      <!-- Jika ada project -->
      <div class="row" v-if="projects.length > 0">
        <div class="col-sm-6 col-md-4 col-lg-3" v-for="project in projects" :key="project.id">
          <div class="card mb-4">
            <img 
              v-if="project.image" 
              :src="project.image" 
              class="card-img-top" 
              :alt="'Image of ' + project.title"
            >
            <div class="card-body">
              <h5 class="card-title">{{ project.title }}</h5>
              <p class="card-text">{{ project.description }}</p>
              <router-link 
                :to="'/projects/' + project.id + '/edit'" 
                class="btn btn-warning btn-sm me-2"
              >
                Edit
              </router-link>
              <button 
                class="btn btn-danger btn-sm"
                @click="deleteProject(project.id)"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Jika tidak ada project -->
      <div v-else class="text-center">
        <p>Belum ada projek tersedia.</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Gaya untuk gambar dalam card */
.card-img-top {
  height: 200px;
  object-fit: cover;
}

/* Gaya untuk card */
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 1.25rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  font-size: 1rem;
  color: #555;
}

/* Margin untuk tombol */
.btn {
  margin-top: 1rem;
}

/* Margin untuk row */
.row {
  margin-top: 20px;
}

/* Spasi antar tombol */
.btn-sm {
  margin-right: 0.5rem;
}
</style>
