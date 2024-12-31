<script setup>
// Tidak ada script khusus yang perlu ditambahkan di sini
</script>

<template>
  <div class="container-fluid p-5 mb-4 bg-light rounded-3">
    <!-- Menyusun teks di tengah halaman menggunakan Flexbox -->
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
      <h1 class="display-5 fw-bold text-center">
        Hi InterFams OurFams, Tertarik Lihat Project Kami?
      </h1>
      <p class="col-md-8 fs-4">
        InterFams adalah platform inovatif yang menyediakan berbagai proyek kreatif. Jelajahi dan temukan inspirasi baru!
      </p>
      <!-- Router Link untuk mengarahkan ke halaman Project -->
      <router-link to="/projects" class="btn btn-primary mt-3">
        Lihat Project Kami
      </router-link>
    </div>
  </div>
</template>

<style scoped>
/* Menggunakan Flexbox untuk menata konten di tengah halaman */
.container-fluid {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Memastikan elemen berada di tengah vertikal */
  text-align: center; /* Agar teks rata tengah */
  background-color: #f0ddae; /* Warna latar belakang cream */
}

/* Mengatur ukuran teks pada elemen h1 dan p */
h1 {
  font-size: 2.8em;
  color: #333;
}

p {
  color: #555;
}

/* Menambahkan penataan tombol */
.btn-primary {
  background-color: #646cff;
  border-color: #646cff;
}

.btn-primary:hover {
  background-color: #535bf2;
  border-color: #535bf2;
}
</style>
